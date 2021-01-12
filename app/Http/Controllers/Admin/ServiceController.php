<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:service-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:service-delete', ['only' => ['destroy']]);
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


        $query = Service::query();

        $query = request('name') ? $query->whereTranslationLike('name','%'.request('name').'%') : $query;

        $query = request('description') ? $query->whereTranslationLike('description','%'.request('description').'%') : $query;

        if (in_array($column, getTranslateFillable(new Service())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column,$order);
        }


        if (in_array($column, getFillable(new Service(), 'created_at','updated_at')) and in_array($order, ['ASC', 'DESC']))
        {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);



        $services = $query->appends(request()->query());

        return view('admin.pages.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->service_validate());

        $data = $request->all();
        $data = array_merge($data, $this->slug($request));
        if ($request->file('image'))
        {

            $data['image'] = request('image')->store('',['disk' => 'uploads']);;
        }
        Service::create($data);

        return redirect(route('admin.service.index'))->with(_sessionmessage());
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
     * @param Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.pages.service.edit', compact('service'));
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

        $request->validate($this->service_validate());
        $service = Service::findOrFail($id);
        $data = $request->all();
        $data['image'] = $service->image;
        $data = array_merge($data, $this->slug($request));

        if ($request->file('image'))
        {
            _file_delete($data['image']);

            $data['image'] = request('image')->store('',['disk' => 'uploads']);
        }


        $service->update($data);

        return redirect(route('admin.service.index'))->with(_sessionmessage());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        _file_delete($service->image);


        $service->delete();
        $arr = _sessionmessage(null, null, null, true);
        return response($arr);
    }

    protected function service_validate()
    {
        $validate_arr = [
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'status' => 'required|boolean'
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
