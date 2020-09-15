<?php $__env->startSection('content'); ?>
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="loginform">
					<?php if($message = Session::get('success')): ?>
		                <div class="alert alert-success alert-block">
		                    <button type="button" class="close" data-dismiss="alert">×</button> 
		                    <strong><?php echo e($message); ?></strong>
		                </div>
		            <?php endif; ?>

		            <?php if($message = Session::get('error')): ?>
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong><?php echo e($message); ?></strong>
                        </div>
                    <?php endif; ?>

					<h1 class="h1color">Login</h1>
					<form class="register" id="register" method="post"  enctype="multipart/form-data" action="<?php echo e(route('candidatelogin')); ?>">
						<?php echo csrf_field(); ?>
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
					  		<a class="registereclass" href="<?php echo e(url('register')); ?>">Register</a>
					  		<a href="<?php echo e(url('forgotpassword')); ?>">Forgot Password?</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/front/login.blade.php ENDPATH**/ ?>