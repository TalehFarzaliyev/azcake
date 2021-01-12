<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:team-list|team-create|team-edit|team-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:team-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:team-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:team-delete', ['only' => ['destroy']]);
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


        $query = Team::query();

        $query = request('name') ? $query->whereTranslationLike('name','%'.request('name').'%') : $query;

        $query = request('position') ? $query->whereTranslationLike('position','%'.request('position').'%') : $query;

        $query = request('description') ? $query->whereTranslationLike('description','%'.request('description').'%') : $query;

        if (in_array($column, getTranslateFillable(new Team())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column,$order);
        }


        if (in_array($column, getFillable(new Team(), 'created_at','updated_at')) and in_array($order, ['ASC', 'DESC']))
        {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);



        $teams = $query->appends(request()->query());

        return view('admin.pages.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->team_validate());

        $data = $request->all();
        $data = array_merge($data, $this->slug($request));
        if ($request->file('image'))
        {

            $data['image'] = request('image')->store('',['disk' => 'uploads']);;
        }
        Team::create($data);

        return redirect(route('admin.team.index'))->with(_sessionmessage());
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
     * @param Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.pages.team.edit', compact('team'));
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

        $request->validate($this->team_validate());
        $team = Team::findOrFail($id);
        $data = $request->all();
        $data['image'] = $team->image;
        $data = array_merge($data, $this->slug($request));

        if ($request->file('image'))
        {
            _file_delete($data['image']);

            $data['image'] = request('image')->store('',['disk' => 'uploads']);
        }


        $team->update($data);

        return redirect(route('admin.team.index'))->with(_sessionmessage());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Testimonial $team)
    {
        _file_delete($team->image);


        $team->delete();
        $arr = _sessionmessage(null, null, null, true);
        return response($arr);
    }

    protected function team_validate()
    {
        $validate_arr = [
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'facebook' => 'string',
            'instagram' => 'string',
            'website' => 'string',
            'phone' => 'required|min:10|max:15',
            'status' => 'required|boolean',
            'email' => request('id') ?'required|email|unique:teams,email,'.request('id') : 'required|email|unique:teams,email'
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
            (request('facebook'))    ? ['facebook', 'like', '%'.request('facebook').'%'] : null,
            (request('instagram'))   ? ['instagram', 'like', '%'.request('instagram').'%'] : null,
            (request('email'))       ? ['email', 'like', '%'.request('email').'%'] : null,
            (request('website'))     ? ['website', 'like', '%'.request('website').'%'] : null,
            (request('phone'))       ? ['phone', 'like', '%'.request('phone').'%'] : null,
            (request('status') or request('status') == '0') ? ['status', '=', request('status')] : null

        ];

        return array_filter($filter);
    }
}
