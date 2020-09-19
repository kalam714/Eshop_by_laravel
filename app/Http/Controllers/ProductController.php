<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use Session;
use App\Cart;

class ProductController extends Controller
{
    //
 
    public function addProduct(){
        $categories=Category::All()->pluck('category_name','category_name');
        return view('admin.addProduct')->with('categories',$categories);
    }
    public function saveproduct(Request $request){
        $this->validate($request,[
            'product_name' =>'required',
            'product_price' =>'required',
            'product_image' =>'image|nullable|max:1999',
          ]);

    if($request->input('product_category')){

        
        if($request->hasFile('product_image')){
            $fileNameWithExt=$request->file('product_image')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            $path=$request->file('product_image')->storeAS('public/product_images',$fileNameToStore);

        }else{

            $fileNameToStore="noimage.jpg";
        }
        $product=new Product();
        $product->product_name=$request->input('product_name');
        $product->product_price=$request->input('product_price');
        $product->product_category=$request->input('product_category');
        $product->product_image=$fileNameToStore;
        $product->status=1;
        $product->save();
        return redirect('/addproduct')->with('status','The '.$product->product_name.' has been save successfully');
    }else{

        return redirect('/addproduct')->with('status','please select the category');

    }

}
public function product(){
    $products=Product::get(); 
    return view('admin.products')->with('products',$products);
}
public function editProduct($id){
    $categories=Category::All()->pluck('category_name','category_name');
    $product=Product::find($id);
    return view('admin.editProduct')->with('product',$product)->with('categories',$categories);
}

public function updateproduct(Request $request){
    $this->validate($request,[
        'product_name' =>'required',
        'product_price' =>'required',
        'product_image' =>'image|nullable|max:1999',
      ]);
      $product=Product::find($request->input('id'));
      $product->product_name=$request->input('product_name');
      $product->product_price=$request->input('product_price');
      $product->product_category=$request->input('product_category');

      if($request->hasFile('product_image')){
        $fileNameWithExt=$request->file('product_image')->getClientOriginalName();
        $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $extension=$request->file('product_image')->getClientOriginalExtension();
        $fileNameToStore=$fileName.'_'.time().'.'.$extension;

        
        if($product->product_image !="noimage.jpg"){
            Storage::delete('publice/product_images/'.$product->product_image);
        }
        
        $product->product_image=$fileNameToStore;

      }
      $product->update();
      return redirect('/product')->with('status','Product updated');

}
public function deleteProduct($id){
    $product=Product::find($id);
    if($product->product_image !="noimage.jpg"){
        Storage::delete('publice/product_images/'.$product->product_image);
    }
    $product->delete();
    return redirect('/product')->with('status','Product deleted');

}
public function active($id){
    $product=Product::find($id);
    $product->status=1;
    $product->update();
    return redirect('/product');
}
public function unactive($id){
    $product=Product::find($id);
    $product->status=0;
    $product->update();
    return redirect('/product');
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

public function cart(){
    if(!Session::has('cart')){
        return view('client.cart');
    }

    $oldCart = Session::has('cart')? Session::get('cart'):null;
    $cart = new Cart($oldCart);
    return view('client.cart', ['products' => $cart->items]);
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
