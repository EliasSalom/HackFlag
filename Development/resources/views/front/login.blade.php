@extends('layouts.front')
@section('content')
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="loginform">
					@if ($message = Session::get('success'))
		                <div class="alert alert-success alert-block">
		                    <button type="button" class="close" data-dismiss="alert">×</button> 
		                    <strong>{{ $message }}</strong>
		                </div>
		            @endif

		            @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

					<h1 class="h1color">Login</h1>
					<form class="register" id="register" method="post"  enctype="multipart/form-data" action="{{ route('candidatelogin') }}">
						@csrf
					  	<div class="form-group">
					    	<label class="labelcolor">Email address</label>
					    	<input type="email" class="form-control email" name="email" id="email" value="">
					  	</div>
					  	<div class="form-group">
					    	<label class="labelcolor">Password</label>
					    	<input type="password" class="form-control password" name="password" id="password" value="">
					  	</div>
					  	<div class="form-group">
					  		<input type="submit" class="joinbtn" value="login">
					  	</div>
					  	<div class="form-group forgotpass">
					  		<a class="registereclass" href="{{ url('register') }}">Register</a>
					  		<a href="{{ url('forgotpassword') }}">Forgot Password?</a>
					  	</div>					  	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/additional-methods.min.js') }}"></script>

<script type="text/javascript">

$(function() {
	$("#register").validate({
    // Specify validation rules register
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },
            
        },
        messages: {
        	email: {
                required: 'Please insert email ',
                email: 'Please insert proper email id ',
            },
            password: {
                required: 'Please insert password ',
            },
        },
        submitHandler: function(form) {
        	form.submit();
        }
    });
});

</script>
@endsection