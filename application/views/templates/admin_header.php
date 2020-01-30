<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>ADMIN</title>
	<link rel="stylesheet" href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?=base_url();?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>
<body>
	<!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">


		<!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="<?=base_url();?>">Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url();?>assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Admin</h5>
                                    <span class="status"></span><span class="ml-2">Online</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Akun</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Pengaturan</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->

		<!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu Utama
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?=base_url();?>Admin" aria-expanded="false"><i class="fa fa-fw fa-info"></i>Dashboard</a>
                            </li>
                            <li>
                            	<a class="nav-link" href="<?=base_url();?>Admin/pembayaran" aria-expanded="false"><i class="fa fa-fw fa-credit-card"></i>Data Pembayaran</a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?=base_url();?>Admin/order" aria-expanded="false"><i class="fa fa-fw fa-list"></i>Data Order</a>
                            </li>
                            	
                            <li class="nav-divider">
                                Master Data
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-cog"></i>Kelola Akun</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url();?>Admin/set_admin"><i class="fa fa-fw fa-user-secret"></i>Admin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url();?>Admin/set_user"><i class="fa fa-fw fa-users"></i>User</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url();?>Admin/katalog"><i class="fas fa-fw fa-tags"></i>Data Katalog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url();?>Admin/koleksi"><i class="fas fa-fw fa-list-alt"></i>Data Koleksi</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">