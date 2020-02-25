<div class="container-fluid dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Kelola Customer</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Menu Utama</a></li>
							<li class="breadcrumb-item">Kelola Akun</li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Admin</a></li>
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
							<a href="#" class="btn btn-success" id="tambahUser" data-link="<?php echo base_url('user/index'); ?>" data-toggle="modal" data-target="#ModalUser">
								Tambahkan Data
							</a>
							<!-- Modal -->
							<div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="ModalUser" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h3 class="user-modal-title" id="UserModal">Edit Data</h3>
											<a href="#" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</a>
										</div>
										<form class="needs-validation" method="POST" action="" id="userForm">
											<div class="modal-body">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="username">Username</label>
														<input type="text" class="form-control" id="username" name="username" required>
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="email">Email</label>
														<input type="email" class="form-control" id="email" name="email" required />
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="password">Password</label>
														<input type="password" class="form-control" id="password" name="password" required />
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="nama-lengkap">Nama Lengkap</label>
														<input type="text" class="form-control" id="nama_lengkap" name="nama" required>
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="jenis-kelamin">Jenis Kelamin</label>
														<div>
															<label class="custom-control custom-radio custom-control-inline">
																<input type="radio" name="jenis-kelamin" value="L" class="custom-control-input"><span class="custom-control-label">Laki-laki</span>
															</label>
															<label class="custom-control custom-radio custom-control-inline">
																<input type="radio" name="jenis-kelamin" value="P" class=" custom-control-input"><span class="custom-control-label">Perempuan</span>
															</label>

														</div>
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<!-- Please choose a username. -->
															<?php echo form_error('jenis-kelamin', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="alamat">Alamat</label>
														<div class="input-group">
															<textarea class="form-control" id="alamat" name="alamat" required></textarea>
															<div class="valid-feedback">
																<!-- Looks good! -->
															</div>
															<div class="invalid-feedback">
																<?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
															</div>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="telepon">No. Telp</label>
														<input type="text" class="form-control" id="telepon" name="telp" required>
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('telp', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>
												</div>	
											</div>
											<div class="modal-footer">
												<input type="hidden" name="user_id" id="user_id" />
												<a href="#" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<?php if (empty($users)) : ?>
								<div class="alert alert-info">
									<p>Data Customer belum tersedia</p>
								</div>
							<?php else : ?>
								<?php if (validation_errors()) : ?>
									<div class="alert alert-danger">
										<?php echo validation_errors(); ?>
									</div>
								<?php else :
									echo $this->session->userdata('message');
								endif; ?>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>Email</th>
												<th>Username</th>
												<th>Nama Lengkap</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($users as $user) : ?>
												<tr>
													<td><?php echo $user->email; ?></td>
													<td><?php echo $user->username; ?></td>
													<td><?php echo $user->nama_lengkap; ?></td>
													<td class="text-center">
														<a class="btn btn-xs btn-warning editUser mr-3" href="#" data-toggle="modal" data-target="#ModalUser" data-link="<?php echo base_url('user/edit/') . $user->id; ?>" data-id="<?php echo $user->id; ?>">Edit</a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url('user/delete/') . $user->id; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Hapus</a>
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
