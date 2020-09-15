<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
	        <div class="row mb-2">
		        <div class="col-sm-6">
		            <h1>Class</h1>
		        </div>
	          	<div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              	<li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a></li>
		              	<li class="breadcrumb-item active">Class</li>
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
		              	<h3 class="card-title pull-right"><a class="btn btn-primary" href="<?php echo e(url('/class/addclass')); ?>">Add Class</a></h3>
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
				                  	<th>Class Name</th>
				                  	<th>Section Name</th>
				                  	<th>Action</th>
				                </tr>
                			</thead>
                			<tbody>
                				<?php if($get_class)
                				{
                					$i=1;
                					foreach ($get_class as $key => $get_class) 
                					{
                					?>
						                <tr class="class_id_<?php echo $get_class->id; ?>">
						                  	<td><?php echo $i; ?></td>
						                  	<td><?php echo $get_class->class_name; ?></td>
						                  	<td><?php echo $get_class->section_name; ?></td>
						                  	<td>
									      		<a href="<?php echo e(route('class/editclass',$get_class->id)); ?>" class="actionbtn">
									      			<i class="fa fa-pencil" aria-hidden="true"></i>
									      		</a>
	      										<a href="javascript:void(0);" class="actionbtn deletedclass" id="<?php echo $get_class->id; ?>">
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


<script>
$(function () {
   	$("#example1").DataTable();
});

$(document).ready(function(){
	$(document).on('click', '.deletedclass', function(){
		var id = $(this).attr('id');
		swal({
		    title: "Are you sure?",
		    text: "You want to delete this class",
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonClass: "btn-danger",
		    confirmButtonText: "Yes delete it!",
		    closeOnConfirm: false
		},
		function(){
			$.ajax({
				type:'POST',
				url:"<?php echo e(route('deletedclass')); ?>",
				data:{"_token": "<?php echo e(csrf_token()); ?>",id:id},

				success:function(data){
					if(data == 1)
					{
						$('.class_id_'+id).fadeOut('fast');
						swal("Success", "Class Successfully Deleted!", "success");
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/class/allclass.blade.php ENDPATH**/ ?>