@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
	        <div class="row mb-2">
		        <div class="col-sm-6">
		            <h1>Cms Management</h1>
		        </div>
	          	<div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              	<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
		              	<li class="breadcrumb-item active">Cms Management</li>
		            </ol>
	          	</div>
	        </div>
      	</div><!-- /.container-fluid -->
    </section>

    <section class="content">
      	<div class="row">
        	<div class="col-12">
	          	<div class="card">
		            @if ($message = Session::get('success'))
		                <div class="alert alert-success alert-block">
		                    <button type="button" class="close" data-dismiss="alert">×</button> 
		                    <strong>{{ $message }}</strong>
		                </div>
		            @endif
		            <!-- /.card-header -->
		            <div class="card-body">
		            	<div class="message_shows"></div>
		              	<table id="example1" class="table table-bordered table-striped">
		                	<thead>
				                <tr>
				                  	<th>S.No.</th>
				                  	<th>Title</th>
				                  	<th>Action</th>
				                </tr>
                			</thead>
                			<tbody>
                				<?php if($get_cmss)
                				{
                					$i=1;
                					foreach ($get_cmss as $key => $get_cms) 
                					{
                					?>
		                				<tr>
		                					<td><?php echo $i; ?></td>
		                					<td><?php echo $get_cms->title ?></td>
		                					<td><a href="{{ route('cms/editcms',$get_cms->id) }}" class="actionbtn">
									      			<i class="fa fa-pencil" aria-hidden="true"></i>
									      		</a></td>
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
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>

<script>
$(function () {
   	$("#example1").DataTable();
});
</script>
@endsection