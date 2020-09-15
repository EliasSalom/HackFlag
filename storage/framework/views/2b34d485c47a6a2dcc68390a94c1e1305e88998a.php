<?php $__env->startSection('content'); ?>
<div class="enterboxbg">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="enterbox">
                <div class="logo">
                    <a href="javascript:void(0);">
                        <img src="<?php echo e(URL::asset('/images/logo.png')); ?>" alt="Logo" />
                    </a>
                </div>
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
                <form method="POST" action="<?php echo e(route('gameplay')); ?>" enctype="multipart/form-data" id="myform"  role="form">
                    <?php echo csrf_field(); ?>
                    <div class="gamecodebg">
                        <p class="mb-5">
                            <h2></h2>
                            <label>Please Enter Game Code</label>
                            <input type="text" name="game_code" class="gamecodebg-input game_code" id="game_code" value="" />
                        </p>
                        <p>
                            <input type="submit" class="joinbtn" value="JOIN The Game" />
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/additional-methods.min.js')); ?>"></script>

<script type="text/javascript">

$(function() {
    $("#myform").validate({
        rules: {
            game_code: {
                required: true,
            },    
        },
        messages: {
            game_code: {
                required: 'Please insert game code ',
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/front/gamecode.blade.php ENDPATH**/ ?>