<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- easter egg -->
    <link rel="Shortcut icon" href="/img/favicon.ico" type="image/x-icon"/>
    <title>Al Omrane</title>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- SEARCH FORM
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        -->

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" title="Se déconnecter"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-power-off fa-2x logout-red"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/accueil" class="brand-link">
            <img src="/img/logo-omrane.png" alt="Al Omrane Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Al Omrane</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/img/profile.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">
                        {{Auth::user()->name}}
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <router-link to="/accueil" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Accueil
                            </p>
                        </router-link>
                    </li>
                    <!--
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-handshake nav-icon"></i>
                            <p>
                                Gestion Fournisseurs
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/listefournisseurs" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>
                                        Liste Fournisseurs
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/ajouterfournisseur" class="nav-link">
                                    <i class="fas fa-user-plus nav-icon"></i>
                                    <p>
                                        Ajouter Fournisseur
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/archivefournisseurs" class="nav-link">
                                    <i class="fas fa-archive nav-icon"></i>
                                    <p>
                                        Archive Fournisseurs
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    -->

                    <li class="nav-item">
                        <router-link to="/listedocuments" class="nav-link">
                            <i class="fas fa-list nav-icon"></i>
                            <p>
                                Liste Documents
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/ajouterdocument" class="nav-link">
                            <i class="fas fa-plus-square nav-icon"></i>
                            <p>
                                Ajouter Document
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/archivedocuments" class="nav-link">
                            <i class="fas fa-archive nav-icon"></i>
                            <p>
                                Archive Documents
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/ajouterscenario" class="nav-link">
                            <i class="fas fa-plus-square nav-icon"></i>
                            <p>
                                Nouveau Scenario
                            </p>
                        </router-link>
                    </li>
                    <!--
                    <li class="nav-item">
                        <router-link to="/calendrier" class="nav-link">
                            <i class="fas fa-calendar-alt nav-icon"></i>
                            <p>
                                Calendrier
                            </p>
                        </router-link>
                    </li>
                    -->

                    <!--
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-power-off"></i>
                            <p> {{ __('Se déconnecter') }} </p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    -->

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            <br/>
            <br/>
            <div class="container-fluid">
                <router-view></router-view>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">

        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="https://www.alomrane.gov.ma/">Al Omrane</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="/js/app.js"></script>
</body>
</html>
