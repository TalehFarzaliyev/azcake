<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\SingleProductAttributes;
use Illuminate\Http\Request;

class SingleProductAttributeController extends Controller
{

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Product $product){

        $var = SingleProductAttributes::where('product_id', $product['id'])->first();

        if ($var){
            $product_attributes = ProductAttribute::enable()->where('id', $var['product_attribute_id'])->get();
        }else{
            $product_attributes = ProductAttribute::enable()->get();
        }



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

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Product $product){

        $data = $request->validate($this->store_validate());

        $att = SingleProductAttributes::where('product_id', $product['id'])->pluck('product_attribute_id')->toArray();

        if (count($att)){

            if (! in_array($data['product_attribute_id'],$att)){
                $array = _sessionmessage('Xeta Var!', 'Bir mehsula iki ferqli atribut seçilə bilməz','error');
                $array['error'] = 'Bir mehsula iki ferqli atribut seçilə bilməz';
                // 'error' => 'Bir mehsula iki ferqli atribut seçilə bilməz'
                return back()->withInput($data)->with($array);
            }

        }
        SingleProductAttributes::create($data);

        return back()->with(_sessionmessage());
    }

    /**
     * @return string[]
     */
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


    /**
     * @param SingleProductAttributes $single_product_attribute
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(SingleProductAttributes $single_product_attribute)
    {


        $single_product_attribute->delete();
        $arr = _sessionmessage(null, null, null, true);
        return response($arr);
    }
}
