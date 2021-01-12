<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Barryvdh\TranslationManager\Manager;
use Illuminate\Support\Facades\Config;

class LanguageController extends Controller
{
    /** @var \Barryvdh\TranslationManager\Manager */
    protected $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager;

//        $this->middleware('permission:language-list|language-create|language-edit|language-delete', ['only' => ['index', 'store']]);
//        $this->middleware('permission:language-create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:language-edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:language-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $column = \request('column', 'id');
        $order = \request('order', 'DESC');

        $query = Language::query();

        $query = $query->where($this->searchWhere());

        if (in_array($column, getFillable(new Language(), 'created_at')) and in_array($order, ['ASC', 'DESC'])) {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->paginate(10);
        $languages = $query->appends(request()->query());
        return view('admin.pages.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $addLanguage = $request->all();

        $locales = $this->manager->getLocales();

        $newLocale = str_replace([], '-', trim($request->input('code')));
        if (!$newLocale || in_array($newLocale, $locales)) {
            return redirect()->back();
        }

        $locale = Config::get('translatable.locales');
        $setLocale = array_push($locale, $newLocale);
        Config::set('translatable.locales', [$setLocale]);


        $this->manager->addLocale($newLocale);
        Language::create($addLanguage);

        return redirect(route('admin.language.index'))->with(_sessionmessage());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('admin.pages.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(LanguageRequest $request, $id)
    {
        $updateLanguage = $request->all();
        $language = Language::findOrFail($id);
        $language->update($updateLanguage);

        return redirect(route('admin.language.index'))->with(_sessionmessage());
    }


    public function destroy($id)
    {
        $deleteLanguage = Language::findOrFail($id);
        $code = $deleteLanguage->code;
        $deleteLanguage->delete();

        $folder = base_path().DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.$code;

        if (is_dir($folder)) {
            rmdir($folder);
        }

        $arr = _sessionmessage(null, null, null, true);

        return response($arr);

    }


    protected function searchWhere()
    {

        $filter = [

            (request('name')) ? ['name', 'like', '%' . request('name') . '%'] : null,
            (request('code')) ? ['code', 'like', '%' . request('code') . '%'] : null,
            (request('direction')) ? ['direction', '=', request('direction')] : null,
            (request('status') or request('status') == '0') ? ['status', '=', request('status')] : null

        ];

        return array_filter($filter);
    }

}
