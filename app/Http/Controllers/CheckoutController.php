<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() {
        $cartCollection = \Cart::getContent();

//        return  $cartCollection;
        return view('site.pages.checkout',[
            'products' => $cartCollection
        ]);
    }
}
