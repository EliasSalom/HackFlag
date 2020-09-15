<?php $__env->startSection('content'); ?>
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="loginform">
					<?php if($message = Session::get('error')): ?>
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong><?php echo e($message); ?></strong>
                        </div>
                    <?php endif; ?>
					<h1 class="h1color">Register</h1>
					<form class="register" id="register" method="post"  enctype="multipart/form-data" action="<?php echo e(route('addregister')); ?>">
						<?php echo csrf_field(); ?>
						<div class="form-group">
						    <label class="labelcolor">First Name</label>
						    <input type="text" class="form-control name" id="fname" value="<?php echo e(old('name')); ?>" name="fname">
						</div>

                        <div class="form-group">
                            <label class="labelcolor">Last Name</label>
                            <input type="text" class="form-control name" id="lname" value="<?php echo e(old('name')); ?>" name="lname">
                        </div>

                        <div class="form-group">
                            <label class="labelcolor">Username</label>
                            <input type="text" class="form-control username" id="username" value="<?php echo e(old('username')); ?>" name="username">
                        </div>

						<div class="form-group">
    						<label class="labelcolor">Email address</label>
    						<input type="email" class="form-control email" id="email" name="email" value="<?php echo e(old('email')); ?>">
  						</div>

                        <div class="form-group">
                            <label class="labelcolor">Organization</label>
                            <input type="text" class="form-control" name="organization" value="<?php echo e(old('organization')); ?>">
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
					  		Have already an account ? <a href="<?php echo e(url('/')); ?>">Login Here</a>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/additional-methods.min.js')); ?>"></script>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/front/register.blade.php ENDPATH**/ ?>