<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300, 400,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
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
                 <li><a href="{{ url('/') }}" title="Login"><img src="{{URL::asset('/images/login-icon.png')}}" alt="{{URL::asset('/images/login-icon.png')}}" /></a></li>
                <li><a href="{{ url('register') }}" title="Registration"><img src="{{URL::asset('/images/registration-icon.png')}}" alt="" /></a></li>
            <?php } ?>    
            <li><a href="{{ url('profile') }}" title="Profile"><img src="{{URL::asset('/images/profile-icon.png')}}" alt="" /></a></li>
            <li><a href="{{ url('aboutus') }}" title="About"><img src="{{URL::asset('/images/about-icon.png')}}" alt="" /></a></li>
            <li><a href="{{ url('winner') }}" title="Winner"><img src="{{URL::asset('/images/winner-icon.png')}}" alt="" /></a></li>
            <?php if(isset($candidate->id) && $candidate->id != '')
            { ?>
                <li><a href="{{ url('logout') }}" title="Logout"><img src="{{URL::asset('/images/logout.png')}}" alt="" /></a></li>
            <?php } ?>
        </ul>
    </div>

  