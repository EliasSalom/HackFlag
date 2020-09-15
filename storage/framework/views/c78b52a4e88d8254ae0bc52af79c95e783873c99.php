<?php $__env->startSection('content'); ?>
<div class="enterboxbg">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="pagebg">
				<div class="row">
					<div class="col-md-4">
						<div class="profileleft">
							<p class="mb-3"><img src="images/profile.jpg" alt="" /></p>
							<p><a href="#">Now Playing</a></p>
							<p><a href="#">Recent Activity<span>6</span></a></p>
							<p><a href="#">Change Password</a></p>
						</div>
					</div>

					<div class="col-md-8 text-left">
						<div class="profileright-top">
							<h1>Henry Bayle</h1>
							<p class="mb-3">DayZ100</p>
						</div>

						<div class="matchwon-row">
							<h3>Total Matches Won</h3>
							<span><img src="images/trophy.png" alt="" /> 2145</span>
							<a href="#" class="viewbtn">view more</a>
						</div>

						<div class="globediv">
							<div id="earth_div"></div>
						</div>

						<div class="matchwon-row">
							<h3>Now Playing</h3>
							<span>KNACK <sub>Monte Verde 40 Min.</sub></span>
							<a href="#" class="viewbtn">join game</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hackflag\resources\views/front/profile.blade.php ENDPATH**/ ?>