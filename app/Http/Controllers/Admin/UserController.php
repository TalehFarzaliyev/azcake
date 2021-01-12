<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Spatie\Permission\Models\Role;
use App\User;
use Hash;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = new User();

        $column = request('column','id');
        $order = request('order','DESC');


        $query = User::query();
        $query = $query->where($this->searchWhere());

        if (in_array($column, $model->getFillable()) and in_array($order,['ASC','DESC'])){
            $query = $query->orderBy($column,$order);
        }

        $query = $query->paginate(10);
        $users = $query->appends(request()->query());

        return  view('admin.pages.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.user.create',compact('roles'));
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $user->assignRole($request->input('roles'));
        return redirect()->route('admin.user.index')->with(_sessionmessage());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.pages.user.edit',compact('user','roles', 'userRole'));
    }

    /**
     * @param UserUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->all();
        unset($data['password']);

        $user = User::find($id);
        $user->update($data);

        if ($request->get('password')){
            $request->validate([
                'password' => 'required|string|min:8',
            ]);
            $user->update(['password' => Hash::make($request->get('password'))]);
        }

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.user.index')->with(_sessionmessage());
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        $arr = _sessionmessage(null,null,null,true);
        return response($arr);
    }

    protected function searchWhere(){

        $filter = [];

        if (request('firstname'))  $filter[] = ['firstname', 'like', '%'.request('firstname').'%'];
        if (request('lastname'))  $filter[] = ['lastname', 'like','%'.request('lastname').'%'];
        if (request('birthday'))  $filter[] = ['birthday', 'like','%'.request('birthday').'%'];
        if (request('email'))  $filter[] = ['email', 'like','%'.request('email').'%'];
        if (request('phone'))  $filter[] = ['phone', 'like','%'.request('phone').'%'];
        if (request('gender'))  $filter[] = ['gender', '=',request('gender')];
        if (request('birthday'))  $filter[] = ['birthday', '=',request('birthday')];
        if (!is_null(request('status')))  $filter[] = ['status', '=',request('status')];
        return $filter;

    }
}
