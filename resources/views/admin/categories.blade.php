@extends('layouts.appadmin')
@section('content')

{{Form::hidden('',$increment=1)}}
<div class="card">
            <div class="card-body">
              <h4 class="card-title">Categories</h4>
              @if(Session::has('status'))
                  <div class="alert alert-success">
                  {{Session::get('status')}}
                  </div>
                  @endif


              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Category_name</th>
                            <th>Action</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($categories as $category)
                        <tr>
                            <td>{{$increment}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                            <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit/'.$category->id)}}'" >Edit</button>
                            <a class="btn btn-outline-danger" href="/delete/{{$category->id}}" id="delete">Delete</a>
                            </td>
                           
                           
                        </tr>
                        {{Form::hidden('',$increment=$increment +1)}}
                        @endforeach
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
@section('script')
<script src="backend/js/data-table.js"></script>
@endsection
