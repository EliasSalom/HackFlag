<?php if($command == 'check lan') { ?> 
<div class="row">
	<p><?php echo $command; ?></p>
</div>
<div class="row">	
<?php 
if($get_joined_user)
{
	foreach ($get_joined_user as $key => $value_joined_user)
	{
?>		<div class="col-md-2">
		<?php echo $value_joined_user->username; ?><br>
	</div>
<?php } } ?>

</div>
<?php } ?>

<?php if($command == 'check user') { ?> 

<div class="row">
	<p><?php echo $command; ?></p>
</div>
<div class="row">	
<?php 
if($get_joined_user)
{
	
?>
	<div class="col-md-12 link_option">
					
		<div class="gamestarttablee">
			<table class="table">
			  <thead>
			    <tr>			      
			      <th>Username</th>
			      <th>Name</th>
			      <th>Email</th>
			      <th>Phone</th>			      
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($get_joined_user as $key => $value_joined_user)
					{ ?>
			    <tr>			    	
			      <td><?php echo $value_joined_user->username; ?></td>
			      <td><?php echo $value_joined_user->first_name.' '.$value_joined_user->last_name; ?></td>
			      <td><?php echo $value_joined_user->email; ?></td>
			      <td><?php echo $value_joined_user->phone; ?></td>			      
			    </tr>
			<?php } ?>
			  </tbody>
			</table>
		</div>

	</div>
<?php  } ?>
</div>
<?php } ?>

<?php if($command == 'help') { ?> 
<div class="row">
	<h3>These are command you can use to play game......</h3>
</div>
<div class="row">
	<p><?php echo $command; ?></p>
</div>
<div class="row">	
<?php 
if($get_commands)
{
	foreach ($get_commands as $key => $value_get_commands)
	{
?>		<div class="col-md-2">
		<?php echo $value_get_commands->command_name; ?><br>
	</div>
<?php } } ?>

</div>
<?php } ?>

<style type="text/css">
	.link_option
	{
		cursor: pointer;
	}
</style>
<?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/front/runcommand.blade.php ENDPATH**/ ?>