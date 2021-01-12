<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductAttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product_attribute-list|product_attribute-create|product_attribute-edit|product_attribute-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:product_attribute-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product_attribute-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product_attribute-delete', ['only' => ['destroy']]);
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


        $query = ProductAttribute::query();
        $query = request('name') ? $query->whereTranslationLike('name','%'.request('name').'%') : $query;
        $query = request('description') ? $query->whereTranslationLike('description','%'.request('description').'%') : $query;



        if (in_array($column, getTranslateFillable(new ProductAttribute())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column,$order);
        }


        if (in_array($column, getFillable(new ProductAttribute(), 'created_at','updated_at')) and in_array($order, ['ASC', 'DESC']))
        {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);



        $product_attributes  = $query->appends(request()->query());

        return view('admin.pages.product_attribute.index', compact('product_attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product_attribute.create');
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
        $data = $request->all();
        ProductAttribute::create($data);

        return redirect(route('admin.product_attribute.index'))->with(_sessionmessage());
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
     * @param ProductAttribute $product_attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $product_attribute)
    {
        return view('admin.pages.product_attribute.edit', compact('product_attribute'));
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
        $product_attribute = ProductAttribute::findOrFail($id);
        $data = $request->all();

        $product_attribute->update($data);

        return redirect(route('admin.product_attribute.index'))->with(_sessionmessage());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param ProductAttribute $product_attribute
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ProductAttribute $product_attribute)
    {
        ProductAttributeTranslation::where('product_attribute_id', $product_attribute->id)->delete();
        $product_attribute->delete();
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

    protected function searchWhere()
    {

        $filter = [
            (request('status') or request('status') == '0') ? ['status', '=', request('status')] : null
        ];

        return array_filter($filter);
    }
}
