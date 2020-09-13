<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function product (){
        return view('admin.products');
    }
    public function addProduct(){
        return view('admin.addProduct');
    }
    public function saveproduct(Request,$request){
        $this->validate($request,[
            'product_name' =>'required',
            'product_price' =>'required',
            'product_name' =>'required',
            'product_image' =>'required',


        ]);
    }
}
