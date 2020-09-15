<?php $__env->startSection('content'); ?>
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="loginform">
					<h1 class="h1color">Register</h1>
					<form class="register" id="register" method="post"  enctype="multipart/form-data" action="<?php echo e(route('addregister')); ?>">
						<?php echo csrf_field(); ?>
						<div class="form-group">
						    <label class="labelcolor">Name</label>
						    <input type="text" class="form-control name" id="name" value="" name="name">
						</div>
						<div class="form-group">
    						<label class="labelcolor">Email address</label>
    						<input type="email" class="form-control email" id="email" name="email" value="">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackflag\resources\views/front/register.blade.php ENDPATH**/ ?>