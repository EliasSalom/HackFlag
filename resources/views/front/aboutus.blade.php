@extends('layouts.front')
@section('content')
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="loginform">
					<h1><?php echo $get_cms_about->title; ?></h1>

					<p class="mb-4"><?php echo $get_cms_about->description; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection