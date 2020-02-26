<div class="container-fluid dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Data FAQ</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Master Data</a></li>
							<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data FAQ</a></li>
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
							<a href="<?php echo base_url('faq/list'); ?>" data-link="<?php echo base_url('faq/list'); ?>" class="btn btn-success" data-toggle="modal" id="tambahFAQ" data-target="#ModalFAQ">
								Tambahkan Data
							</a>
							<!-- Modal -->
							<div class="modal fade" id="ModalFAQ" tabindex="-1" role="dialog" aria-labelledby="FAQModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<form class="needs-validation" method="POST" action="" id="faqForm">
										<div class="modal-content">
											<div class="modal-header">
												<h3 class="faq-modal-title" id="FAQModal">Tambahkan Data</h3>
												<a href="#" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</a>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<label for="question">Pertanyaan</label>
														<input type="text" class="form-control" id="question" name="question" required value="<?php echo set_value('question'); ?>">
														<div class="valid-feedback">
															<!-- Looks good! -->
														</div>
														<div class="invalid-feedback">
															<?php echo form_error('question', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
														<label for="answer">Jawaban</label>
														<div class="input-group">
															<textarea class="form-control" name="answer" id="answer" required>
																<?php echo set_value('answer'); ?>
															</textarea>
															<div class="valid-feedback">
																<!-- Looks good! -->
															</div>
															<div class="invalid-feedback">
																<?php echo form_error('answer', '<small class="text-danger">', '</small>'); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<input type="hidden" name="id" id="idFaq" />
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
							<?php if (empty($faqs)) : ?>
								<div class="alert alert-info">
									<p>Data FAQ belum tersedia</p>
								</div>
							<?php else : ?>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>Question</th>
												<th>Answer</th>
												<th class="align-middle text-center">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($faqs as $faq) : ?>
												<tr>
													<td><?php echo $faq->question; ?></td>
													<td><?php echo $faq->answer; ?></td>
													<td class="text-center">
														<a class="btn btn-xs btn-warning editFaq mr-3" href="<?php echo base_url('faq/edit/') . $faq->id; ?>" data-toggle="modal" data-target="#ModalFAQ" data-link="<?php echo base_url('faq/edit/') . $faq->id; ?>" data-id="<?php echo $faq->id; ?>">Edit</a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url('faq/delete/') . $faq->id; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Hapus</a>
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
