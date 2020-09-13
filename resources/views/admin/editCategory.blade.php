@extends('layouts.appadmin')
@section('content')
<div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form validation</h4>
                 
                  {!!Form::open(['acttion' => 'CategoryController@updatecategory', 'class'=> 'cmxform', 'method' => 'POST', 'id'=>'commentForm'])!!}
                  {{csrf_field()}}

                  <div class="form-group">
                  
                       
                     {{Form::hidden('id',$category->id)}}
                     {{Form::label('', 'Product Category',['for' => 'cname'])}}
                     {{Form::text('category_name', $category->category_name,['class' => 'form-control'])}}

                   </div>
                    {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
   
                 {!!Form::close()!!}
                      
                     
                      
                 
                      
                </div>
              </div>
            </div>
          </div>
          @endsection


        
  @section('script')
<script src="{{asset('backend/js/data-table.js')}}"></script>
@endsection