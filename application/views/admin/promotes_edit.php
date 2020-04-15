<div class="container-fluid dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Data Promo</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Master Data</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Promo</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Edit</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- end pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="row">
				<!-- ============================================================== -->
				<!-- data table  -->
				<!-- ============================================================== -->
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="card-header">
							<h3>Memperbaharui Data Promo</h3>
						</div>
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<?php echo $this->session->flashdata('message'); ?>
						<div class="card-body">
							<form method="POST" action="<?php echo base_url('admin/promo/edit/') . $promo->id; ?>" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="form-group row">
											<label for="title" class="col-form-label col-sm-4">Title</label>
											<div class="col-sm-8">
												<input type="text" name="title" class="form-control" id="title" value="<?php echo $promo->title; ?>" />
											</div>
										</div>

										<div class="form-group row">
											<label for="image" class="col-form-label col-sm-4">File</label>
											<div class="col-sm-8">
												<?php if ($promo->img) : ?>
													<img src="<?php echo base_url('assets/images/promotes/') . $promo->img; ?>" alt="<?php echo $promo->img; ?>" class="img-thumbnail" style="max-width:300px;" />
												<?php endif; ?>
												<input type="file" name="image" class="form-control" id="image" />
											</div>
										</div>

										<div class="form-group row">
											<label for="persen" class="col-form-label col-sm-4">Persen</label>
											<div class="col-sm-8">
												<input type="number" name="persen" class="form-control" id="number" value="<?php echo $promo->persen; ?>" />
											</div>
										</div>

										<div class="form-group row">
											<label for="start_at" class="col-form-label col-sm-4">Tanggal Mulai</label>
											<div class="col-sm-8">
												<input type="date" name="start_at" id="start_at" class="form-control" value="<?php echo $promo->start_at; ?>" />
											</div>
										</div>

										<div class="form-group row">
											<label for="end_at" class="col-form-label col-sm-4">Tanggal Selesai</label>
											<div class="col-sm-8">
												<input type="date" name="end_at" id="end_at" class="form-control" value="<?php echo $promo->end_at; ?>" />
											</div>
										</div>

										<div class="form-group row">
											<label for="description" class="col-form-label col-sm-4">Deskripsi</label>
											<div class="col-sm-8">
												<textarea name="description" class="form-control" id="description"><?php echo $promo->description; ?></textarea>
											</div>
										</div>

										<div class="form-group row">
											<label for="voucher1" class="col-form-label col-sm-4">Kode Promo</label>
											<div class="col-sm-8">
												<?php foreach ($vouchers as $index => $voucher) : ?>
													<div class="row mb-3">
														<div class="col-sm-8">
															<input name="voucher[]" class="form-control" id="voucher<?php echo $index + 1; ?>" value="<?php echo $voucher->kode; ?>" />
															<input type="hidden" name="voucher_id[]" value="<?php echo $voucher->id; ?>">
														</div>
														<div class="col-sm-4">
															<?php if ($index == 0) : ?>
																<button type="button" class="btn btn-xs btn-success mr-3" id="tambahVoucher" data-id="1"><i class="fas fa-plus-circle"></i></button>
															<?php else : ?>
																<button type="button" class="btn btn-xs btn-secondary kurangVoucher"><i class="fas fa-minus-circle"></i></button>
															<?php endif; ?>
														</div>
													</div>
												<?php endforeach; ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="syarat" class="col-form-label col-sm-4">Syarat dan Ketentuan</label>
											<div class="col-sm-8">
												<?php $syarats = explode("|", $promo->syarat);
												foreach ($syarats as $index => $syarat) :  ?>
													<div class="row mb-3">
														<div class="col-sm-8">
															<input type="text" name="syarat[]" id="syarat<?php echo $index + 1; ?>" class="form-control" value="<?php echo $syarat; ?>" />
														</div>
														<div class="col-sm-4">
															<?php if ($index == 0) : ?>
																<button type="button" class="btn btn-xs btn-success mr-3" id="tambahSyarat" data-id="1"><i class="fas fa-plus-circle"></i></button>
															<?php else : ?>
																<button type="button" class="btn btn-xs btn-secondary kurangSyarat"><i class="fas fa-minus-circle"></i></button>
															<?php endif; ?>
														</div>
													</div>
												<?php endforeach; ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="status" class="col-form-label col-sm-4">Status</label>
											<div class="col-sm-8">
												<select name="status" class="form-control" id="status" required>
													<option value>Pilih Status</option>
													<?php if ($promo->status) : ?>
														<option value=1 selected>Aktif</option>
														<option value=0>Tidak Aktif</option>
													<?php else : ?>
														<option value=1>Aktif</option>
														<option value=0 selected>Tidak Aktif</option>
													<?php endif; ?>
												</select>
											</div>
										</div>

										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--==============================================================-->
				<!-- end data table  -->
				<!-- ============================================================== -->
			</div>
		</div>
	</div>

</div>
