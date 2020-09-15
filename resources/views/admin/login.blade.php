<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Hackflag</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
    </div>
  	<!-- /.login-logo -->
  	<div class="card">
    	<div class="card-body login-card-body">
    		@if ($message = Session::get('error'))
				<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
					<strong>{{ $message }}</strong>
				</div>
			@endif
    		 <form method="POST" action="{{ route('addlogin') }}" enctype="multipart/form-data" id="myform">
    		 	{{ csrf_field() }}
		        <div class="mb-3">
		          	<input type="email" name="email" id="email" class="form-control email" placeholder="Email">
		          	
		        </div>
		        <div class="mb-3">
		          	<input type="password" name="password" id="password" class="form-control password" placeholder="Password">
		          	
		        </div>
		        <div class="row">
		          	<!-- /.col -->
		          	<div class="col-8">
		          		<a href="javascript:void(0);"></a>
		          	</div>
		          	<div class="col-4">
		            	<button type="submit" class="btn btn-primary btn-block">Sign In</button>
		          	</div>
		          <!-- /.col -->
		        </div>
      		</form>
      		<!-- /.social-auth-links -->
      		<p class="mb-1">
	        </p>
      	</div>
    	<!-- /.login-card-body -->
  	</div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/additional-methods.min.js') }}"></script>

<script type="text/javascript">

$(function() {
	$("#myform").validate({
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
</body>
</html>