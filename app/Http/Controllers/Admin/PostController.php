<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct()
    {
//        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'store']]);
//        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        //page
        $column = request('column', 'id');
        $order = request('order', 'DESC');


        $query = Post::query();
        $query = $query->with('category');

        $query = request('name') ? $query->whereTranslationLike('name','%'.request('name').'%') : $query;

        $query = request('description') ? $query->whereTranslationLike('description','%'.request('description').'%') : $query;

        if (in_array($column, getTranslateFillable(new Post())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column, $order);
        }


        if (in_array($column, getFillable(new Post(), 'created_at','updated_at')) and in_array($order, ['ASC', 'DESC']))
        {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);

        $posts = $query->appends(request()->query());
        $categories = Category::enable()->get();
        return view('admin.pages.post.index', compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $categories = Category::enable()->get();

        return view('admin.pages.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $request->validate($this->page_validate());

        $data = $request->all();
        $data = array_merge($data, $this->slug($request));

        if ($request->file('image'))
        {
            // $data['image'] = request('image')->store('',['disk' => 'uploads']);;
        }

        Post::create($data);

        return redirect(route('admin.post.index'))->with(_sessionmessage());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|Response|View
     */
    public function edit(Post $post)
    {
        $categories = Category::enable()->get();

        return view('admin.pages.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->page_validate());
        $post = Post::findOrFail($id);
        $data = $request->all();
        $data['image'] = $post->image;
        $data = array_merge($data, $this->slug($request));

        if ($request->file('image'))
        {
            // _file_delete($data['image']);

            // $data['image'] = request('image')->store('',['disk' => 'uploads']);
        }


        $post->update($data);

        return redirect(route('admin.post.index'))->with(_sessionmessage());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        _file_delete($post->image);


        $post->delete();
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
            $validate_arr['name:' . $key] = 'required|string';
            $validate_arr['description:' . $key] = 'required|string';
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

            (request('status') or request('status') == '0') ? ['status', '=', request('status')] : null,
            (request('category_id')) ? ['category_id', '=', request('category_id')] : null

        ];

        return array_filter($filter);
    }
}
