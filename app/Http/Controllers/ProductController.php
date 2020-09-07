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
}
