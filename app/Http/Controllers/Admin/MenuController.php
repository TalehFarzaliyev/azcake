<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuContent;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $column = \request('column','id');
        $order = \request('order','DESC');

        $query = Menu::query();

        if (in_array($column, getFillable(new Menu(),'created_at')) and in_array($order,['ASC','DESC'])){
            $query = $query->orderBy($column,$order);
        }

        $query = $query->paginate(10);
        $menus = $query->appends(request()->query());
        return view('admin.pages.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.pages.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Menu::create($request->all());
        return redirect(route('admin.menu.index'))->with(_sessionmessage());
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Menu $menu)
    {
        $categories = Category::enable()
            ->get();
        $pages = Page::enable()
            ->get();

        $menuContents = MenuContent::with('children')
            ->with('page')
            ->with('category')
            ->where('parent_id', 0)
            ->orderBy('sort','ASC')
            ->where('menu_id', $menu->id)
            ->get();

        //dd($menuContents);

        return  view('admin.pages.menu.show', [
            'menu' => $menu,
            'categories' => $categories,
            'pages' => $pages,
            'menuContents' => $menuContents
        ]);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Menu $menu)
    {
        return  view('admin.pages.menu.edit', compact('menu'));
    }

    /**
     * /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return redirect(route('admin.menu.index'))->with(_sessionmessage());

    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        $arr = _sessionmessage(null,null,null,true);
        return response($arr);
    }

    public function createContent(Request $request, $id, $type){

        $type = $type == 'category' ? 'category' : 'page';

        $request->validate([
            $type => 'required|numeric'
        ]);

        $data = $request->all();


        MenuContent::updateOrCreate([
            'menu_id' => $id,
            'category_id' => $type == 'category' ? $data[$type] : 0,
            'page_id' => $type == 'category' ? 0 : $data[$type],
            'free' => $data[$type] ? 0 :  1,
        ],[
            'route' => '/',
            'lang' => $data[$type] ? 'messages.error' :  'messages.home',
        ]);

        return back()->with(_sessionmessage());
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function updateContent(Request $request, $id){
        if ($request['data']){
            foreach ($request['data'] as $key => $data){
                MenuContent::where('id', $data['id'])->update(['parent_id' => 0,'sort' => $key]);
                if (isset($data['children'])){
                    foreach ($data['children'] as $key => $child){
                        MenuContent::where('id', $child['id'])->update(['parent_id' => $data['id'],'sort' => $key]);
                    }
                }
            }
        }
    }

    /**
     * @param MenuContent $menucontent
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function deleteContent(MenuContent $menucontent){
        $menucontent->delete();
        $arr = _sessionmessage(null,null,null,true);
        return response($arr);
    }
}
