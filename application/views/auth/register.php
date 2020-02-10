<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Concept - Bootstrap 4 Admin Dashboard Template</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/libs/css/style.css">
	<link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
	<!-- ============================================================== -->
	<!-- signup form  -->
	<!-- ============================================================== -->
	<form class="splash-container" method="post" action="<?php echo base_url('auth/register'); ?>">
		<div class="card">
			<div class="card-header">
				<a class="my-3" href=""><img class="logo-img img-thumbnail" src="<?php echo base_url('assets/images/logo.jpeg'); ?>" alt="logo"></a>
				<h3 class="my-3 text-center">Form Pendaftaran</h3>
				<p class="text-center mb-0"><?php echo $this->session->flashdata('message'); ?></p>
				<?php if (validation_errors()) echo "<div class='text-danger'>" . validation_errors() . "</div>"; ?>
			</div>
			<div class="card-body">
				<div class="form-group">
					<input class="form-control form-control-lg" type="text" name="nama" required="" placeholder="Nama Lengkap" autocomplete="off" value="<?php echo set_value('nama'); ?>">
				</div>
				<div class="form-group">
					<input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off" value="<?php echo set_value('username'); ?>">
				</div>
				<div class="form-group">
					<input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off" value="<?php echo set_value('email'); ?>">
				</div>
				<div class="form-group">
					<input name="password" class="form-control form-control-lg" id="pass1" type="password" required="" placeholder="Password">
				</div>
				<div class="form-group">
					<input name="telp" class="form-control form-control-lg" id="telp" type="text" required="" placeholder="Telp" value="<?php echo set_value('telp'); ?>">
				</div>
				<div class="form-group">
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" name="jenis-kelamin" class="custom-control-input" value="L" <?php echo set_value('jenis-kelamin') ? "checked" : ""; ?>><span class="custom-control-label">Laki-laki</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" name="jenis-kelamin" class="custom-control-input" value="P" <?php echo set_value('L') ? "checked" : ""; ?>><span class="custom-control-label">Perempuan</span>
					</label>
				</div>
				<div class="form-group">
					<textarea class="form-control" placeholder="Alamat" name="alamat"><?php echo set_value('alamat'); ?></textarea>
				</div>

				<div class="form-group pt-2">
					<button class="btn btn-block btn-primary" type="submit">Daftarkan Akun</button>
				</div>
				<!-- <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div> -->
				<!-- <div class="form-group row pt-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>
                    </div>
                </div> -->
			</div>
			<div class="card-footer bg-white">
				<p>Sudah daftar? <a href="<?= base_url() ?>Auth" class="text-secondary">Login Disini.</a></p>
			</div>
		</div>
	</form>
</body>

</html>
