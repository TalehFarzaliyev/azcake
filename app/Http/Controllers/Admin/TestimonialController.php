<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
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


        $query = Testimonial::query();

        $query = request('name') ? $query->whereTranslationLike('name','%'.request('name').'%') : $query;

        $query = request('position') ? $query->whereTranslationLike('position','%'.request('position').'%') : $query;

        $query = request('description') ? $query->whereTranslationLike('description','%'.request('description').'%') : $query;

        if (in_array($column, getTranslateFillable(new Testimonial())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column,$order);
        }


        if (in_array($column, getFillable(new Testimonial(), 'created_at','updated_at')) and in_array($order, ['ASC', 'DESC']))
        {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);



        $testimonials = $query->appends(request()->query());

        return view('admin.pages.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->testimonial_validate());

        $data = $request->all();
        $data = array_merge($data, $this->slug($request));
        if ($request->file('image'))
        {

            $data['image'] = request('image')->store('',['disk' => 'uploads']);;
        }
        Testimonial::create($data);

        return redirect(route('admin.testimonial.index'))->with(_sessionmessage());
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
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.pages.testimonial.edit', compact('testimonial'));
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

        $request->validate($this->testimonial_validate());
        $testimonial = Testimonial::findOrFail($id);
        $data = $request->all();
        $data['image'] = $testimonial->image;
        $data = array_merge($data, $this->slug($request));

        if ($request->file('image'))
        {
            _file_delete($data['image']);

            $data['image'] = request('image')->store('',['disk' => 'uploads']);
        }


        $testimonial->update($data);

        return redirect(route('admin.testimonial.index'))->with(_sessionmessage());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Testimonial $testimonial
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Testimonial $testimonial)
    {
        _file_delete($testimonial->image);


        $testimonial->delete();
        $arr = _sessionmessage(null, null, null, true);
        return response($arr);
    }

    protected function testimonial_validate()
    {
        $validate_arr = [
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'status' => 'required|boolean'
        ];

        foreach (langs_get_code_name() as $key => $lang)
        {
            $validate_arr['name:' . $key] = 'required|string|max:50';
            $validate_arr['position:' . $key] = 'required|string|max:50';
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
