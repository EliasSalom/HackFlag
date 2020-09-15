<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>HackFlag</title>
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
<!-- IonIcons -->
<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
                <a href="{{ url('/admin/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <?php 
    $page = '';
    $page_url = Request::path();
    $url_array = explode('/', $page_url);
     if(isset($url_array[0]))
     {
        $page = $url_array[0]; 
     }   
    ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                
                <div class="info">
                    <a href="javascript:void(0);" class="d-block">Admin</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="{{ url('/teacher/dashboard') }}" class="nav-link <?php if($page=='teacher'){ echo 'active'; } ?>">
                            <i class="nav-icon fa fa-tachometer"></i>
                            <p>
                                Dashboard                   
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ url('/candidate/allcandidate') }}" class="nav-link <?php if($page=='candidate'){ echo 'active'; } ?>">
                            <i class="nav-icon fa fa-chart-pie"></i>
                            <p>
                                Candidate        
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ url('/game/index') }}" class="nav-link <?php if($page=='game'){ echo 'active'; } ?>">
                            <i class="nav-icon fa fa-chart-pie"></i>
                            <p>
                                Game Management        
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>