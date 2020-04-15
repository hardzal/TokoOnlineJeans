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
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tambah</a></li>
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
							<h3>Menambahkan Data Promo</h3>
						</div>
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<?php echo $this->session->flashdata('message'); ?>
						<div class="card-body">
							<form method="POST" action="<?php echo base_url('admin/promo/create'); ?>" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="form-group row">
											<label for="title" class="col-form-label col-sm-4">Title</label>
											<div class="col-sm-8">
												<input type="text" name="title" class="form-control" id="title" />
											</div>
										</div>

										<div class="form-group row">
											<label for="image" class="col-form-label col-sm-4">File</label>
											<div class="col-sm-8">
												<input type="file" name="image" class="form-control" id="image" />
											</div>
										</div>

										<div class="form-group row">
											<label for="persen" class="col-form-label col-sm-4">Persen</label>
											<div class="col-sm-8">
												<input type="number" name="persen" class="form-control" id="number" />
											</div>
										</div>

										<div class="form-group row">
											<label for="start_at" class="col-form-label col-sm-4">Tanggal Mulai</label>
											<div class="col-sm-8">
												<input type="date" name="start_at" id="start_at" class="form-control" />
											</div>
										</div>

										<div class="form-group row">
											<label for="end_at" class="col-form-label col-sm-4">Tanggal Selesai</label>
											<div class="col-sm-8">
												<input type="date" name="end_at" id="end_at" class="form-control" />
											</div>
										</div>

										<div class="form-group row">
											<label for="description" class="col-form-label col-sm-4">Deskripsi</label>
											<div class="col-sm-8">
												<textarea name="description" class="form-control" id="description"></textarea>
											</div>
										</div>

										<div class="form-group row">
											<label for="voucher1" class="col-form-label col-sm-4">Kode Promo</label>
											<div class="col-sm-8">
												<div class="row">
													<div class="col-sm-8">
														<input name="voucher[]" class="form-control" id="voucher1" />
													</div>
													<div class="col-sm-4">
														<button type="button" class="btn btn-xs btn-success mr-3" id="tambahVoucher" data-id="1"><i class="fas fa-plus-circle"></i></button>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label for="syarat" class="col-form-label col-sm-4">Syarat dan Ketentuan</label>
											<div class="col-sm-8">
												<div class="row">
													<div class="col-sm-8">
														<input type="text" name="syarat[]" id="syarat1" class="form-control" />
													</div>
													<div class="col-sm-4">
														<button type="button" class="btn btn-xs btn-success mr-3" id="tambahSyarat" data-id="1"><i class="fas fa-plus-circle"></i></button>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label for="status" class="col-form-label col-sm-4">Status</label>
											<div class="col-sm-8">
												<select name="status" class="form-control" id="status" required>
													<option value>Pilih Status</option>
													<option value=1>Aktif</option>
													<option value=0>Tidak Aktif</option>
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
