<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\SingleProductAttributes;
use App\Providers\AppServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request) {

        $selectedCategories = [];

        $products = Product::where(['status' => 1]);

        if ($request->get('category')) {
            $selectedCategories = $request->get('category');
        }

        if ($request->get('start') && $request->get('end')) {
            $start = $request->get('start');
            $end   = $request->get('end');
        }

        if ($request->get('query')) {

            $name = $request->get('query');

            $products = $products->whereHas('translations', function ($query) use ($name) {
                $query->orWhere('name', 'like', '%' . $name . '%')
                      ->orWhere('description', 'like', '%' . $name . '%');
            })->where(['status' => 1]);
        }

        if ($request->get('sort')) {

            if ($request->get('sort') == 1) {
                $products = $products->orderBy('price', 'DESC');
                $products = $products->orderBy('sort', 'DESC');
            } else if($request->get('sort') == 2) {
                $products = $products->orderBy('price', 'ASC');
                $products = $products->orderBy('sort', 'DESC');
            } else if($request->get('sort') == 3) {
                $products = $products->orderBy('is_popular', 'DESC');
                $products = $products->orderBy('sort', 'DESC');
            } else {
                $products = $products->orderBy('created_at', 'DESC');
                $products = $products->orderBy('sort', 'DESC');
            }
        }

        $count = $request->get('count') ?? 12;

        $products = $products->paginate($count);

        $categories = Category::where([
            'is_product' => 2
        ])->with('item')->get();

        $popularProducts = Product::where(['status' => 1, 'is_popular' => 1])->get();

        return view('site.pages.products', [
            'products' => $products,
            'categories' => $categories,
            'popularProducts' => $popularProducts,
            'count' => $count,
            'sort' => $request->get('sort') ?? 0,
            'selectedCategories' => $selectedCategories,
            'start' => $request->get('start') ?? 0,
            'end' => $request->get('end') ?? 100,
            'query' => $request->get('query') ?? ''
        ]);
    }

    /**
     * @param Request $request
     * @param false $slug
     * @return Application|Factory|View
     */
    public function detail(Request $request, $slug) {
        if (! $slug){

            abort('404');
        }

        //deyisdirildi
        $locale = app()->getLocale();

        //bu dogru yazilis deyil
//        $getSingleProduct = Product::whereHas('translations', function ($q) use ($slug, $locale) {
//            $q->where('locale','=', $locale)->where('slug','=', $slug);
//        })->first();


        $getSingleProduct = Product::whereTranslation('slug', $slug)->firstOrFail();


        $productAttributes = ProductAttribute::with('variants')
            ->whereHas('variants', function($q) use ($getSingleProduct) {
                $q->where('product_id','=', $getSingleProduct['id']);
            })
            ->where(['status' => 1])
            ->limit(1)->get();

        $single_product_attribute = null;

        if ($request->get('single_product_attribute_id')){
            $single_product_attribute = SingleProductAttributes::find($request->get('single_product_attribute_id'));
        }

        $featuredProducts = Product::where(['is_popular' => 1, 'status' => 1])->limit(4)->get();
        if(empty($featuredProducts))
            $featuredProducts = null;

        if ($getSingleProduct) {
            return view('site.pages.single-product', [
                'product' => $getSingleProduct,
                'productAttributes' => $productAttributes,
                'featuredProducts' => $featuredProducts,
                'single_product_attribute' => $single_product_attribute
            ]);
        } else {
            abort('404');
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addToCart(Request $request) {

        $productId = $request->get('productId');

        $product = Product::find($productId);

        if ($product) {
            $productData = [
                'id'        => $product->id,
                'name'      => $product->translate($request->segment(1))->name,
                'price'     => $product->price,
                'picture'   => $product->image,
                'slug'      => $product->translate($request->segment(1))->slug
            ];

            return response()->json([
                'status'  => true,
                'product' => $productData
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Product not found'
            ]);
        }
    }
}
