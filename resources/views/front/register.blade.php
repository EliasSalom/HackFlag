@extends('layouts.front')
@section('content')
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="loginform">
					@if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
					<h1 class="h1color">Register</h1>
					<form class="register" id="register" method="post"  enctype="multipart/form-data" action="{{ route('addregister') }}">
						@csrf
						<div class="form-group">
						    <label class="labelcolor">First Name</label>
						    <input type="text" class="form-control name" id="fname" value="{{ old('name') }}" name="fname">
						</div>

                        <div class="form-group">
                            <label class="labelcolor">Last Name</label>
                            <input type="text" class="form-control name" id="lname" value="{{ old('name') }}" name="lname">
                        </div>

                        <div class="form-group">
                            <label class="labelcolor">Username</label>
                            <input type="text" class="form-control username" id="username" value="{{ old('username') }}" name="username">
                        </div>

						<div class="form-group">
    						<label class="labelcolor">Email address</label>
    						<input type="email" class="form-control email" id="email" name="email" value="{{ old('email') }}">
  						</div>

                        <div class="form-group">
                            <label class="labelcolor">Organization</label>
                            <input type="text" class="form-control" name="organization" value="{{ old('organization') }}">
                        </div>

  						<div class="form-group">
    						<label class="labelcolor">Password</label>
    						<input type="password" class="form-control password" id="password" name="password" value="">
  						</div>
					  	<div class="form-group">
					    	<label class="labelcolor">Confirm password</label>
					    	<input type="password" class="form-control confirmpassword" id="confirmpassword" name="confirmpassword" value="">
					  	</div>
					  	<div class="form-group">
					  		<input type="submit" class="joinbtn" value="Register">
					  	</div>
					  	<div class="form-group forgotpass">
					  		Have already an account ? <a href="{{ url('/') }}">Login Here</a>
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
            fname: {
                required: true
            },
            lname: {
                required: true
            },

            username: {
                required: true
            },
            
            email: {
                required: true,
                email: true
            },

            organization: {
                required: true
            },
            password: {
                required: true,
            },
            confirmpassword: {
                equalTo: "#password"
            },
        },
        messages: {
        	fname: {
                required: 'Please insert first name',
            },
            lname: {
                required: 'Please insert last name',
            },
            username: {
                required: 'Please insert user name',
            },
            email: {
                required: 'Please insert email',
                email: 'Please insert proper email id',
            },

            organization: {
                required: 'Please insert organization',                
            },
            password: {
                required: 'Please insert password',
            },
            confirmpassword: {
                equalTo: "Password and confirm password doesnot match",
            },
       	},
        submitHandler: function(form) {
        	form.submit();
        }
    });
});

</script>
@endsection