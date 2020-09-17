	<div class="footer">© <?php echo date('Y'); ?>  Hackflag . All rights reserved</div>
</div>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/digitalrain.js') }}"></script>


<div class="show_notification">
</div>


<?php
 $candidate = session()->get('candidate'); 
 if(isset($candidate->id))
 { 	
?>

<script type="text/javascript">
$(document).ready(function(){
setInterval(function(){																								
		var candidate_id = <?php echo $candidate->id ?>;            		            
                $.ajax({
                type:'POST',
                url:"{{ route('hackedinfo') }}",
                data:{"_token": "{{ csrf_token() }}",candidate_id:candidate_id},
                success:function(data){                      
						$(".show_notification").append(data);                     
                }
            });

       /*$.ajax({
            type:'POST',
            url:"{{ route('userhack') }}",
            data:{"_token": "{{ csrf_token() }}",candidate_id:candidate_id},
            success:function(data)
            {          
               
            }
        });*/
 }, 8888);
 });
</script>

<?php } ?>

<style type="text/css">
.toast
{
max-width: 350px;
overflow: hidden;
font-size: 0.875rem;
background-color:
rgba(255, 255, 255, 0.85);
background-clip: padding-box;
border: 1px solid
rgba(0, 0, 0, 0.1);
box-shadow: 0 0.25rem 0.75rem
rgba(0, 0, 0, 0.1);
-webkit-backdrop-filter: blur(10px);
backdrop-filter: blur(10px);
opacity: 1;
border-radius: 0.25rem;
}
</style>
</body>
</html>