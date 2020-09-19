<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;
use App\Client;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //
    public function home(){
        $products=Product::get();
        $sliders=Slider::get();
        return view('client.home')->with('sliders',$sliders)->with('products',$products);
    }
    public function shop(){
        $products=Product::get();
        $categories=Category::get();
        return view('client.shop')->with('products',$products)->with('categories',$categories);
    }
    public function cart(){
        $products=Product::get();
        return view('client.cart')->with('products',$products);
    }
    public function checkout(){
        return view('client.checkout');
    }
    public function login(){
        return view('client.login');
    }
    public function signup(){
        return view('client.signup');
    }
    public  function createaccount(Request $request){
        $this->validate($request,[
            'email'=>'email|required|unique:clients',
            'password'=>'required|min:4'
        ]);
        $client=new Client();
        $client->email=$request->input('email');
        $client->password=bcrypt($request->input('password'));
        $client->save();
        return back()->with('status','Account Created successfully');

    }

    public function accessaccount(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $client=Client::where('email',$request->input('email'))->first();
        if ($client){
                if(Hash::check($request->input('password'), $client->paasword)){

                    Session::put('client',$client);
                    return redirect('/');
                }else{
                    return back()->with('error','wrong password or email');
                }

        }else{
            return back()->with('error','yoou do not have an account');
        }

    }

}
