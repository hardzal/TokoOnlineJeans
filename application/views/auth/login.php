<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link href="<?= base_url(); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/libs/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<style>
		html,
		body {
			height: 100%;
		}

		body {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			padding-top: 40px;
			padding-bottom: 40px;
		}
	</style>
</head>

<body>
	<!-- ============================================================== -->
	<!-- login page  -->
	<!-- ============================================================== -->
	<div class="splash-container">
		<div class="card" style="overflow:hidden;">
			<div class="card-header text-center"><a href="<?php echo base_url(); ?>"><img class="logo-img img-thumbnail" src="<?php echo base_url('assets/images/logo.jpeg'); ?>" alt="logo"></a>
				<h1 class="splash-description mt-4">Login</h1>
				<?php echo $this->session->flashdata('message'); ?>
			</div>
			<div class="card-body">
				<form method="post" action="<?php echo base_url('auth'); ?>">
					<div class="form-group">
						<input class="form-control form-control-lg" id="username" value="<?php echo set_value('username'); ?>" name="username" type="text" placeholder="Username" autocomplete="off" />
						<?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password" />
						<?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
					</div>
					<!-- <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div> -->
					<button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
				</form>
			</div>
			<div class="card-footer bg-white p-0 text-center">
				<div class="card-footer-item card-footer-item-bordered">
					Belum punya akun?
					<br>
					silahkan <a href="<?= base_url(); ?>Auth/register" class="footer-link">Klik Buat Akun</a></div>

			</div>
		</div>
	</div>

	<!-- ============================================================== -->
	<!-- end login page  -->
	<!-- ============================================================== -->
	<!-- Optional JavaScript -->
	<script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
