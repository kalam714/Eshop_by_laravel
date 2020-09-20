@extends('layouts.login')
@section('title')

@section('content')
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('frontend/login/images/bg-01.jpg');">
			<div class="wrap-login100">
			@if(Session::has('error'))
                  <div class="alert alert-success">
                  {{Session::get('error')}}
                  </div>
                  @endif
				  @if(count($errors) >0)
				  <div class="alert alert-danger">
					<ul>
					   @foreach($errors->all() as $error)
					   <li>{{$error}}</li>
					   @endforeach
					<ul>
				  </div>
				  @endif


				<form action="{{url('/accessaccount')}}" method="POST" class="login100-form validate-form">
				{{csrf_field()}}
				<a  href="{{URL::to('/')}}" ></a>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="/signup">
							Don't have an account? Signup
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	@endsection
	
