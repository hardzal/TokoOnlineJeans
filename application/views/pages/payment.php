<div class="container-fluid">
	<div class="p-4">
		<div class="title">
			<h2 class="text-center">Pembayaran</h2>
			<hr>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="row">
					<div class="col-md-8" style="margin: 0 auto; float: none; margin-bottom: 10px;">
						<div class="card">
							<?php echo $this->session->flashdata('message'); ?>
							<?php if (!$this->session->userdata('orders')) : ?>
								<p class="alert alert-warning">Anda belum melakukan order</p>
								<?php else :
								if (!$this->session->userdata('checkout')) : ?>
									<p class="alert alert-warning">Anda belum melakukan checkout</p>
									<?php else :
									if ($this->session->userdata('transactions') == 2) : ?>
										<p class="alert alert-warning text-center">
											Konfirmasi telah terkirim menunggu diproses oleh admin.<br>
											Untuk mengecek status pembayaran klik <a href='<?php echo base_url('order/orderstatus'); ?>'>disini</a>
										</p>
									<?php
									elseif ($this->session->userdata('order_late') > time()) :
										$total = 0;
										$total_quantity = 0;
									?>
										<div class="card-header">
											<h4 class="mb-0">Form Pembayaran</h4>
										</div>
										<p class="alert alert-danger">Batas Waktu Pembayaran adalah <?php echo date('d F Y H:i:s', $this->session->userdata('order_late')); ?></p>
										<div class="card-body">
											<form class="needs-validation" method="POST" action="" id="paymentForm" enctype="multipart/form-data">
												<div class="mb-3">
													<label for="no-pembayaran">No.Pembayaran</label>
													<div class="input-group">
														<input type="text" class="form-control" id="payment_code" placeholder="payment_code" required readonly value="<?php echo $code_payment; ?>" name="paymentCode">
													</div>
												</div>
												<div class="mb-3">
													<label for="username">Nama Pemesan</label>
													<div class="input-group">
														<input type="text" class="form-control" id="username" placeholder="Nama Lengkap" required="" value="<?php echo $user->nama_lengkap; ?>" name="name" />
														<div class="invalid-feedback" style="width: 100%;">
															Nama pemesan harus diisi.
														</div>
													</div>
												</div>
												<div class="mb-3">
													<label for="handphone">No. HP</label>
													<div class="input-group">
														<input type="text" class="form-control" id="handphone" placeholder="No HP" required="" value="<?php echo $user->telp; ?>" name="hp" />
														<div class="invalid-feedback" style="width: 100%;">
															Nomer HP pemesan harus diisi.
														</div>
													</div>
												</div>
												<hr class="mb-4">
												<h3 class="mb-3">List Barang dan Diskon</h3>
												<?php foreach ($orders as $key => $order) : ?>
													<div class="d-flex justify-content-between my-0">
														<h4>Nama Barang</h4>
														<h4>Ukuran</h4>
														<h4>Total Harga</h4>
													</div>
													<div class="d-flex justify-content-between my-0">
														<label><?php echo $order['collection']->name; ?></label>
														<span style="font-size: 14px;" class="text-muted"><?php echo $order['size']->size; ?></span>
														<span style="font-size: 14px;" class="text-muted">Rp <?php echo idr_format($order['collection']->price * $order['quantity']); ?></span>
													</div>
													<div class="mb-3">
														<label for="address">
															<h4>Alamat</h4>
														</label>
														<textarea class="form-control" id="address" placeholder="Alamat Lengkap Pengiriman" required="" name="address[]"><?php echo $user->alamat; ?></textarea>
														<div class="invalid-feedback">
															Alamat pengiriman harus diisi.
														</div>
													</div>
													<input type="hidden" name="size_id[]" value="<?php echo $order['size']->size_id; ?>" />
													<input type="hidden" name="collection_id[]" value="<?php echo $order['collection']->id; ?>">
													<input type="hidden" name="quantity[]" value="<?php echo $order['quantity']; ?>" />
													<hr class="mb-3">
												<?php $total = $total + ($order['collection']->price * $order['quantity']);
													$total_quantity = $total_quantity + $order['quantity'];
												endforeach; ?>
												<!-- <div class="d-flex justify-content-between my-2">
											<label>Diskon Promo</label>
											<span style="font-size: 14px;" class="text-success">-Rp 120.000</span>
										</div> -->
												<hr>

												<div class="d-flex justify-content-between">
													<h4>Total Pembayaran</h4>
													<span style="font-size: 18px;" class="text-muted">Rp <?php echo idr_format($total); ?></span>
												</div>
												<input type="hidden" name="total_price" value="<?php echo $total; ?>" />
												<input type="hidden" name="total_quantity" value="<?php echo count($orders); ?>" />
												<hr class="mb-4">
												<h4 class="mb-3">Metode Pembayaran *</h4>
												<h5>Transfer Bank</h5>
												<div class="d-block my-3">
													<?php foreach ($methodPayments as $method) : ?>
														<div class="custom-control custom-radio">
															<input name="paymentMethod" type="radio" class="custom-control-input" value="<?php echo $method->id; ?>" required="" id="credit<?php echo $method->id; ?>" required>
															<label class="custom-control-label" for="credit<?php echo $method->id; ?>"><?php echo $method->name; ?> - <?php echo $method->code; ?></label>
														</div>
													<?php endforeach; ?>
												</div>
												<hr class="mb-3">
												<h4>Bukti Pembayaran *</h4>
												<div class="form-group row">
													<label for="image" class="col-sm-2 col-form-label-sm">File</label>
													<div class="col-sm-8">
														<input type="file" name="image" required id="image" />
														<small class="text-danger">* Tipe File Gambar (jpg, png, bmp)</small>
													</div>
												</div>
												<hr class="mb-4">
												<button class="btn btn-primary btn-lg btn-block" type="submit">Konfirmasi Pembayaran</button>
											</form>
										</div>
							<?php
									endif;
								endif;
							endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
