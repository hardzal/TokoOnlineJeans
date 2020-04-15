<div class="container-fluid dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Data User Promo</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Master Data</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><a href="<?php echo base_url('admin/promotes/'); ?>"><?php echo $promo->title; ?></a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">User Promo</a></li>
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
							<h3>Data <?php echo $promo->title; ?></h3>
							<!-- <a href="<?php echo base_url('admin/promo/create'); ?>" class="btn btn-success" id="tambahPromo" data-link="<?php echo base_url('admin/promo/create'); ?>">
								Tambahkan Data
							</a> -->
						</div>
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<?php echo $this->session->flashdata('message'); ?>

						<div class="card-body">
							<?php if (empty($user_promotes)) : ?>
								<p class="alert alert-info">Tidak ada data user promo</p>
							<?php else :
								$no = 1;
							?>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Username</th>
												<th>Nama Lengkap</th>
												<th>No HP</th>
												<th>Email</th>
												<th>Waktu Daftar</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($user_promotes as $user) : ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $user->username; ?></td>
													<td><?php echo $user->nama_lengkap; ?></td>
													<td><?php echo $user->telp; ?></td>
													<td><?php echo $user->email; ?></td>
													<td><?php echo $user->created_at; ?></td>
													<td><?php echo status_aktif($user->status); ?></td>
													<td>
														<a class="btn btn-xs btn-warning mr-3" href="<?php echo base_url('admin/user_promo/edit/') . $user->id; ?>"><i class="far fa-edit"></i></a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url('admin/user_promo/hapus/') . $user->id; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="far fa-trash-alt"></i></a>
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
