<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1>Add Class</h1>
          		</div>
          		<div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              	<li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a></li>
		              	<li class="breadcrumb-item active">Add Class</li>
		            </ol>
          		</div>
        	</div>
      	</div><!-- /.container-fluid -->
    </section>

    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<!-- left column -->
          		<div class="col-md-12">
            		<div class="card card-primary">
		              	<div class="card-header">
		                	<h3 class="card-title">Class</h3>
		              	</div>
                        <?php if($message = Session::get('error')): ?>
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e($message); ?></strong>
                            </div>
                        <?php endif; ?>
			            <form method="POST" action="<?php echo e(route('insertclass')); ?>" enctype="multipart/form-data" id="myform"  role="form">
    		 				<?php echo e(csrf_field()); ?>

			      
			                <div class="card-body">
			                  	<div class="form-group">
			                    	<label for="exampleInputFirstName1">Class</label>
                                    <select class="form-control" name="class_name">
                                        <option value="">Please Select</option> 
                                        <?php foreach ($get_class as $key => $value) { ?>
                                            <option value="<?php echo $value->class_name ?>"><?php echo $value->class_name; ?></option>    
                                        <?php } ?>                                        
                                    </select>
			                    
			                  	</div>
			                  	<div class="form-group">
			                    	<label for="exampleInputLastName1">Section</label>
			                    	 <select class="form-control" name="section_name">
                                        <option value="">Please Select</option> 
                                        <?php foreach ($get_section as $key => $value) { ?>
                                            <option value="<?php echo $value->section_name ?>"><?php echo $value->section_name; ?></option>    
                                        <?php } ?>                                        
                                    </select>
			                  	</div>		                  

				                
			                </div>
			                <div class="card-footer">
			                  	<button type="submit" class="btn btn-primary">Submit</button>
			                </div>
			            </form>
            		</div>
				</div>
     		</div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/additional-methods.min.js')); ?>"></script>

<script type="text/javascript">

$(function() {
	$("#myform").validate({
    // Specify validation rules register
        rules: {
            class_name: {
                required: true
            },
            section_name: {
                required: true
            },            
        },
        messages: {
        	class_name: {
                required: 'Please select class name ',
            },
            section_name: {
                required: 'Please select section name ',
            },            
            
       	},
        submitHandler: function(form) {
        	form.submit();
        }
    });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/class/addclass.blade.php ENDPATH**/ ?>