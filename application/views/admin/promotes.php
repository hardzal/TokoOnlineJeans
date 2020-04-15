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
							<a href="<?php echo base_url('admin/promo/create'); ?>" class="btn btn-success" id="tambahPromo" data-link="<?php echo base_url('admin/promo/create'); ?>">
								Tambahkan Data
							</a>
						</div>
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<?php echo $this->session->flashdata('message'); ?>
						<div class="card-body">
							<?php if (empty($promotes)) : ?>
								<p class="alert alert-info">Tidak ada data Promo</p>
							<?php else :
								$no = 1;
							?>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Judul</th>
												<th>Persentase</th>
												<th>Waktu Mulai</th>
												<th>Waktu Selesai</th>
												<th>Status</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($promotes as $promo) : ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $promo->title; ?></td>
													<td><?php echo $promo->persen; ?> %</td>
													<td><?php echo $promo->start_at; ?></td>
													<td><?php echo $promo->end_at; ?></td>
													<td><?php echo status_aktif($promo->status); ?></td>
													<td class="text-center">
														<a class="btn btn-primary btn-xs mr-3" href="<?php echo base_url('admin/promo/detail/') . $promo->id; ?>"><i class="fas fa-eye"></i></a>
														<a class="btn btn-xs btn-warning mr-3" href="<?php echo base_url('admin/promo/edit/') . $promo->id; ?>"><i class="far fa-edit"></i></a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url('admin/promo/hapus/') . $promo->id; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="far fa-trash-alt"></i></a>
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
				<!--==============================================================-->
				<!-- end data table  -->
				<!-- ============================================================== -->
			</div>
		</div>
	</div>

</div>
