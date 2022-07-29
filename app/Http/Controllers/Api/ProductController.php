<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){
       $products = Product:: all();
       return ProductResource ::collection($products);
    }
    public function show(Product $product){
        return new ProductResource($product);
    }
    public function store(Request $request){
        $p = Product::all();
        
        $res = array(
            'code'=>'200'
        );
        return $res;
        // dd($request);

    }

}
