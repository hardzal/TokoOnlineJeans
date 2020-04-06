<div class="container-fluid dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Data Pembayaran</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Master Data</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Pembayaran</a></li>
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
							<p>Terhitung sejak <?php echo date('d F Y H:i:s', time()); ?> terdapat Data Pembayaran sebanyak x dengan Data Order sejumlah y</p>
						</div>
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<?php echo $this->session->flashdata('message'); ?>
						<div class="card-body">
							<?php if (empty($payments)) : ?>
								<p class="alert alert-info">Tidak ada data pembayaran</p>
							<?php else :
								$no = 1;
							?>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Pembayaran</th>
												<th>Username</th>
												<th>Total Barang</th>
												<th>Total Pembayaran</th>
												<th>Waktu Checkout</th>
												<th>Batas Pembayaran</th>
												<th>Status</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($payments as $payment) : ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $payment->paymentCode; ?></td>
													<td><?php echo $payment->username; ?></td>
													<td><?php echo $payment->total_quantity; ?></td>
													<td>Rp <?php echo idr_format($payment->total_quantity * $payment->total_price); ?></td>
													<td><?php echo $payment->created_at; ?></td>
													<td><?php echo date('Y-m-d H:i:s', strtotime($payment->created_at) + 3600); ?></td>
													<td><?php echo status_button($payment->status); ?></td>
													<td class="text-center align-center">
														<a class="btn btn-xs btn-warning mr-3 editOrder" href="<?php echo base_url('admin/payment/verify/') . $payment->id; ?>" target="_blank"><i class="fas fa-edit"></i></a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url('admin/payment/delete/') . $payment->id; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
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
