<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Data <?=$title;?></h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data <?=$title;?></a></li>
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
                            <a href="<?php echo base_url('tags/list'); ?>" data-link="<?php echo base_url('tags/list'); ?>" class="btn btn-success" data-toggle="modal" id="tambahTag" data-target="#ModalTag">
                                Tambahkan Data
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="ModalTag" tabindex="-1" role="dialog" aria-labelledby="TagModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form class="needs-validation" method="POST" action="" id="tagForm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="tag-modal-title" id="TagModal">Tambahkan Data</h3>
                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                        <label for="nama">Nama Tag</label>
                                                        <input type="text" class="form-control" id="namaTag" name="nama" required value="<?php echo set_value('nama'); ?>">
                                                        <div class="valid-feedback">
                                                            <!-- Looks good! -->
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="id" id="idTag" />
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
                            <?php if (empty($tags)) : ?>
                                <div class="alert alert-info">
                                    <p>Data Tag belum tersedia</p>
                                </div>
                            <?php else : ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <!-- <th>Description</th> -->
                                                <th class="align-middle text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tags as $tag) : ?>
                                                <tr>
                                                    <td><?php echo $tag->tag; ?></td>
                                                    <!-- <td><?php echo $catalog->description; ?></td> -->
                                                    <td class="text-center">
                                                        <a class="btn btn-xs btn-warning editTag mr-3" href="<?php echo base_url('Tags/edit/') . $tag->id; ?>" data-toggle="modal" data-target="#ModalTag" data-link="<?php echo base_url('Tags/edit/') . $tag->id; ?>" data-id="<?php echo $tag->id; ?>">Edit</a>
                                                        <a class="btn btn-xs btn-danger" href="<?php echo base_url('Tags/delete/') . $tag->id; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Hapus</a>
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