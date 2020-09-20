<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;
use App\Client;
use Illuminate\Support\Facades\Hash;
use App\Cart;
use Session;

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
        return view('client.userlogin');
    }
    public function signup(){
        return view('client.signup');
    }
    public function view_by_cat($name){
        $categoris=Category::get();
        $products=Product::where('product_category',$name)->get();
        return view('client.shop')->with('products',$products)->with('categories',$categoris);
    
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

    public function addToCart($id){
        $product =Product::find($id);
    
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);
    
        //dd(Session::get('cart'));
        return redirect('/shop');
    }
    
 
    
    public function updateQty(Request $request){
        //print('the product id is '.$request->id.' And the product qty is '.$request->quantity);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);
    
        //dd(Session::get('cart'));
        return redirect('/cart');
    }
    
    public function removeItem($product_id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($product_id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
    
        //dd(Session::get('cart'));
        return redirect('/cart');
    }

}
