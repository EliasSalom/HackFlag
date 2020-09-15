
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
	        <div class="row mb-2">
		        <div class="col-sm-6">
		            <h1>Game Mode</h1>
		        </div>
	          	<div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              	<li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a></li>
		              	<li class="breadcrumb-item active">Game Mode</li>
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
				                  	<th>Game Name</th>
				                  	<th>Game Code</th>
				                  	<th>No Of User</th>
				                </tr>
                			</thead>
                			<tbody>
                				<?php if($get_game_details)
                				{
                					$i=1;
                					foreach ($get_game_details as $key => $get_game_detail) 
                					{
                					?>
		                				<tr>
		                					<td><?php echo $i; ?></td>
		                					<td><?php echo $get_game_detail->game_name; ?></td>
		                					<td><?php echo $get_game_detail->game_code; ?></td>
		                					<td><?php echo $get_game_detail->game_play; ?></td>
		                				</tr>
		                			<?php $i++; }
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/game/gamedetails.blade.php ENDPATH**/ ?>