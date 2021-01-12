<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use Hash;
use DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','store']]);
        $this->middleware('permission:customer-create', ['only' => ['create','store']]);
        $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = new Customer();

        $column = request('column','id');
        $order = request('order','DESC');


        $query = Customer::query();
        $query = $query->where($this->searchWhere());

        if (in_array($column, $model->getFillable()) and in_array($order,['ASC','DESC'])){
            $query = $query->orderBy($column,$order);
        }

        $query = $query->paginate(10);
        $customers = $query->appends(request()->query());

        return  view('admin.pages.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.customer.create');
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $customer = Customer::create($data);
        return redirect()->route('admin.customer.index')->with(_sessionmessage());
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
    public function edit(Customer $customer)
    {
        return view('admin.pages.customer.edit',compact('customer'));
    }

    /**
     * @param CustomerUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        $data = $request->all();
        unset($data['password']);

        $customer = Customer::find($id);
        $customer->update($data);

        if ($request->get('password')){
            $request->validate([
                'password' => 'required|string|min:8',
            ]);
            $customer->update(['password' => Hash::make($request->get('password'))]);
        }


        return redirect()->route('admin.customer.index')->with(_sessionmessage());
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        $arr = _sessionmessage(null,null,null,true);
        return response($arr);
    }

    protected function searchWhere(){

        $filter = [];

        if (request('first_name'))  $filter[] = ['first_name', 'like', '%'.request('first_name').'%'];
        if (request('last_name'))  $filter[] = ['last_name', 'like','%'.request('last_name').'%'];
        if (request('email'))  $filter[] = ['email', 'like','%'.request('email').'%'];
        if (request('phone'))  $filter[] = ['phone', 'like','%'.request('phone').'%'];
        if (!is_null(request('status')))  $filter[] = ['status', '=',request('status')];
        return $filter;

    }
}
