<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300, 400,600,700&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css">
    
    <title>Hackflag</title>
</head>
<body>
<canvas id="digitalRain"></canvas>
<div class="maincontent">
    <div class="header">
        <ul>
            <li><a href="<?php echo e(url('/')); ?>" title="Login"><img src="<?php echo e(URL::asset('/images/login-icon.png')); ?>" alt="<?php echo e(URL::asset('/images/login-icon.png')); ?>" /></a></li>
            <li><a href="<?php echo e(url('register')); ?>" title="Registration"><img src="<?php echo e(URL::asset('/images/registration-icon.png')); ?>" alt="" /></a></li>
            <li><a href="<?php echo e(url('profile')); ?>" title="Profile"><img src="<?php echo e(URL::asset('/images/profile-icon.png')); ?>" alt="" /></a></li>
            <li><a href="<?php echo e(url('aboutus')); ?>" title="About"><img src="<?php echo e(URL::asset('/images/about-icon.png')); ?>" alt="" /></a></li>
            <li><a href="<?php echo e(url('winner')); ?>" title="Winner"><img src="<?php echo e(URL::asset('/images/winner-icon.png')); ?>" alt="" /></a></li>
        </ul>
    </div><?php /**PATH C:\xampp\htdocs\hackflag\resources\views/includes/header.blade.php ENDPATH**/ ?>