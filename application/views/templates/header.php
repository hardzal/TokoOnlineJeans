<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $title; ?> - TokoJeans</title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link href="<?= base_url(); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/libs/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
</head>

<body>
	<!-- ============================================================== -->
	<!-- main wrapper -->
	<!-- ============================================================== -->
	<!-- <div class="dashboard-main-wrapper"> -->
	<!-- navbar -->
	<div class="header container-fluid">
		<div class="row bg-dark text-center px-4 py-1">
			<div class="col-sm-4 col-sm-2">
				<a href="#"><img class="img-fluid" src="<?= base_url("assets/images/logo.jpeg") ?>"></a>
			</div>
			<div class="col-sm-4 col-sm-2">
				<h2 class="text-light" style="font-weight: bold;">Selamat Datang di Denim Factory</h2>
				<h4 class="text-light">Look Cool Anytime and Anywhere</h4>
			</div>
			<div class="col-sm-4 col-sm-2">
				<a href="#"><img class="img-fluid" src="<?= base_url("assets/images/logo.jpeg") ?>"></a>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style=" margin-right: -15px; margin-left: -15px;">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">

				<ul class="navbar-nav mx-auto mt-2 mt-lg-0" style="font-size: 16px;">
					<li class="nav-item mx-3">
						<a class="nav-link" href="<?= base_url() ?>Collection">Koleksi</a>
					</li>
					<li class="nav-item mx-3 ">
						<a class="nav-link" href="<?= base_url() ?>Order">
							<span class='badge badge-primary mr-2'>
								<?php if ($this->session->userdata('transactions') == 0) :
									echo @count($this->session->userdata('orders')) ?? 0;
								else :
									echo 0;
								endif; ?>
							</span>Shopping Cart
						</a>
					</li>
					<li class="nav-item mx-3">
						<a class="nav-link" href="<?= base_url() ?>Order/payment">Pembayaran</a>
					</li>
					<li class="nav-item mx-3">
						<a class="nav-link" href="<?= base_url() ?>Order/orderStatus">Status Pembayaran</a>
					</li>
					<li class="nav-item mx-3">
						<a class="nav-link" href="<?= base_url() ?>Pages/promoKuy">Promo Kuy</a>
					</li>
					<li class="nav-item mx-3">
						<a class="nav-link" href="<?= base_url() ?>Pages/aboutUs">About Us</a>
					</li>
					<li class="nav-item mx-3">
						<a class="nav-link" href="<?= base_url() ?>Pages/QandA">Q&A</a>
					</li>
					<li class="nav-item mx-3">
						<a class="nav-link" href="<?= base_url() ?>Pages/FAQ">FAQ</a>
					</li>
				</ul>
				<?php
				if ($this->session->userdata('username')) :
					if ($this->session->userdata('role_id') == 1) : ?>
						<a href="<?= base_url(); ?>admin" class="btn btn-primary mr-2"><?php echo $this->session->userdata('username'); ?></a>
					<?php elseif ($this->session->userdata('role_id') == 2) : ?>
						<a href="<?= base_url(); ?>customer" class="btn btn-primary mr-2"><?php echo $this->session->userdata('username'); ?></a>
					<?php endif; ?>
					<a href="<?= base_url(); ?>auth/logout" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin logout?');">Logout</a>
				<?php else : ?> <a href="<?= base_url() ?>Auth/register" class="btn btn-light btn-xs mr-2">Daftar</a>
					<a href="<?= base_url() ?>Auth" class="btn btn-primary btn-xs mr-2">Masuk</a>
				<?php endif; ?>
			</div>
		</nav>
	</div>
