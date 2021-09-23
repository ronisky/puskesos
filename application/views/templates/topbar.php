<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <!-- <?php if ($this->session->role_id == 1) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">
                        <div class="notif_jumlah"></div>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
                        <div class="notif_jumlah"></div> Pesan

                    </span>
                    <div class="notif_proposal"></div>
                </div>
            </li>
        <?php } elseif ($this->session->role_id == 2) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">
                        <div class="notif_jumlahormawa"></div>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
                        <div class="notif_jumlahormawa"></div> Pesan


                    </span>
                    <div class="notif_proposalormawa"></div>
                </div>
            </li>
        <?php } elseif ($this->session->role_id == 3) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">
                        <div class="notif_jumlahbem"></div>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
                        <div class="notif_jumlahbem"></div> Pesan


                    </span>
                    <div class="notif_proposalbem"></div>
                </div>
            </li>
        <?php } elseif ($this->session->role_id == 4) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">
                        <div class="notif_jumlahdpm"></div>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
                        <div class="notif_jumlahdpm"></div> Pesan

                    </span>
                    <div class="notif_proposaldpm"></div>
                </div>
            </li>
        <?php } ?> -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" title="Akun">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>


</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $menu1; ?></a></li>

                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>

                </div>
            </div>
        </div><!-- /.container-fluid -->


    </section>