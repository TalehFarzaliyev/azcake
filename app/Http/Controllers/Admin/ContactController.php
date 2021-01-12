<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['index','store']]);
        $this->middleware('permission:contact-create', ['only' => ['create','store']]);
        $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $column = \request('column','id');
        $order = \request('order','ASC');

        $query = Contact::query();

        if (in_array($column, getFillable(new Contact(),'created_at', 'updated_at')) and in_array($order,['ASC','DESC'])){
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);

        $contacts = $query->appends(request()->query());

        return view('admin.pages.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.pages.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        $arr = _sessionmessage(null, null, null, true);
        return response($arr);
    }

    protected function searchWhere(){

        $filter = [

            (request('name'))      ? ['name', 'like', '%'.request('name').'%'] : null,
            (request('subject'))   ? ['subject', 'like','%'.request('subject').'%'] : null,
            (request('email'))     ? ['email', 'like','%'.request('email').'%'] : null,
            (request('message'))   ? ['message', 'like','%'.request('message').'%'] : null,
            (request('status') or request('status') == '0')    ? ['status', '=',request('status')] : null

        ];

        return array_filter($filter);
    }
}
