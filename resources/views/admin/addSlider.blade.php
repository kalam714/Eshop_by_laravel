@extends('layouts.appadmin')
@section('content')
<div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form validation</h4>
                 
                  {!! Form::open(['acttion'=>'AdminController@addProduct','class'=>'cmxform', 'method'=>'POST','id'=>'commentForm']) !!}
                  {{csrf_field()}}
                
                   <div class="form-group">
                   {{Form::label('', 'Description one',['for'=>'cname'])}}
                     {{Form::text('description_one','',['class'=>'form-control'])}}
                   </div>
                   <div class="form-group">
                   {{Form::label('', 'Description two',['for'=>'cname'])}}
                     {{Form::text('description_two','',['class'=>'form-control'])}}
                   </div>
                   <div class="form-group">
                  
                   <div class="form-group">
                   {{Form::label('', 'Slider Image',['for'=>'cname'])}}
                   {{Form::file('slider_image',['class'=>'form-control'])}}
                   
                   </div>
                   <div class="form-group">
                   {{Form::label('', 'Slider Status',['for'=>'cname'])}}
                   {{Form::checkbox('slider_status','','true',['class'=>'form-control'])}}
                   
                   </div>

                    {{Form::submit('save',['class'=>'btn btn-primary'])}}
   
                 {!! Form::close() !!}
                      
                     
                      
                 
                      
                </div>
              </div>
            </div>
          </div>
          @endsection