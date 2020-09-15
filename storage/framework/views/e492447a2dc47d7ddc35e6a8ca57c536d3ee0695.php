<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1>Edit Candidate</h1>
          		</div>
          		<div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              	<li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a></li>
		              	<li class="breadcrumb-item active">Edit Candidate</li>
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
		                	<h3 class="card-title">Candidate</h3>
		              	</div>
                        <?php if($message = Session::get('error')): ?>
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e($message); ?></strong>
                            </div>
                        <?php endif; ?>
			            <form method="POST" action="<?php echo e(route('adminupdatecandate')); ?>" enctype="multipart/form-data" id="myform"  role="form">
    		 				<?php echo e(csrf_field()); ?>

			                 <input type="hidden" name="id" class="id" id="id" value="<?php echo $get_candidate->id; ?>">
			                <div class="card-body">
			                  	<div class="form-group">
			                    	<label for="exampleInputFirstName1">First Name</label>
			                    	<input type="text" class="form-control first_name" name="first_name" id="exampleInputFirstName1" placeholder="Enter First Name" value="<?php echo $get_candidate->first_name; ?>">
			                  	</div>
			                  	<div class="form-group">
			                    	<label for="exampleInputLastName1">Last Name</label>
			                    	<input type="text" name="last_name" class="form-control last_name" id="exampleInputLastName1" placeholder="Enter Last Name" value="<?php echo $get_candidate->last_name; ?>">
			                  	</div>
			                  	<div class="form-group">
			                    	<label for="exampleInputEmail1">Email address</label>
			                    	<input type="email" name="email" class="form-control email" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $get_candidate->email; ?>" readonly="readonly">
			                  	</div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Assign Class</label>
                                     <select name="assign_class" class="form-control">
                                        <option value="">Please Select</option>
                                         <?php foreach ($get_classSection as $key => $value) { ?>
                                             <option value="<?php echo $value->id ?>" <?php if($get_candidate->assign_class == $value->id) {?> selected <?php } ?> ><?php echo $value->class_name.' '.$value->section_name ?></option>
                                        <?php } ?>                                         
                                     </select>   
                                </div>
			                  	
			                  	<div class="form-group">
			                    	<label for="exampleInputFile">Candidate Image</label>
			                    	<div class="input-group">
			                      		<div class="custom-file">
			                        		<input type="file" name="image" class="custom-file-input image" id="exampleInputFile">
			                        		<label class="custom-file-label" for="exampleInputFile">Choose file</label>
			                      		</div>
                                        <img src="<?php echo e(URL::asset('/user/'.$get_candidate->image.'')); ?>" width="100" height="100" />
                                        <input type="hidden" name="imageold" value="<?php echo $get_candidate->image; ?>">
			                      		
			                    	</div>
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
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },

            assign_class: {
                required: true,
            },
            confirmpassword: {
                equalTo: "#exampleInputPassword1"
            },
            image: {
		      	accept: "image/*"
		    },
        },
        messages: {
        	first_name: {
                required: 'Please insert First Name ',
            },
            last_name: {
                required: 'Please insert Last Name ',
            },
            email: {
                required: 'Please insert email ',
                email: 'Please insert proper email id ',
            },
            password: {
                required: 'Please insert password ',
            },
            assign_class: {
                required: 'Please select class ',
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/candidate/admineditcandidate.blade.php ENDPATH**/ ?>