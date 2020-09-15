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

					<h1 class="h1color">Change Password</h1>
					<form class="register" id="register" method="post"  enctype="multipart/form-data" action="<?php echo e(route('updatepassword')); ?>">
						<?php echo csrf_field(); ?>
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
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/additional-methods.min.js')); ?>"></script>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/front/changepassword.blade.php ENDPATH**/ ?>