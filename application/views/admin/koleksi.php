<div class="container-fluid dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Data Koleksi</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Master Data</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Koleksi</a></li>
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
							<a href="#" class="btn btn-success" id="tambahCollection" data-link="<?php echo base_url('admin/koleksi'); ?>" data-toggle="modal" data-target="#ModalCreate">
								Tambahkan Data
							</a>
							<!-- Modal -->
							<div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h3 class="collection-modal-title" id="exampleModalLabel">Tambahkan Data</h3>
											<a href="#" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</a>
										</div>
										<form id="collectionForm" class="needs-validation" method="POST" action="" enctype="multipart/form-data">
											<div class="modal-body">
												<div class="row">

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="nama_barang">Nama Barang</label>
														<input type="text" class="form-control" id="nama_barang" name="nama_barang" required value="<?php echo set_value('nama_barang'); ?>">
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="nama_barang">Type</label>
														<div class="row">
															<div class="col-md-6">
																<label class="custom-control custom-radio custom-control-inline" for="type1">
																	<input type="radio" class="custom-control-input" id="type1" name="type" required value="1">
																	<span class="custom-control-label">Pria</span>
																</label>
															</div>
															<div class="col-md-6">
																<label class="custom-control custom-radio custom-control-inline" for="type2">
																	<input type="radio" class="custom-control-input" id="type2" name="type" required value="0">
																	<span class="custom-control-label">Wanita</span>
																</label>
															</div>
														</div>
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('type', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="katalog">Katalog Barang</label>
														<select class="form-control" id="katalog" name="katalog" required value="<?php echo set_value('katalog'); ?>">
															<option value="">Pilih</option>
															<?php foreach ($catalogs as $katalog) : ?>
																<option value="<?php echo $katalog->id; ?>"><?php echo $katalog->name; ?></option>
															<?php endforeach; ?>
														</select>
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('katalog', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="harga">Harga Barang</label>
														<input type="number" class="form-control" id="harga" required min=0 name="harga" value="<?php echo set_value('harga'); ?>">
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('harga', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="stok">Stok Barang</label>

														<?php foreach ($sizes as $size) : ?>
															<div class="row mb-3">
																<div class="col-md-3">
																	<label for="stock_sizestock_size<?= $size->id; ?>"><?= $size->size; ?></label>
																</div>
																<div class="col-md-9">
																	<input type="hidden" name="size[]" value="<?= $size->id; ?>" />
																	<input type="number" class="form-control" id="stock_size<?= $size->id; ?>" required min=0 name="stok[]" value="">
																</div>
															</div>
														<?php endforeach; ?>
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('stok', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="gambar">Gambar Barang</label>
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="customFile" name="image">
															<label class="custom-file-label" for="customFile">Upload File</label>
														</div>
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('image', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>


													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="deksripsi">Deskripsi</label>
														<div class="input-group">
															<textarea class="form-control" id="deskripsi" required name="deskripsi"><?php echo set_value('deskripsi'); ?></textarea>
															<div class="valid-feedback">
																<!-- Looks good! -->
															</div>
															<div class="invalid-feedback">
																<?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<input type="hidden" name="koleksi_id" value="" id="koleksi_id" />
												<a href="#" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
												<button type="submit" href="#" class="btn btn-primary">Simpan</a>
											</div>
										</form>
									</div>
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
							<?php if (empty($collections)) : ?>
								<p class="alert alert-info">Tidak ada data koleksi</p>
							<?php else : ?>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>Nama Barang</th>
												<th>Kategori Barang</th>
												<th>Stok</th>
												<th>Harga</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($collections as $koleksi) : ?>
												<tr>
													<td><?php echo $koleksi->name; ?></td>
													<td><?php echo $koleksi->catalog_name; ?></td>
													<td><?php echo $koleksi->stock; ?></td>
													<td><?php echo $koleksi->price; ?></td>
													<td class="text-center">
														<a class="btn btn-xs btn-warning mr-3 editCollection" href="<?php echo base_url('admin/koleksi/edit'); ?>" data-toggle="modal" data-target="#ModalCreate" data-id="<?php echo $koleksi->code; ?>" data-link="<?php echo base_url('admin/koleksi/edit') ?>">Edit</a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url('admin/koleksi/hapus/') . $koleksi->id; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Hapus</a>
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
