<div class="container-fluid dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Data Katalog</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Master Data</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Katalog</a></li>
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
							<a href="" data-link="<?php echo base_url('catalog/index'); ?>" class="btn btn-success" data-toggle="modal" id="tambahKatalog" data-target="#ModalCatalog">
								Tambahkan Data
							</a>
							<!-- Modal -->
							<div class="modal fade" id="ModalCatalog" tabindex="-1" role="dialog" aria-labelledby="CatalogModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<form class="needs-validation" method="POST" action="" id="catalogForm">
										<div class="modal-content">
											<div class="modal-header">
												<h3 class="modal-title-catalog" id="CatalogModal">Tambahkan Data</h3>
												<a href="#" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</a>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<label for="nama">Nama Kategori</label>
														<input type="text" class="form-control" id="namaKatalog" name="nama" required value="<?php echo set_value('nama'); ?>">
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="deksripsi">Deskripsi</label>
														<div class="input-group">
															<textarea class="form-control" name="deskripsi" id="deskripsiKatalog" required>
																<?php echo set_value('deskripsi'); ?>
															</textarea>
															<div class="valid-feedback">
																<!-- Looks good! -->
															</div>
															<div class="invalid-feedback">
																<?php echo form_error('description', '<small class="text-danger">', '</small>'); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<input type="hidden" name="id" id="idKatalog" />
												<a href="#" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php echo $this->session->flashdata('message'); ?>
						<div class="card-body">
							<?php if (empty($catalogs)) : ?>
								<div class="alert alert-info">
									<p>Data Katalog belum tersedia</p>
								</div>
							<?php else : ?>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>Name</th>
												<th>Description</th>
												<th class="align-middle text-center">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($catalogs as $catalog) : ?>
												<tr>
													<td><?php echo $catalog->name; ?></td>
													<td><?php echo $catalog->description; ?></td>
													<td class="text-center">
														<a class="btn btn-xs btn-warning editCatalog" href="<?php echo base_url('catalog/edit/') . $catalog->id; ?>" data-toggle="modal" data-target="#ModalCatalog" data-link="<?php echo base_url('catalog/edit/') . $catalog->id; ?>" data-id="<?php echo $catalog->id; ?>">Edit</a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url('catalog/delete/') . $catalog->id; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Hapus</a>
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
