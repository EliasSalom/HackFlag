<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300, 400,600,700&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert.css')); ?>">
    <script src="<?php echo e(asset('js/jquery-3.3.1.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>
    <title>Hackflag</title>
</head>
<body>
<canvas id="digitalRain"></canvas>
<div class="maincontent">
    <div class="header">
        <ul>
            <?php if(isset($candidate->id) && $candidate->id != '')
            { ?>
               
            <?php } else{ ?>
                 <li><a href="<?php echo e(url('/')); ?>" title="Login"><img src="<?php echo e(URL::asset('/images/login-icon.png')); ?>" alt="<?php echo e(URL::asset('/images/login-icon.png')); ?>" /></a></li>
                <li><a href="<?php echo e(url('register')); ?>" title="Registration"><img src="<?php echo e(URL::asset('/images/registration-icon.png')); ?>" alt="" /></a></li>
            <?php } ?>    
            <li><a href="<?php echo e(url('profile')); ?>" title="Profile"><img src="<?php echo e(URL::asset('/images/profile-icon.png')); ?>" alt="" /></a></li>
            <li><a href="<?php echo e(url('aboutus')); ?>" title="About"><img src="<?php echo e(URL::asset('/images/about-icon.png')); ?>" alt="" /></a></li>
            <li><a href="<?php echo e(url('winner')); ?>" title="Winner"><img src="<?php echo e(URL::asset('/images/winner-icon.png')); ?>" alt="" /></a></li>
            <?php if(isset($candidate->id) && $candidate->id != '')
            { ?>
                <li><a href="<?php echo e(url('logout')); ?>" title="Logout"><img src="<?php echo e(URL::asset('/images/logout.png')); ?>" alt="" /></a></li>
            <?php } ?>
        </ul>
    </div>

  <?php /**PATH /home/demoarrj1n/public_html/Hackflag/Development/resources/views/includes/header.blade.php ENDPATH**/ ?>