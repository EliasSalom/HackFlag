<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
	        <div class="row mb-2">
		        <div class="col-sm-6">
		            <h1>Teacher</h1>
		        </div>
	          	<div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              	<li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a></li>
		              	<li class="breadcrumb-item active">Teacher</li>
		            </ol>
	          	</div>
	        </div>
      	</div><!-- /.container-fluid -->
    </section>

    <section class="content">
      	<div class="row">
        	<div class="col-12">
	          	<div class="card">
		            <div class="card-header">
		              	<h3 class="card-title pull-right"><a class="btn btn-primary" href="<?php echo e(url('/teacher/addteacher')); ?>">Add Teacher</a></h3>
		            </div>
		            <?php if($message = Session::get('success')): ?>
		                <div class="alert alert-success alert-block">
		                    <button type="button" class="close" data-dismiss="alert">×</button> 
		                    <strong><?php echo e($message); ?></strong>
		                </div>
		            <?php endif; ?>
		            <!-- /.card-header -->
		            <div class="card-body">
		            	<div class="message_shows"></div>
		              	<table id="example1" class="table table-bordered table-striped">
		                	<thead>
				                <tr>
				                  	<th>S.No.</th>
				                  	<th>First Name</th>
				                  	<th>Last Name</th>
				                  	<th>Email</th>
				                  	<th>Status</th>
				                  	<th>Action</th>
				                </tr>
                			</thead>
                			<tbody>
                				<?php if($get_teachers)
                				{
                					$i=1;
                					foreach ($get_teachers as $key => $get_teacher) 
                					{
                					?>
						                <tr class="teacher_id_<?php echo $get_teacher->id; ?>">
						                  	<td><?php echo $i; ?></td>
						                  	<td><?php echo $get_teacher->first_name; ?></td>
						                  	<td><?php echo $get_teacher->last_name; ?></td>
						                  	<td><?php echo $get_teacher->email; ?></td>
						                  	<td><?php if(isset($get_teacher->status) && $get_teacher->status == 1){ ?>
								      		<span class="managestatus_<?php echo $get_teacher->id; ?>"><a href="javascript:void(0);" id="<?php echo $get_teacher->id; ?>" data_active="0" class="btn btn-info teacherstatus">Active </a></span>
              								<?php } else{ ?>
              								<span class="managestatus_<?php echo $get_teacher->id; ?>"><a href="javascript:void(0);" id="<?php echo $get_teacher->id; ?>" data_active="1" class="btn btn-danger teacherstatus inactive">Inactive </a></span>
              								<?php } ?>
	              							</td>
									      	<td>
									      		<a href="<?php echo e(route('teacher/editteacher',$get_teacher->id)); ?>" class="actionbtn">
									      			<i class="fa fa-pencil" aria-hidden="true"></i>
									      		</a>
	      										<a href="javascript:void(0);" class="actionbtn deletedteacher" id="<?php echo $get_teacher->id; ?>">
	      											<i class="fa fa-trash" aria-hidden="true"></i>
	      										</a>
	      									</td>
						                </tr>
						            <?php $i++;} 
						        } ?>    
							</tbody>
						</table>
           			</div>
            	<!-- /.card-body -->
          		</div>
          <!-- /.card -->
        	</div>
        <!-- /.col -->
      	</div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/dataTables.bootstrap4.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script> 

<script>
$(function () {
   	$("#example1").DataTable();
});

$(document).ready(function(){
	$(document).on('click', '.teacherstatus', function(){
		var teacher_id = $(this).attr('id');
		var status_id = $(this).attr('data_active');
		$.ajax({
            type:'POST',
            url:"<?php echo e(route('teacherstatus')); ?>",
            data:{"_token": "<?php echo e(csrf_token()); ?>",teacher_id:teacher_id,status_id:status_id},
            success:function(data)
            {
           
                if(data == 0)
                {
                	$('.message_shows').html('<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>Teacher status is inactive successfully</strong></div>');
                	$('.managestatus_'+teacher_id).html('<a href="javascript:void(0);" id="'+teacher_id+'" data_active="1" class="btn btn-danger teacherstatus inactive">Inactive</a>');   		
                }else if(data == 1)
                {
                	$('.message_shows').html('<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>Teacher status is active successfully</strong></div>');
                	$('.managestatus_'+teacher_id).html('<a href="javascript:void(0);" id="'+teacher_id+'" data_active="0" class="btn btn-info teacherstatus">Active</a>');
                }
            }
        });
	});
});	

$(document).ready(function(){
	$(document).on('click', '.deletedteacher', function(){
		var id = $(this).attr('id');
		swal({
		    title: "Are you sure?",
		    text: "You want to delete this teacher",
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonClass: "btn-danger",
		    confirmButtonText: "Yes delete it!",
		    closeOnConfirm: false
		},
		function(){
			$.ajax({
				type:'POST',
				url:"<?php echo e(route('deletedteachers')); ?>",
				data:{"_token": "<?php echo e(csrf_token()); ?>",id:id},

				success:function(data){
					if(data == 1)
					{
						$('.teacher_id_'+id).fadeOut('fast');
						swal("Success", "Teacher Successfully Deleted!", "success");
					}
				}
			});
		});
	});
});
</script>
</body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackflag\resources\views/teacher/allteacher.blade.php ENDPATH**/ ?>