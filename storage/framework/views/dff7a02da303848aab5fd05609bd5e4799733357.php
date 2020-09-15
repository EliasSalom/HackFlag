<table class="table">
		<thead>
<th>S.No</th>			
<th>Name</th>
<th>Username</th>
<th>Email</th>
		</thead>
	<tbody>
		<?php
		$count=1;
		foreach ($get_details as $key => $value_get_details)
		{

			?>
<tr>
	<td><?php echo $count; ?></td>
	<td><?php echo $value_get_details->first_name; ?></td>
	<td><?php echo $value_get_details->username; ?></td>
	<td><?php echo $value_get_details->email; ?></td>
</tr>
			<?php
			$count++;
}

?>
	</tbody>
</table>

	<?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/game/getuserdetail.blade.php ENDPATH**/ ?>