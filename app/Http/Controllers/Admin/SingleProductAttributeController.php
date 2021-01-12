<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\SingleProductAttributes;
use Illuminate\Http\Request;

class SingleProductAttributeController extends Controller
{

    public function index(Product $product){
        $product_attributes = ProductAttribute::enable()->get();


        $query = SingleProductAttributes::where('product_id', $product['id']);

        $query->orderBy('product_attribute_id', 'DESC');

        $query = $query->paginate(10);

        $variants = $query->appends(request()->query());


        return view('admin.pages.single_product.index', [
            'variants' => $variants,
            'product' => $product,
            'product_attributes'  => $product_attributes
        ]);
    }

    public function store(Request $request, Product $product){

        $data = $request->validate($this->store_validate());

        SingleProductAttributes::create($data);

        return back()->with(_sessionmessage());
    }

    public function store_validate(){
        $validate_arr = [
            'product_attribute_id' => 'required|numeric',
            'price' => 'required|numeric',
            'product_id' => 'required|numeric',
        ];

        foreach (langs_get_code_name() as $key => $lang)
        {
            $validate_arr['name:' . $key] = 'required|string';
        }
        return $validate_arr;
    }

    public function destroy(SingleProductAttributes $single_product_attribute)
    {


        $single_product_attribute->delete();
        $arr = _sessionmessage(null, null, null, true);
        return response($arr);
    }
}
