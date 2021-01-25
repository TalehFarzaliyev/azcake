<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('setlocale');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $homeSliders  = Slider::where(['status' => 1, 'is_home' => 1])->get();
        $homeProducts = Product::where(['status' => 1])->get();

        return view('site.pages.index', [
            'homeSliders'  => $homeSliders,
            'homeProducts' => $homeProducts
        ]);
    }
}
