@extends('layouts.appadmin')
@section('content')
{{Form::hidden('',$increment=1)}}
<div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Category</th>
                            <th>Product Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($products as $product)
                        <tr>
                            <td>{{$increment}}</td>
                            <td>{{$product->product_name}}</td>
                            <td><img src="/storage/product_images/{{$product->product_image}}"></td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_category}}</td>
                           @if($product->status==1)
                            <td>
                              <label class="badge badge-success">Actived</label>
                            </td>
                            @else
                            <td>
                              <label class="badge badge-danger">UnActived</label>
                            </td>
                            @endif
                            <td>
                              <button class="btn btn-outline-primary"  onclick="window.location='{{url('/editProduct/'.$product->id)}}'">Edit</button>
                              <a href="/deleteProduct/{{$product->id}}" class="btn btn-outline-primary" id=delete>Delete</a>
                              @if($product->status==0)
                              <button class="btn btn-outline-warning"onclick="window.location='{{url('/active/'.$product->id)}}'">Active</button>
                            </td>
                            @else
                            <button class="btn btn-outline-success"onclick="window.location='{{url('/unactive/'.$product->id)}}'">UnActive</button>
                            @endif
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
<script src="{{asset('backend/js/data-table.js')}}"></script>
@endsection
