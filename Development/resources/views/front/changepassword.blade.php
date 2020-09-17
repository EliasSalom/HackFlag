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

					<h1 class="h1color">Change Password</h1>
					<form class="register" id="register" method="post"  enctype="multipart/form-data" action="{{ route('updatepassword') }}">
						@csrf
					  	<div class="form-group">
					    	<label class="labelcolor">Current Password</label>
					    	<input type="password" class="form-control currentpassword" name="currentpassword" id="currentpassword" value="">
					  	</div>
					  	<div class="form-group">
					    	<label class="labelcolor">New Password</label>
					    	<input type="password" class="form-control newpassword" name="newpassword" id="newpassword" value="">
					  	</div>
					  	<div class="form-group">
					    	<label class="labelcolor">Confirm Password</label>
					    	<input type="password" class="form-control confirmpassword" name="confirmpassword" id="confirmpassword" value="">
					  	</div>
					  	<div class="form-group">
					  		<input type="submit" class="joinbtn" value="Submit">
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
            currentpassword: {
                required: true
            },
            newpassword: {
                required: true,
            },
            confirmpassword: {
                equalTo: "#newpassword"
            },
        },
        messages: {
        	currentpassword: {
                required: 'Please insert current password ',
            },
            
            newpassword: {
                required: 'Please insert password ',
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