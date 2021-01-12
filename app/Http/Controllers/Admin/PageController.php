<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:page-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:page-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //page
        $column = request('column', 'id');
        $order = request('order', 'DESC');


        $query = Page::query();

        $query = request('title') ? $query->whereTranslationLike('title','%'.request('title').'%') : $query;

        $query = request('description') ? $query->whereTranslationLike('description','%'.request('description').'%') : $query;

        if (in_array($column, getTranslateFillable(new Page())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column,$order);
        }


        if (in_array($column, getFillable(new Page(), 'created_at','updated_at')) and in_array($order, ['ASC', 'DESC']))
        {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);



        $pages = $query->appends(request()->query());

        return view('admin.pages.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->page_validate());

        $data = $request->all();
        $data = array_merge($data, $this->slug($request));
        if ($request->file('image'))
        {

            $data['image'] = request('image')->store('',['disk' => 'uploads']);;
        }
        Page::create($data);

        return redirect(route('admin.page.index'))->with(_sessionmessage());
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
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.page.edit', compact('page'));
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

        $request->validate($this->page_validate());
        $page = Page::findOrFail($id);
        $data = $request->all();
        $data['image'] = $page->image;
        $data = array_merge($data, $this->slug($request));

        if ($request->file('image'))
        {
               _file_delete($data['image']);

            $data['image'] = request('image')->store('',['disk' => 'uploads']);
        }


        $page->update($data);

        return redirect(route('admin.page.index'))->with(_sessionmessage());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        _file_delete($page->image);


        $page->delete();
        $arr = _sessionmessage(null, null, null, true);
        return response($arr);
    }

    protected function page_validate()
    {
        $validate_arr = [
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'status' => 'required|numeric'
        ];

        foreach (langs_get_code_name() as $key => $lang)
        {
            $validate_arr['title:' . $key] = 'required|string|max:50';
            $validate_arr['description:' . $key] = 'required|string|max:150';
        }

        return $validate_arr;
    }

    public function slug($request)
    {
        $slug = [];
        foreach (langs_get_code_name() as $key => $lang)
        {
            $slug['slug:' . $key] = Str::slug($request->get('title:' . $key));
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
