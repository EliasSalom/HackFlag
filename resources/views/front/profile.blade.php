@extends('layouts.front')
@section('content')
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="row">
					<div class="col-md-4">
						<div class="profileleft">
							<p class="mb-3">
								<?php if(isset($candidate->image) && $candidate->image != ''){ ?>
									<img src="{{URL::asset('/user/'.$candidate->image.'')}}" alt="" />
								<?php } else{ ?>
									<img src="{{URL::asset('/user/no-image.png')}}" alt="" />
								<?php } ?> 	
							</p>
							<p><a href="{{ url('gamecode') }}">Now Playing</a></p>
							<p><a href="javascript:void(0);">Recent Activity<span>6</span></a></p>
							<p><a href="{{ url('changepassword') }}">Change Password</a></p>
						</div>
					</div>

					<div class="col-md-8 text-left">
						<div class="profileright-top">
							<h1><?php echo $candidate->first_name.' '.$candidate->last_name; ?></h1>
							<p class="mb-3">DayZ100</p>
						</div>

						<div class="matchwon-row">
							<h3>Total Matches Won</h3>
							<span><img src="images/trophy.png" alt="" /> 2145</span>
							<a href="javascript:void(0);" class="viewbtn">view more</a>
						</div>

						<div class="globediv">
							<div id="earth_div"></div>
						</div>

						<div class="matchwon-row">
							<h3>Now Playing</h3>
							<span>KNACK <sub>Monte Verde 40 Min.</sub></span>
							<a href="javascript:void(0);" class="viewbtn">join game</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

<script type="text/javascript">
	/*setInterval(function(){
	 
	 $.ajax({
            type:'POST',
            url:"{{ route('gamestart') }}",
            data:{"_token": "{{ csrf_token() }}",game_id:game_id},
            success:function(data)
            {          
                if(data == 0)
                {
					swal("Sorry!", "player are not enough to play this game for now!", "info");					
                	 		
                }
                else
                {
                	$('.startgame_'+game_id).html('<a href="javascript:void(0);" id="'+game_id+'" data_active="1" class="btn btn-info disabled gamestart">Game Started...</a>'); 
                }
            }
        });

	}, 3000);
*/
</script>