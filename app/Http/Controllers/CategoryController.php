<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     * @param false $slug
     * @return Application|Factory|View
     */
    public function index(Request $request, $slug = false) {
        if ($slug == false) {
            abort('404');
        } else {
            $locale = $request->segment(1) ?? config('app.locale');

            $category = ProductCategory::whereHas('translations', function ($q) use ($slug, $locale) {
                $q->where('locale', '=', $locale)->where('slug', '=', $slug);
            })->where(['status' => 1])->first();

            if ($category) {

                $products = Product::where(['product_category_id' => $category->id, 'status' => 1]);

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

                return view('site.pages.category', [
                    'category' => $category,
                    'products' => $products,
                    'count'    => $count,
                    'sort'     => $request->get('sort') ?? 0
                ]);
            } else {
                abort('404');
            }
        }
    }
}
