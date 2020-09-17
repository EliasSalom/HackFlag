@extends('layouts.front')
@section('content')
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="user-profile">
					<h1>Winner</h1>
					<div class="pagetable">
						<table class="table">
						  	<thead>
						    	<tr>
							      	<th>#</th>
							      	<th>&nbsp;</th>
							      	<th>Name</th>
							      	<th>Score</th>
						    	</tr>
						  	</thead>
						  	<tbody>
						    	<tr>
						      		<td>1</td>
							      	<td><img src="images/profile.jpg" alt="" class="winnerimg" /></td>
							      	<td>Jeremy Rose</td>
							      	<td>1000</td>
						    	</tr>
						   	</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection