<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryTranslation;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product_category-list|product_category-create|product_category-edit|product_category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:product_category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product_category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product_category-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //category
        $column = request('column', 'id');
        $order = request('order', 'DESC');


        $query = ProductCategory::query();
        $query = $query->with('parent');

        $query = request('name') ? $query->whereTranslationLike('name','%'.request('name').'%') : $query;

        $query = request('description') ? $query->whereTranslationLike('description','%'.request('description').'%') : $query;



        if (in_array($column, getTranslateFillable(new ProductCategory())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column,$order);
        }


        if (in_array($column, getFillable(new ProductCategory(), 'created_at','updated_at')) and in_array($order, ['ASC', 'DESC']))
        {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);



        $product_categories = $query->appends(request()->query());

        return view('admin.pages.product_category.index', compact('product_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = ProductCategory::enable()->where('parent_id', 0)->get();
        return view('admin.pages.product_category.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->category_validate());

        //dump($request->all());
        $data = $request->all();
        $data = array_merge($data, $this->slug($request));

        //dd($data);
        //dd($data);
        ProductCategory::create($data);

        return redirect(route('admin.product_category.index'))->with(_sessionmessage());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductCategory $product_category
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $product_category)
    {
        $parents = ProductCategory::enable()
            ->where('parent_id','<>', $product_category->id)
            ->where('id','<>',$product_category->id)
            ->get();
        return view('admin.pages.product_category.edit', compact('product_category','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate($this->category_validate());
        $product_category = ProductCategory::findOrFail($id);
        $data = $request->all();
        $data = array_merge($data, $this->slug($request));

        $product_category->update($data);

        return redirect(route('admin.product_category.index'))->with(_sessionmessage());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param ProductCategory $product_category
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ProductCategory $product_category)
    {
        $product_translation = ProductCategoryTranslation::find($product_category->id)->delete();
        $product_category->delete();
        $arr = _sessionmessage(null, null, null, true);
        return response($arr);
    }

    protected function category_validate()
    {
        $validate_arr = [
            'status' => 'required|numeric'
        ];

        foreach (langs_get_code_name() as $key => $lang)
        {
            $validate_arr['name:' . $key] = 'required|string|max:50';
        }

        return $validate_arr;
    }

    public function slug($request)
    {
        $slug = [];
        foreach (langs_get_code_name() as $key => $lang)
        {
            $slug['slug:' . $key] = Str::slug($request->get('name:' . $key));
        }
        return $slug;
    }

    protected function searchWhere()
    {

        $filter = [
            (request('status') or request('status') == '0') ? ['status', '=', request('status')] : null
        ];

        return array_filter($filter);
    }
}
