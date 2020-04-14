
    <div class="influence-profile">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header text-center mt-4">
                        <h3 class="mb-2 font-24">Profil Pengguna </h3>
                        <hr>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- profile -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- card profile -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-body">
                            <div class="user-avatar text-center d-block">
                                <img src="<?=base_url();?>assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                            </div>
                            <div class="text-center">
                                <h2 class="font-24 mb-0"><?= $users->nama_lengkap;?></h2>
                                <p><?= $users->username;?></p>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <h3 class="font-16">Informasi Lainnya</h3>
                            <div class="">
                                <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?= $users->email;?></li>
                                <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?= $users->telp;?></li>
                            </ul>
                            </div>
                        </div>
                        <div class="card-body border-top text-center">
                            <div class="">
                                <a href="<?=base_url()?>customer/ubahPassword" class="btn btn-sm btn-primary">Ubah Password</a>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end card profile -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end profile -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- campaign data -->
                <!-- ============================================================== -->
                <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- campaign tab one -->
                    <!-- ============================================================== -->
                    <div class="influence-profile-content pills-regular">
                        <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">List Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg2" role="tab" aria-controls="pills-msg" aria-selected="false">Edit Profile</a>
                            </li>
                        </ul>
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php else :
                            echo $this->session->userdata('message');
                        endif; ?>
                        <div class="tab-content" id="pills-tabContent">
                            
                            <div class="tab-pane fade show active" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                                <div class="card">
                                    <h5 class="card-header">List Order</h5>
                                    <div class="card-body">
                                        <!-- <form class="needs-validation" method="POST" action="" id="userForm"> -->
                                            <div class="row">
                                                <div class="offset-xl-12 col-xl-12 offset-lg-12 col-lg-12 col-md-12 col-sm-12 col-12 p-4">
                                                    <ul class="list-group">
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            <div class="d-flex justify-content-between">
                                                                <img width="128px" height="128px" class="img-fluid" src="<?=base_url('assets/images/avatar-1.jpg')?>" alt="gambar">
                                                                <div class="ml-3">
                                                                    <h4 class="my-0">Nama Barang</h4>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div>
                                                                    <span style="font-size: 20px;" class="text-muted">Rp 1.000.000</span>
                                                                </div>
                                                                <div class="text-center">
                                                                    <a href="<?=base_url('customer/detail_order')?>" class="btn btn-success btn-xs mt-3" class="">Detail</a>
                                                                    <!-- <a href="" class="btn btn-warning btn-xs mt-3" class="">Edit</a> -->
                                                                    <a href="" class="btn btn-danger btn-xs mt-3" class="">Hapus</a>
                                                                </div>
                                                                <!-- <div class="align-left mt-2">
                                                                    <span style="font-size: 16px;" class="text-muted">Sudah Dibayar</span>
                                                                </div> -->
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="pills-msg2" role="tabpanel" aria-labelledby="pills-msg-tab">
                                <div class="card">
                                    <h5 class="card-header">Edit Profile</h5>
                                    <div class="card-body">
                                        <form class="needs-validation" method="POST" action="" id="userForm">
                                            <div class="row">
                                                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control form-control-lg" id="username" value="<?= $users->username;?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Nama Lengkap</label>
                                                        <input type="text" class="form-control form-control-lg" name="nama" value="<?= $users->nama_lengkap;?>">
                                                        <div class="invalid-feedback">
                                                            <?php echo form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control form-control-lg" name="email" value="<?= $users->email;?>">
                                                        <div class="invalid-feedback">
                                                            <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telp">No. Telp</label>
                                                        <input type="text" class="form-control form-control-lg" name="telp" value="<?= $users->telp;?>">
                                                        <div class="invalid-feedback">
                                                            <?php echo form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" name="alamat" rows="3" ><?= $users->alamat;?></textarea>
                                                        <div class="invalid-feedback">
                                                            <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary float-right mt-3">Simpan Perubahan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end campaign tab one -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end campaign data -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end content -->
    <!-- ============================================================== -->
    