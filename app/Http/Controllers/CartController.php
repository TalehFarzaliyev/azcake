<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SingleProductAttributes;
use Darryldecode\Cart\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() {
        $cartCollection = \Cart::getContent();


        return view('site.pages.cart',[
            'products' => $cartCollection
        ]);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonCart(){

        $html = '';

        foreach (\Cart::getContent() as $product){
            $at = $product->attributes['product_attribute'] ? '('.$product->attributes['product_attribute']->name.')' : '';
            $html .= '<div class="cart-inline-item">
                      <div class="unit unit-spacing-sm align-items-center">
                        <div class="unit-left"><a class="cart-inline-figure" href="'.route('product', optional($product->associatedModel)->slug).'"><img src="'.asset('uploads/'.optional($product->associatedModel)->image).'" alt="" width="100" height="90"></a></div>
                        <div class="unit-body">
                          <h6 class="cart-inline-name"><a href="single-product.html">'.$product->name.$at.'</a></h6>
                          <div>
                            <div class="group-xs group-middle">
                              <div class="table-cart-stepper">
                                <div class="stepper "><input class="form-input stepper-input" type="number" data-zeros="true" value="'.$product->quantity.'" min="1" max="1000">
                                <span class="stepper-arrow up " onclick="onch_quantity(1,'."'".$product->id."'".')" title="'.$product->id.'"></span>
                                <span class="stepper-arrow down " onclick="onch_quantity(-1,'."'".$product->id."'".')" title="'.$product->id.'"></span>
                                </div>
                              </div>
                              <h6 class="cart-inline-title">'.$product->price.'AZN</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>';
        }

        return response()->json([
            'quantity' => \Cart::getTotalQuantity(),
            'total' => \Cart::getTotal(),
            'product_html' => $html
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeQuantity(Request $request){

        $id = $request->get('id');
        $quantitiy = $request->get('quantity');


        \Cart::update($id,[
            'quantity' => +1,
        ]);

        return response()->json([
            'status'  => true,
            'products' => \Cart::getContent()->toArray(),
            'quantity' => \Cart::getTotalQuantity()
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCart(Request $request){

        $product = Product::find($request->get('product_id'));


        $price = $product['price'];
        if ($product){

            $product_attribute_id = null;

            $product_attribute = null;

            if ($request->get('single_product_attribute_id')){
                $product_attribute_id = $request->get('attribute_id') ?? $request->get('single_product_attribute_id');
                $product_attribute = SingleProductAttributes::find($product_attribute_id);
                if ($product_attribute){
                    $price = $product_attribute['price'];
                }
            }else{
                $product_attribute = SingleProductAttributes::where('product_id', $product['id'])->first();

                if ($product_attribute){
                    $product_attribute_id = $product_attribute['id'];
                    $price = $product_attribute['price'];
                }
            }

            \Cart::add(array(
                'id' => $product_attribute_id ? $product['id'].'-'.$product_attribute_id : $product['id'].'-0',
                'name' => $product->name,
                'price' => $price,
                'quantity' => $request->get('quantity',1),
                'attributes' => array(
                    'product_slug' => $product['slug'],
                    'product_id' => $product['id'],
                    'attribute_id' => $product_attribute_id,
                    'product_attribute' => $product_attribute
                ),
                'associatedModel' => $product
            ));


            return response()->json([
                'status'  => true,
                'products' => \Cart::getContent()->toArray()
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Product not found'
        ]);

    }
}
