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
					<h1 class="h1color">Forgot Password</h1>
					<form class="register" id="register" method="post"  enctype="multipart/form-data" action="{{ route('sendforgotpassword') }}">
						@csrf
					  	<div class="form-group">
					    	<label class="labelcolor">Email address</label>
					    	<input type="email" class="form-control email" id="email" name="email" value="">
					  	</div>
					  	
					  	<div class="form-group">
					  		<input type="submit" class="joinbtn" value="Send">
					  	</div>
					  	<div class="form-group forgotpass">
					  		<a href="{{ url('/') }}">Back To Login</a>
					  		
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
        },
        messages: {
        	email: {
                required: 'Please insert email ',
                email: 'Please insert proper email id ',
            },
        },
        submitHandler: function(form) {
        	form.submit();
        }
    });
});

</script>
@endsection