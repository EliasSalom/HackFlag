<?php $__env->startSection('content'); ?>
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="loginform">
					<h1 class="h1color">Login</h1>
					<form>
					  	<div class="form-group">
					    	<label class="labelcolor">Email address</label>
					    	<input type="email" class="form-control" value="">
					  	</div>
					  	<div class="form-group">
					    	<label class="labelcolor">Password</label>
					    	<input type="password" class="form-control" value="">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackflag\resources\views/front/login.blade.php ENDPATH**/ ?>