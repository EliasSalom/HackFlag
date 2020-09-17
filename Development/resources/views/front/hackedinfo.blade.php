<?php

if(isset($is_hacked))
{   
    foreach ($is_hacked as $key => $value_hacker_detail)
    {

      echo "<pre>"; print_r($is_hacked); exit();
?>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
  <div class="toast-header">
    <svg class="rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
      focusable="false" role="img">
      <rect fill="#007aff" width="100%" height="100%" /></svg>
    <strong class="mr-auto"><?php echo $value_hacker_detail->username.' is haked you...'; ?></strong>
    <small class="text-muted">just now</small>
   <!--  <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button> -->
  </div>
  <div class="toast-body">
   Your Game Will be finished in : - <span class="getid" data-user_id="<?php echo $value_hacker_detail->id; ?>" id='timer'></span>
  </div>
</div>


<script>
  //define your time in second
    var c=60;
        var t;        
        /*var timecount = timedCount_<?php //echo $value_hacker_detail->id; ?>;*/
        timecount();
        
    function timecount()
    {
          var get_id = <?php echo $value_hacker_detail->id; ?>;          
    
          var hours = parseInt( c / 3600 ) % 24;
          var minutes = parseInt( c / 60 ) % 60;
          var seconds = c % 60;

          var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
          if(c > 0)
          {
            
          $('#timer').html(result);
          }
      if(c == 0 )
      {

        $('#timer').html('You Are Hacked');
              //setConfirmUnload(false);
                //$("#quiz_form").submit();
        //window.location="logout.html";
      }
            c = c - 1;
            t = setTimeout(function()
      {
       timecount()
      },

      

      1000);
        }
  </script>

  <?php
    }
}
?>

