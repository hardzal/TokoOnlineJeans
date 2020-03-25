<div class="container-fluid dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Data Metode Pembayaran</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Master Data</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Metode Pembayaran</a></li>
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
							<!-- Button trigger modal -->
							<a href="<?php echo base_url('admin/methodPayments'); ?>" data-link="<?php echo base_url('admin/methodPayments'); ?>" class="btn btn-success" data-toggle="modal" id="tambahMethodPayments" data-target="#ModalMethodPayments">
								Tambahkan Data
							</a>
							<!-- Modal -->
							<div class="modal fade" id="ModalMethodPayments" tabindex="-1" role="dialog" aria-labelledby="MethodPaymentsModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<form class="needs-validation" method="POST" action="" id="methodPayments">
										<div class="modal-content">
											<div class="modal-header">
												<h3 class="methodPayments-modal-title" id="MethodPaymentsModal">Tambahkan Data</h3>
												<a href="#" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</a>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<label for="name">Nama</label>
														<input type="text" class="form-control" id="nama" name="nama" required value="<?php echo set_value('nama'); ?>">
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="code">Code</label>
														<div class="input-group">
															<input class="form-control" name="code" id="code" value="<?php echo set_value('code'); ?>" required />
															<div class="valid-feedback">
																<!-- Looks good! -->
															</div>
															<div class="invalid-feedback">
																<?php echo form_error('code', '<small class="text-danger">', '</small>'); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<input type="hidden" name="id" id="idMethodPayments" />
												<a href="#" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<?php echo $this->session->flashdata('message'); ?>
						<div class="card-body">
							<?php if (empty($methodPayments)) : ?>
								<div class="alert alert-info">
									<p>Data Metode Pembayaran belum tersedia</p>
								</div>
							<?php else : ?>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>Nama</th>
												<th>Code</th>
												<th class="align-middle text-center">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($methodPayments as $method) : ?>
												<tr>
													<td><?php echo $method->name; ?></td>
													<td><?php echo $method->code; ?></td>
													<td class="text-center">
														<a class="btn btn-xs btn-warning editMethod mr-3" href="<?php echo base_url('methodPayment/edit/') . $method->id; ?>" data-toggle="modal" data-target="#ModalMethodPayments" data-link="<?php echo base_url('methodPayment/edit/') . $method->id; ?>" data-id="<?php echo $method->id; ?>">Edit</a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url('methodPayment/delete/') . $method->id; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Hapus</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
										<tfoot>
										</tfoot>
									</table>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- end data table  -->
				<!-- ============================================================== -->
			</div>
		</div>
	</div>
</div>
