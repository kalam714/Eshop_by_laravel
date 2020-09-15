@extends('layouts.appadmin')
@section('content')
<div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Product</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-success">
                  {{Session::get('status')}}
                  </div>
                  @endif
                  {{Form::hidden('id',$product->id)}}
                  {!! Form::open(['acttion'=>'ProductController@updateproduct','class'=>'cmxform', 'method'=>'POST','id'=>'commentForm', 'enctype'=>'multipart/form-data']) !!}
                  {{csrf_field()}}
                
                   <div class="form-group">
                   {{Form::label('', 'Product Name',['for'=>'cname'])}}
                     {{Form::text('product_name',$product->product_name,['class'=>'form-control'])}}
                   </div>
                   <div class="form-group">
                   {{Form::label('', 'Product Price',['for'=>'cname'])}}
                     {{Form::number('product_price',$product->product_price,['class'=>'form-control'])}}
                   </div>
                   <div class="form-group">
                   
                   {{Form::label('', 'Product Category')}}
                   {{Form::select('product_category',$categories,$product->product_category, ['class'=>'form-control'])}}
                   </div>
                   <div class="form-group">
                   {{Form::label('', 'Product Image',['for'=>'cname'])}}
                   {{Form::file('product_image',['class'=>'form-control'])}}
                   
                   </div>
                  

                    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
   
                 {!! Form::close() !!}
                      
                     
                      
                 
                      
                </div>
              </div>
            </div>
          </div>
          @endsection