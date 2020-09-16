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
                            <th>Slider Image</th>
                            <th>Description One</th>
                            <th>Description Two</th>
                            
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($sliders as $slider)
                        <tr>
                            <td>{{$increment}}</td>
                            
                            <td><img src="/storage/slider_images/{{$slider->slider_image}}"></td>
                            <td>{{$slider->description_one}}</td>
                            <td>{{$slider->description_two}}</td>
                            @if($slider->status==1)
                            <td>
                              <label class="badge badge-success">Actived</label>
                            </td>
                            @else
                            <td>
                              <label class="badge badge-danger">UnActived</label>
                            </td>
                            @endif
                            <td>
                              
                              <a href="/deleteslider/{{$slider->id}}" class="btn btn-outline-primary" id=delete>Delete</a>
                              @if($slider->status==0)
                              <button class="btn btn-outline-warning"onclick="window.location='{{url('/active/'.$slider->id)}}'">Active</button>
                            </td>
                            @else
                            <button class="btn btn-outline-success"onclick="window.location='{{url('/unactive/'.$slider->id)}}'">UnActive</button>
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
