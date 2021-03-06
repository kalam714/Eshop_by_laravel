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
                
                  {!! Form::open(['acttion'=>'ProductController@saveproduct','class'=>'cmxform', 'method'=>'POST','id'=>'commentForm', 'enctype'=>'multipart/form-data']) !!}
                  {{csrf_field()}}
                
                   <div class="form-group">
                   {{Form::label('', 'Product Name',['for'=>'cname'])}}
                     {{Form::text('product_name','',['class'=>'form-control'])}}
                   </div>
                   <div class="form-group">
                   {{Form::label('', 'Product Price',['for'=>'cname'])}}
                     {{Form::number('product_price','',['class'=>'form-control'])}}
                   </div>
                   <div class="form-group">
                   
                   {{Form::label('', 'Product Category')}}
                   {{Form::select('product_category',$categories, null, 
                   ['placeholder' => 'select category','class'=>'form-control'])}}
                   </div>
                   <div class="form-group">
                   {{Form::label('', 'Product Image',['for'=>'cname'])}}
                   {{Form::file('product_image',['class'=>'form-control'])}}
                   
                   </div>
                  

                    {{Form::submit('save',['class'=>'btn btn-primary'])}}
   
                 {!! Form::close() !!}
                      
                     
                      
                 
                      
                </div>
              </div>
            </div>
          </div>
          @endsection