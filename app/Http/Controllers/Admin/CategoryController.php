<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
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


        $query = Category::query();
        $query = $query->with('parent');

        $query = request('name') ? $query->whereTranslationLike('name','%'.request('name').'%') : $query;

        $query = request('description') ? $query->whereTranslationLike('description','%'.request('description').'%') : $query;



        if (in_array($column, getTranslateFillable(new Category())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column,$order);
        }


        if (in_array($column, getFillable(new Category(), 'created_at','updated_at')) and in_array($order, ['ASC', 'DESC']))
        {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);



        $categoryies = $query->appends(request()->query());

        return view('admin.pages.category.index', compact('categoryies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::enable()->where('parent_id', 0)->get();
        return view('admin.pages.category.create',compact('parents'));
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
        Category::create($data);

        return redirect(route('admin.category.index'))->with(_sessionmessage());
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
     * @param category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parents = Category::enable()
            ->where('parent_id','<>', $category->id)
            ->where('id','<>',$category->id)
            ->get();
        return view('admin.pages.category.edit', compact('category','parents'));
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
        $category = Category::findOrFail($id);
        $data = $request->all();
        $data = array_merge($data, $this->slug($request));

        $category->update($data);

        return redirect(route('admin.category.index'))->with(_sessionmessage());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param category $category
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {

        $category->delete();
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
            $validate_arr['description:' . $key] = 'required|string|max:150';
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
