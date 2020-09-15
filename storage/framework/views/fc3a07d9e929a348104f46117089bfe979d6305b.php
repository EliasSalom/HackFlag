<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
	        <div class="row mb-2">
		        <div class="col-sm-6">
		            <h1>Candidate</h1>
		        </div>
	          	<div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              	<li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a></li>
		              	<li class="breadcrumb-item active">Candidate</li>
		            </ol>
	          	</div>
	        </div>
      	</div><!-- /.container-fluid -->
    </section>

    <section class="content">
      	<div class="row">
        	<div class="col-12">
	          	<div class="card">
		            
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
				                  	
				                </tr>
                			</thead>
                			<tbody>
                				<?php if($get_candidates)
                				{
                					$i=1;
                					foreach ($get_candidates as $key => $get_candidate) 
                					{
                					?>
						                <tr class="candidate_id_<?php echo $get_candidate->id; ?>">
						                  	<td><?php echo $i; ?></td>
						                  	<td><?php echo $get_candidate->first_name; ?></td>
						                  	<td><?php echo $get_candidate->last_name; ?></td>
						                  	<td><?php echo $get_candidate->email; ?></td>
						                  	
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
	$(document).on('click', '.candidatestatus', function(){
		var candidate_id = $(this).attr('id');
		var status_id = $(this).attr('data_active');
		$.ajax({
            type:'POST',
            url:"<?php echo e(route('candidatestatus')); ?>",
            data:{"_token": "<?php echo e(csrf_token()); ?>",candidate_id:candidate_id,status_id:status_id},
            success:function(data)
            {
           
                if(data == 0)
                {
                	$('.message_shows').html('<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>Candidate status is inactive successfully</strong></div>');
                	$('.managestatus_'+candidate_id).html('<a href="javascript:void(0);" id="'+candidate_id+'" data_active="1" class="btn btn-danger candidatestatus inactive">Inactive</a>');   		
                }else if(data == 1)
                {
                	$('.message_shows').html('<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>Candidate status is active successfully</strong></div>');
                	$('.managestatus_'+candidate_id).html('<a href="javascript:void(0);" id="'+candidate_id+'" data_active="0" class="btn btn-info candidatestatus">Active</a>');
                }
            }
        });
	});
});	

$(document).ready(function(){
	$(document).on('click', '.deletedcandidate', function(){
		var id = $(this).attr('id');
		swal({
		    title: "Are you sure?",
		    text: "You want to delete this candidate",
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonClass: "btn-danger",
		    confirmButtonText: "Yes delete it!",
		    closeOnConfirm: false
		},
		function(){
			$.ajax({
				type:'POST',
				url:"<?php echo e(route('deletedcandidate')); ?>",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackflag\resources\views/candidate/candidatedetail.blade.php ENDPATH**/ ?>