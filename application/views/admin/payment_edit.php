<div class="container-fluid dashboard-content">

	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Data Pembayaran</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Master Data</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Pembayaran</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Verifikasi</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-header">
					<h3>Detail Pembayaran : <?php echo $payment[0]->username; ?></h3>
					<?php if (validation_errors()) : ?>
						<div class="alert alert-danger">
							<?php echo validation_errors(); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="card-body">
					<form method="POST" action="" id="payment-confirmation">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group row">
									<label for="nama_lengkap" class="col-form-label col-sm-4">Nama Lengkap</label>
									<div class="col-sm-8">
										<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?php echo $payment[0]->customerName; ?>" readonly />
									</div>
								</div>

								<div class="form-group row">
									<label for="email" class="col-form-label col-sm-4">Email</label>
									<div class="col-sm-8">
										<input type="email" name="email" id="email" class="form-control" value="<?php echo $payment[0]->email; ?>" readonly />
									</div>
								</div>

								<div class="form-group row">
									<label for="hp" class="col-form-label col-sm-4">No HP</label>
									<div class="col-sm-8">
										<input type="text" name="hp" id="hp" class="form-control" value="<?php echo $payment[0]->hp; ?>" readonly />
									</div>
								</div>

								<div class="form-group row">
									<label for="kode_pembayaran" class="col-form-label col-sm-4">Kode Pembayaran</label>
									<div class="col-sm-8">
										<input type="text" name="kode_pembayaran" id="kode_pembayaran" class="form-control" value="<?php echo $payment[0]->paymentCode; ?>" readonly />
									</div>
								</div>

								<div class="form-group row">
									<label for="daftar_order" class="col-form-label col-sm-4">Daftar Order</label>
									<div class="col-sm-8">
										<div class="row" style="border-bottom: 1px solid #aaa;padding-bottom: 5px;">
											<div class="col-sm-3"><strong>Nama Barang</strong></div>
											<div class="col-sm-1"><strong>Ukuran</strong></div>
											<div class="col-sm-1"><strong>Jumlah</strong></div>
											<div class="col-sm-2"><strong>Harga</strong></div>
											<div class="col-sm-3"><strong>Alamat</strong></div>
											<div class="col-sm-2"><strong>Total Harga</strong></div>
										</div>
										<?php foreach ($payment as $order) : ?>
											<div class="row mt-3">
												<div class="col-sm-3"><?php echo $order->collection_name; ?></div>
												<div class="col-sm-1"><?php echo $order->size; ?></div>
												<div class="col-sm-1"><?php echo $order->quantity; ?></div>
												<div class="col-sm-2">Rp <?php echo idr_format($order->price); ?></div>
												<div class="col-sm-3"><?php echo $order->address; ?></div>
												<div class="col-sm-2">Rp <?php echo idr_format($order->price * $order->quantity); ?></div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>

								<div class="form-group row">
									<label for="keterangan" class="col-form-label col-sm-4">Keterangan</label>
									<div class="col-sm-8">
										<textarea name="keterangan" class="form-control" readonly><?php echo !empty($payment[0]->description) ? $payment[0]->description : "tidak ada"; ?></textarea>
									</div>
								</div>

								<div class="form-group row">
									<label for="screenshot" class="col-sm-4 col-form-label">Bukti Pembayaran</label>
									<div class="col-sm-8">
										<img src="<?php echo base_url(); ?>assets/images/screenshots/<?php echo $payment[0]->picture; ?>" alt="title" />
									</div>
								</div>

								<div class="form-group row">
									<label for="opsi" class="col-sm-4 col-form-label">Opsi</label>
									<div class="col-sm-8">
										<select name="opsi" id="opsi" class="form-control" required>
											<option value>Pilih Opsi</option>
											<option value=1>Setuju</option>
											<option value=2>Tolak</option>
										</select>
									</div>
								</div>
								<input type="hidden" name="id" value="<?php echo $payment[0]->id; ?>" />
								<button class="btn btn-primary btn-lg btn-block mt-3" type="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
