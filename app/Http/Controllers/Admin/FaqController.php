<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:faq-list|faq-create|faq-edit|faq-delete', ['only' => ['index','store']]);
        $this->middleware('permission:faq-create', ['only' => ['create','store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //faq
        $column = request('column','id');
        $order = request('order','ASC');

        $query = Faq::query();


        $query = request('title') ? $query->whereTranslationLike('title','%'.request('title').'%') : $query;

        $query = request('description') ? $query->whereTranslationLike('description','%'.request('description').'%') : $query;

        if (in_array($column, getTranslateFillable(new Faq())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column,$order);
        }

        if (in_array($column, getFillable(new Faq(),'created_at')) and in_array($order,['ASC','DESC'])){
            $query = $query->orderBy($column,$order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);

        $faqs = $query->appends(request()->query());

        return  view('admin.pages.faq.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->faq_validate());

        $data = $request->all();

        Faq::create($data);

        return redirect(route('admin.faq.index'))->with(_sessionmessage());
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
     * @param  Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.pages.faq.edit',compact('faq'));
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
        $request->validate($this->faq_validate());

        $faq = Faq::findOrFail($id);
        $faq->update($request->all());
        return redirect(route('admin.faq.index'))->with(_sessionmessage());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Faq $faq
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        $arr = _sessionmessage(null,null,null,true);

        return response($arr);
    }

    protected function faq_validate(){
        $validate_arr = [
            'status' => 'required|boolean'
        ];

        foreach (langs_get_code_name() as $key=>$lang){
            $validate_arr['title:'.$key] = 'required|string|max:50';
            $validate_arr['description:'.$key] = 'required|string|max:150';
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
