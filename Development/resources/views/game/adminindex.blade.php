@extends('layouts.teacher')
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
		              	<li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}">Home</a></li>
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
				                  	<th>Status</th>
				                  	<th>Action</th>
				                </tr>
                			</thead>
                			<tbody>
                				<?php if($get_game_details)
                				{
                					$i=1;
                					foreach ($get_game_details as $key => $get_game_detail) 
                					{
                					?>
		                				<tr class="game_id_<?php echo $get_game_detail->id; ?>">
		                					<td><?php echo $i; ?></td>
		                					<td><?php echo $get_game_detail->game_name; ?></td>
		                					<td><?php echo $get_game_detail->game_code ?></td>
		                					<td><?php if(isset($get_game_detail->status) && $get_game_detail->status == 1){ ?>
								      		<span class="managestatus_<?php echo $get_game_detail->id; ?>"><a href="javascript:void(0);" id="<?php echo $get_game_detail->id; ?>" data_active="0" class="btn btn-info gamestatus">Active </a></span>
              								<?php } else{ ?>
              								<span class="managestatus_<?php echo $get_game_detail->id; ?>"><a href="javascript:void(0);" id="<?php echo $get_game_detail->id; ?>" data_active="1" class="btn btn-danger gamestatus inactive">Inactive </a></span>
              								<?php } ?>
	              							</td>
									      	<td>
									      		<a href="{{ route('game/editgame',$get_game_detail->id) }}" class="actionbtn">
									      			<i class="fa fa-pencil" aria-hidden="true"></i>
									      		</a>
	      										<a href="javascript:void(0);" class="actionbtn deletedgame" id="<?php echo $get_game_detail->id; ?>">
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
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script> 
<script>
$(function () {
   	$("#example1").DataTable();
});

$(document).ready(function(){
	$(document).on('click', '.gamestatus', function(){
		var game_id = $(this).attr('id');
		var status_id = $(this).attr('data_active');
		$.ajax({
            type:'POST',
            url:"{{ route('gamestatus') }}",
            data:{"_token": "{{ csrf_token() }}",game_id:game_id,status_id:status_id},
            success:function(data)
            {
           
                if(data == 0)
                {
                	$('.message_shows').html('<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>Game status is inactive successfully</strong></div>');
                	$('.managestatus_'+game_id).html('<a href="javascript:void(0);" id="'+game_id+'" data_active="1" class="btn btn-danger gamestatus inactive">Inactive</a>');   		
                }else if(data == 1)
                {
                	$('.message_shows').html('<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>Game status is active successfully</strong></div>');
                	$('.managestatus_'+game_id).html('<a href="javascript:void(0);" id="'+game_id+'" data_active="0" class="btn btn-info gamestatus">Active</a>');
                }
            }
        });
	});
});

$(document).ready(function(){
	$(document).on('click', '.deletedgame', function(){
		var id = $(this).attr('id');
		swal({
		    title: "Are you sure?",
		    text: "You want to delete this game",
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonClass: "btn-danger",
		    confirmButtonText: "Yes delete it!",
		    closeOnConfirm: false
		},
		function(){
			$.ajax({
				type:'POST',
				url:"{{ route('deletedgame') }}",
				data:{"_token": "{{ csrf_token() }}",id:id},

				success:function(data){
					if(data == 1)
					{
						$('.game_id_'+id).fadeOut('fast');
						swal("Success", "Candidate Successfully Deleted!", "success");
					}
				}
			});
		});
	});
});
</script>
@endsection