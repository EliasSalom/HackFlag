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
				                  	<th>Need to join</th>
				                  	<th>joined player</th>
				                  	<th>Start Game</th>
				                  	<th>Status</th>
				                  	<th>Action</th>
				                  	
				                </tr>
                			</thead>
                			<tbody>
                				<?php                				

                				if($get_game_detailss)
                				{
                					$i=1;
                					foreach ($get_game_detailss as $key => $get_game_detail) 
                					{
                					?>
		                				<tr class="game_id_<?php echo $get_game_detail->id; ?>">
		                					<td><?php echo $i; ?></td>
		                					<td><?php echo $get_game_detail->game_name; ?></td>
		                					<td><?php echo $get_game_detail->game_code ?></td>
		                					<td><?php echo $get_game_detail->game_play ?></td>
		                					<td><?php if(isset($array_count_game[$get_game_detail->id]) && $array_count_game[$get_game_detail->id] !=''){
		                					?>
		                					<span class="btn btn-info btn-lg get_userdata" id="<?php echo $get_game_detail->id; ?>" data-toggle="modal" data-target="#myModal_<?php echo $get_game_detail->id; ?>">
		                					<?php echo $array_count_game[$get_game_detail->id]; ?></span> <?php } else{ echo '-'; } ?></td>

		                					<?php /*<td>
		                						<?php if(isset($get_game_detail->is_start) && $get_game_detail->is_start == 0){ ?>
		                						<span class="startgame_<?php echo $get_game_detail->id; ?>">
		                							<a href="javascript:void(0);" id="<?php echo $get_game_detail->id; ?>" data_active="0" class="btn btn-info gamestart">Start Game </a>
		                						</span>
		                						<?php } else { ?>
		                							<span class="startgame_<?php echo $get_game_detail->id; ?>"><a href="javascript:void(0);" id="<?php echo $get_game_detail->id; ?>" data_active="1" class="btn btn-info disabled gamestart">Game Started... </a></span>
		                						<?php } ?>
		                					</td> */ ?>

		                					<td>
		                						<?php if(isset($get_game_detail->is_start) && $get_game_detail->is_start == 0){ 

		                							?>

		                							<p class="start_filter_<?php echo $get_game_detail->id; ?>"><span id="<?php echo $get_game_detail->id; ?>" class="gamestart startgame_<?php echo $get_game_detail->id; ?>" data-is_start="0">
		                						<input type="checkbox" data-toggle="toggle" data-off="Off"></span></p>
		                						<?php } else { ?>
		                							<p class="start_filter_<?php echo $get_game_detail->id; ?>"><span id="<?php echo $get_game_detail->id; ?>" class="gamestart startgame_<?php echo $get_game_detail->id; ?>" data-is_start="1">
		                						<input type="checkbox" data-toggle="toggle" data-on="On">
		                					</span></p>
		                					<?php } ?>	
											</td>

		                					<td><?php if(isset($get_game_detail->status) && $get_game_detail->status == 1){ ?>
								      		<span class="managestatus_<?php echo $get_game_detail->id; ?>"><a href="javascript:void(0);" id="<?php echo $get_game_detail->id; ?>" data_active="1" class="btn btn-info gamestatus">Active </a></span>
              								<?php } else{ ?>
              								<span class="managestatus_<?php echo $get_game_detail->id; ?>"><a href="javascript:void(0);" id="<?php echo $get_game_detail->id; ?>" data_active="0" class="btn btn-danger gamestatus inactive">Inactive </a></span>
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

<?php                				

if($get_game_detailss)
{
	$i=1;
	foreach ($get_game_detailss as $key => $get_game_detail) 
	{
		?>
<div id="myModal_<?php echo $get_game_detail->id; ?>" class="modal fade hide" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Joined Candidate Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="modal-body">
        <p class="userdetail">
        
    </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
}
} 
?>
<!-- <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>  -->

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

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

	$(document).on('click', '.gamestart', function(){
		var game_id = $(this).attr('id');
		var is_start = $(this).data('is_start');
		
		$.ajax({
            type:'POST',
            url:"{{ route('gamestart') }}",
            data:{"_token": "{{ csrf_token() }}",game_id:game_id,is_start:is_start},
            success:function(data)
            {          
                if(data == 0)
                {                	
                	swal("Sorry!", "player are not enough to play this game for now!", "info");
                	$('.start_filter_'+game_id).html('<span id="'+game_id+'" class="gamestart startgame_'+game_id+'" data-is_start="1"><input type="checkbox" data-toggle="toggle" data-off="Off"></span>');
                	 window.location.reload();   
					
                }
                else if(data == 2)
                {
                	$('.start_filter_'+game_id).html('<span id="'+game_id+'" class="gamestart startgame_'+game_id+'" data-is_start="0"><input type="checkbox" data-toggle="toggle" data-off="Off"></span>');
                	              window.location.reload();   	
                }
                else
                {
                	$('.start_filter_'+game_id).html('<span id="'+game_id+'" class="gamestart startgame_'+game_id+'" data-is_start="0"><input type="checkbox" data-toggle="toggle" data-off="On"></span>');
                	window.location.reload(); 
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


$(document).ready(function(){
	$(document).on('click', '.get_userdata', function(){
		var id = $(this).attr('id');		
		
			$.ajax({
				type:'POST',
				url:"{{ route('game/getuserdetail') }}",
				data:{"_token": "{{ csrf_token() }}",id:id},

				success:function(data){
						$('.userdetail').html(data);
					
				}
			});
		
	});
});

</script>
@endsection