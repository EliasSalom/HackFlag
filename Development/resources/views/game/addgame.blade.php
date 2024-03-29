@extends('layouts.teacher')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
	          	<div class="col-sm-6">
	            	<h1>Add Game Mode</h1>
	          	</div>
	          	<div class="col-sm-6">
	            	<ol class="breadcrumb float-sm-right">
	              		<li class="breadcrumb-item"><a href="{{ url('/teacher/dashboard') }}">Home</a></li>
	              		<li class="breadcrumb-item active">Add Game Mode</li>
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
          			<form method="POST" action="{{ route('game/add') }}" enctype="multipart/form-data" id="myform"  role="form">
          				{{ csrf_field() }}
	            		<div class="card-body pad">
			              	<div class="form-group">
		                    	<label for="exampleInputGameName1">Game Name</label>
		                    	<input type="text" class="form-control game_name" name="game_name" id="exampleInputGameName1" placeholder="Enter Game Name">
		                  	</div>

			              	<div class="form-group">
			              		<label for="exampleInputGameDescription1">Game Description</label>
			                	<textarea class="summernote form-control" placeholder="Game Description" name="game_description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
			              	</div>

			              	<div class="form-group">
		                    	<label for="exampleInputFile">Game Image</label>
		                    	<div class="input-group">
		                      		<div class="custom-file">
		                        		<input type="file" name="game_image" class="custom-file-input game_image" id="exampleInputFile">
		                        		<label class="custom-file-label" for="exampleInputFile">Choose file</label>
		                      		</div>
		                      		
		                    	</div>
		                  	</div>
		                  	<div class="form-group">
		                    	<label for="exampleInputGameplayplay1">Game no of user play</label>
		                    	<input type="text" class="form-control game_play" name="game_play" id="exampleInputGameplayplay1" placeholder="Enter Game no of user play">
		                  	</div>
		                  	<div class="form-group">
		                    	<label for="exampleInputGameCode1">Game Code</label>
		                    	<input type="text" class="form-control game_code" name="game_code" id="exampleInputGameCode1" placeholder="Enter Game Code" readonly="readonly">
		                  	</div>

                        <div class="form-group">
                          <label for="exampleInputGameCode1">Game Points</label>
                          <input type="text" class="form-control" name="game_points" id="gamepoints" placeholder="Enter Game Points">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputGameCode1">Shield Points</label>
                          <input type="text" class="form-control" name="shield_points" id="" placeholder="Enter Shield Points">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputGameCode1">Upgrade Shield Points</label>
                          <input type="text" class="form-control" name="upgrade_shield_points" id="" placeholder="Enter Upgrade Shield Points">
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
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/additional-methods.min.js') }}"></script>
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
<script type="text/javascript">

$(function() {
	$("#myform").validate({
    // Specify validation rules register
        rules: {
            game_name: {
                required: true
            },
            game_code: {
                required: true
            },
            game_points: {
                required: true
            },
            shield_points: {
                required: true
            },
            upgrade_shield_points: {
                required: true
            },
            game_description: {
                required: true
            },
            game_image: {
		      	required: true,
		      	accept: "image/*"
		    },
        },
        messages: {
        	game_name: {
                required: 'Please insert game name ',
            },
            game_code: {
                required: 'Please insert  game code',
            },
            game_points: {
                required: 'Please insert game points',
            },
            shield_points: {
                required: 'Please insert shield points',
            },
            upgrade_shield_points: {
                required: 'Please insert upgrade shield points',
            },
            game_description: {
                required: 'Please insert game description ',
                
            },
            image: {
                required: "Please upload only image",
            },
            
       	},
        submitHandler: function(form) {
        	form.submit();
        }
    });
});

$(document).ready(function(){
	$('.game_name').on('blur', function(){
		let r = Math.random().toString(36).substring(7);
		$('.game_code').val(r);

	});
});
</script>

@endsection