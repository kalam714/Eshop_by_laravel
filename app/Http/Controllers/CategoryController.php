<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;


class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addCategory(){
        return view('admin.addCategory');
    }
    public function savecategory(Request $request){
        $this->validate($request,[
            'category_name' =>'required'

        ]);
    $checkcat=Category::where('category_name', $request->input('category_name'))->first();
    $category=new Category;

    if(!$checkcat){
        $category->category_name = $request->input('category_name');
        $category->save();
        return redirect('/addcategory')->with('status','The'.$category->category_name.'Category has been save successfully');

    }else{
        return redirect('/addcategory')->with('status1','category already exit in database');
    }



  }
   
  public function categories(){
      $categoris=Category::get();
      return view('admin.categories')->with('categories',$categoris);

  }
  public function edit($id){
    $category=Category::find($id);
    return view('admin.editCategory')->with('category',$category);

}
public function updatecategory(Requesst $request){
    $category=Category::find($request->input('id'));
    $category->category_name=$request->input('category_name');
    $category->update();
    return redirect('/categories')->with('status','The'.$category->category_name.'Category has been save successfully');
}

public function delete($id){
    $category=Category::find($id);
    $category->delete();
    return redirect('/categories')->with('status','The' .$category->category_name.'Category has been Delete successfully');

}








}
