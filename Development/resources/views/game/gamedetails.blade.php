@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
	        <div class="row mb-2">
		        <div class="col-sm-6">
		            <h1>Game Mode</h1>
		        </div>
	          	<div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              	<li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
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
	          		 <div class="card-header">
		              	<h3 class="card-title pull-right"><a class="btn btn-primary" href="{{ url('/game/addgame') }}">Add Game</a></h3>
		            </div>
		            
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
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script> 
<script>
$(function () {
   	$("#example1").DataTable();
});
</script>
@endsection