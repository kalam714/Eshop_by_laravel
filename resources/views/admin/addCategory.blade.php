@extends('layouts.appadmin')
@section('content')
<div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form validation</h4>
                  <form class="cmxform" id="commentForm" method="get" action="#">
                  {!! Form::open(['acttion'=>'AdminController@addCategory','class'=>'cmxform', 'method'=>'POST','id'=>'commentForm']) !!}
                  {{csrf_field()}}
                  <div class="form-group">
                       
                      
                     {{ Form::label('', 'Product Category',['for'=>'cname'])}};
                     {{Form::text('category_name','',['class'=>'form-control','minlength'=>'2'])}}

                   </div>
                    {{Form::submit('save',['class'=>'btn btn-primary'])}}
   
                 {!! Form::close() !!}
                      
                     
                      
                 
                      
                </div>
              </div>
            </div>
          </div>
          @endsection