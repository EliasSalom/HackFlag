@extends('layouts.front')

@section('content')

<div class="enterboxbg gamestartbg">

	<div class="row justify-content-center">

		<div class="col-md-8">

		

				<div class="logo">

					<a href="javascript:void(0);">

						<p class="text-center"><img src="{{URL::asset('/images/logo.png')}}" alt="Logo" /></p>

					</a>

				</div>

				



				<div class="message hide">Your game will be start shortly...</div>

				<div class="flaginfomain bg02">

					<div class="row">

						<div class="col-lg-6">

							<div class="flagbox">

								<h3>Personal Info Box</h3>

								<label>{{$candidate->first_name}} {{$candidate->last_name}}</label>

								<label>{{$candidate->username}}</label>

							</div>

						</div>

						<div class="col-lg-6">

							<div class="flagbox">

								<h3>Update box</h3>

								<label>(Timer, counter of hack, …)</label>

							</div>

						</div>

						<div class="col-lg-12">
                        
						<div class="flagbox">
    
							<div class="flagbox02">

								<h3>Effect box</h3>

								<label>(Name, rank,)</label>

								<span class="typewriter hide" >



									Y$#oA$%^GG*UYF0)&)00 ((*&UFJIF( UUT&%&^%$$ JDH%$#@$#&JD JKLJHJF^%#%$&$* ur con%$%te n$$#t  go%^e&^%s he^%5r*&&e<!-- 



									UUT&%&^%$$ JDH%$ F0)&)00((* &UFJIF(Y$#oA$ %^GG*UY$#&JD JKLJHJF^%#%$&$* ur con%$%te n$$#tco n%$%te n$$#go%^e&^%s he^%5r*&&e -->



								</span>

							</div>

					
                        
                        
                      

							<div class="flagbox02">

								<h3>Terminal box</h3>

								<div class="flalogo">

									<a href="javascript:void(0);">

								

									</a>

								</div>
                                
                                
								<div class="command_data text-left">					

								</div>
					        

                                <div class="prompt"></div><div class="prompttype"><input type="text" placeholder="type here..." name="cmd_field" data-game_id="<?php echo $game_id ?>" id="<?php echo $candidate_id; ?>" class="getdetails hide cmdline" autofocus style="height:inherit;"></div>

                                

								

                                

                                

                                

							</div>
                            
                       

						</div>

					</div>
                    </div>

				</div>

   





            

		</div>

	</div>

</div>









<script type="text/javascript">

var lastt, tdiff;

$( "p" ).click(function( event ) {  

	if (lastt) {

	  	tdiff = event.timeStamp - lastt;

	  	$( "div" ).append( "Time since last event: " + tdiff + "<br>" );

	} 

	else {

	    $( "div" ).append( "<br>Click again.<br>" );

	}

	lastt = event.timeStamp;

});	







$(document).ready(function(){

	$(document).on('keypress', '.getdetails', function(e){



		var candidate_id = $(this).attr('id');

		var game_id = $(this).data('game_id');

		var command = $(this).val();

		

		 if(e.which == 13)

		 {		 	

				$.ajax({

				type:'POST',

				url:"{{ route('runcommand') }}",

				data:{"_token": "{{ csrf_token() }}",candidate_id:candidate_id,command:command,game_id:game_id},



				success:function(data){



					if(data == 'wrong')

					{	

						

						$('.command_data').append('<p style="color:red;"><br>>>>['+command+']<br> this is not recognized as an internal or external command,<br>operable program or batch file.</p>');

						$('.getdetails').val('');

						

						

						/*$('.typewriter').addClass('hide');*/



					}

					else if(data == 'clear')

					{

					  $('.command_data').empty();

					  /*$('.typewriter').addClass('hide');*/	



					}

					else if(data == 'hacked')

					{

					$('.command_data').append('<br>>>>['+command+']<br> You are already hack this user for this game.');

					$('.command_data').append(data);

					$('.getdetails').val('');

					/*$('.typewriter').addClass('hide');*/

					}

					else if(data == 'shield')

					{

						$('.command_data').append('<br>>>>['+command+']<br> You have already purchase shield for this game.');

						$('.command_data').append(data);	

						$('.getdetails').val('');

						/*$('.typewriter').addClass('hide');*/

					}

					else if(data == 'upgrade shield')

					{

						$('.command_data').append('<br>>>>['+command+']<br> You have not enough points to upgrade shield for this game.');

						$('.command_data').append(data);	

						$('.getdetails').val('');

						/*$('.typewriter').addClass('hide');*/

					}

					else

					{

						$('.command_data').append('<p style="color:green;">'+data+'</p>');

						$('.getdetails').val('');

						/*$('.typewriter').addClass('hide');*/



					}

				}

			});	

		}

	});

});



$(document).ready(function(){

setInterval(function(){																								

		var candidate_id = <?php echo $candidate_id; ?>;            		            

		var game_id = <?php echo $game_id; ?>;            		            

                $.ajax({

                type:'POST',

                url:"{{ route('gamestartstatus') }}",

                data:{"_token": "{{ csrf_token() }}",candidate_id:candidate_id,game_id:game_id},

                success:function(data){

	                if(data == 0)

	                {                	

	                	$(".show_notification").removeClass('hide'); 

	                	$(".message").removeClass('hide'); 

	                	$(".getdetails").addClass('hide');



	                }

	                else

	                {

	                	$(".show_notification").addClass('hide');

	                	$(".getdetails").removeClass('hide');

	                	$(".message").addClass('hide');

	                	$(".header").addClass('hide');

	                	

							

	                }

                }

            });





            $.ajax({

                type:'POST',

                url:"{{ route('hackstatus') }}",

                data:{"_token": "{{ csrf_token() }}",candidate_id:candidate_id,game_id:game_id},

                success:function(data){

	                if(data == 0)

	                {               	

	                	

	                }

	                else

	                {

	                		

	                }

                }

            });        

 }, 1000);

 });





</script>

<script type="text/javascript" src="https://www.jqueryscript.net/demo/Minimal-jQuery-Animated-Text-Typing-Effect-Best-Typewriter/typewriter.js"></script>

<style type="text/css">

	.getdetails

	{

		height: 100px;

		width: 100%;

	}

input[type=text]

{

background: transparent;

border: none;

}



.message

{

	background-color: #000;

	color: #84AF10;

	font-family: cursive;

	text-transform: uppercase;

}



.user_images

{

	border-radius: 30px;	

}

.typewriter

{

	color:#1ff042;

}

.pagebg-black{background:rgba(0,0,0,0.9);}

.getdetails{color:#1ff042;}

.getdetails::-webkit-input-placeholder { /* Chrome/Opera/Safari */

  color: #1ff042;

}

.getdetails::-moz-placeholder { /* Firefox 19+ */

  color: #1ff042;

}

.getdetails:-ms-input-placeholder { /* IE 10+ */

  color: #1ff042;

}

.getdetails:-moz-placeholder { /* Firefox 18- */

  color: #1ff042;

}



.prompt{color:#1ff042; float:left;}

.cmdline{color:#1ff042; background:none; border:none; outline:none;}

.prompttype{float:left;}

.command_data{float:left; width:100%; padding:20px;}

.footer{display:none;}

</style>





<script>

	$(document).on('keypress',function(e) {

    if(e.which == 13) {

    	$('.typewriter').removeClass('hide');

        //alert('You pressed enter!');

        $(function() {

$(".typewriter").typewriter({

'speed':10 // default: 300

});

});

    }

});



</script>



<script>

$(function() {

  

  // Set the command-line prompt to include the user's IP Address

  //$('.prompt').html('[' + codehelper_ip["IP"] + '@HTML5] # ');

    $('.prompt').html('[user@HTML5] # ');



  // Initialize a new terminal object

 /* var term = new Terminal('#input-line .cmdline', '#container output');

  term.init();*/

  

  // Update the clock every second

  setInterval(function() {

    function r(cls, deg) {

      $('.' + cls).attr('transform', 'rotate('+ deg +' 50 50)')

    }

    var d = new Date()

    r("sec", 6*d.getSeconds())  

    r("min", 6*d.getMinutes())

    r("hour", 30*(d.getHours()%12) + d.getMinutes()/2)

  }, 1000);

  

});

</script>



@endsection