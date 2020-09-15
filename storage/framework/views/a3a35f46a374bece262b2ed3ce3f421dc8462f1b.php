<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
	          	<div class="col-sm-6">
	            	<h1>Edit Cms Management</h1>
	          	</div>
	          	<div class="col-sm-6">
	            	<ol class="breadcrumb float-sm-right">
	              		<li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a></li>
	              		<li class="breadcrumb-item active">Edit Cms Management</li>
	            	</ol>
	          	</div>
        	</div>
      	</div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-md-12">
          		<div class="card card-outline card-info">
          			<form method="POST" action="<?php echo e(route('cms/cmsupdate')); ?>" enctype="multipart/form-data" id="myform"  role="form">
          				<?php echo e(csrf_field()); ?>

	            		<div class="card-body pad">
			              	<div class="mb-3">
			                	<input type="text" name="title" class="form-control title" id="title" value="<?php echo $get_cms->title; ?>">
			                	<input type="hidden" name="id" class="form-control id" id="id" value="<?php echo $get_cms->id; ?>">
			              	</div>

			              	<div class="mb-3">
			                	<textarea class="summernote" placeholder="Place some text here" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_cms->description; ?></textarea>
			              	</div>
	            		</div>
	            		<div class="card-footer">
		                  	<button type="submit" class="btn btn-primary">Submit</button>
		                </div>
            		</form>
          		</div>
        	</div>
        	<!-- /.col-->
      	</div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
$(document).ready(function() {
  $('.summernote').summernote();
});
</script>
<style type="text/css">
.note-popover.popover.in.note-table-popover.bottom{
	display: none !important;
}
.note-popover.popover.in.note-image-popover.bottom{
	display: none !important;
}
.note-popover.popover.in.note-link-popover.bottom{
	display: none !important;
}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/cms/editcms.blade.php ENDPATH**/ ?>