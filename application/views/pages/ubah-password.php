
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
                                <h2 class="font-20 mb-0"><?= $users->nama_lengkap;?></h2>
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
                                <a class="nav-link active" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Ubah Password</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            
                            <div class="tab-pane fade show active" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                                <div class="card">
                                    <h5 class="card-header">Ubah Password</h5>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                    <div class="form-group">
                                                        <label for="passLama">Password Lama</label>
                                                        <input type="password" class="form-control form-control-lg" id="passLama" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passBaru">Password Baru</label>
                                                        <input type="password" class="form-control form-control-lg" id="passBaru" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="konfirmasi">Konfirmasi Password Baru</label>
                                                        <input type="password" class="form-control form-control-lg" id="konfirmasi" placeholder="">
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
    