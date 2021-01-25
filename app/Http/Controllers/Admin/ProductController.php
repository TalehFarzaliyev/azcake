<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

/**
 * @method Imageupload(Request $request)
 */
class ProductController extends Controller
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
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


        $query = Product::query();

        //$query = $query->with('product_category_id');

        $query = request('name') ? $query->whereTranslationLike('name','%'.request('name').'%') : $query;

        if (in_array($column, getTranslateFillable(new Product())) and in_array($order,['ASC','DESC'])){
            $query = $query->orderByTranslation($column,$order);
        }

        if (in_array($column, getFillable(new Product(), 'created_at','updated_at')) and in_array($order, ['ASC', 'DESC']))
        {
            $query = $query->orderBy($column, $order);
        }

        $query = $query->where($this->searchWhere());

        $query = $query->paginate(10);

        $products = $query->appends(request()->query());
        $product_categories = Category::where('status', 1)->get();
        return view('admin.pages.product.index', compact('products','product_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $product_categories = Category::enable()->where('is_product', 1)->get();
        //$product_attributes = ProductAttribute::all();
        return view('admin.pages.product.create',compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        //$request->validate($this->page_validate());

        $data = $request->all();
        $data = array_merge($data, $this->slug($request));

        if ($request->file('image'))
        {
            $data['image'] =  $this -> upload( $request , 'products' );
            //$data['image'] = Storage::disk('uploads')->put(request('image'));
        }

        Product::create($data);

        return redirect(route('admin.product.index'))->with(_sessionmessage());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|void
     */
    public function show(Product $product)
    {
        $images = ProductImages::where(['product_id'=> $product['id']])->get();
        return view('admin.pages.product.show',[
            'product'   => $product,
            'images'    => $images
        ]);
    }


    public function dropzone(Request $request, Product $product){

        $data['product_id'] = $product['id'];
//        $data['image'] =  $this -> upload( $request , 'products', 'file');
        $data['image'] = request('file')->store('products',['disk' => 'uploads']);;
        ProductImages::create($data);
        return \response([
            'status' => true
        ], 201);
    }


    public function dropzoneDelete($id){
        $p_i = ProductImages::find($id);
        _file_delete($p_i->image);


        $p_i->delete();
        $arr = _sessionmessage(null, null, null, true);
        return response($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|Response|View
     */
    public function edit(Product $product)
    {
        $product_categories = Category::enable()->where('is_product', 1)->get();

        return view('admin.pages.product.edit', compact('product','product_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, int $id)
    {

        $request->validate($this->page_validate());
        $product = Product::findOrFail($id);
        $data = $request->all();
        $data['image'] = $product->image;
        $data = array_merge($data, $this->slug($request));

        if ($request->file('image'))
        {
            _file_delete($data['image']);
            $data['image'] =  $this -> upload( $request , 'products' );
        }

        $product->update($data);

        return redirect(route('admin.product.index'))->with(_sessionmessage());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return ResponseFactory|Response
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        _file_delete($product->image);


        $product->delete();
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

            (request('status') or request('status') == '0') ? ['status', '=', request('status')] : null,
            (request('product_category_id')) ? ['product_category_id', '=', request('product_category_id')] : null

        ];

        return array_filter($filter);
    }
}
