
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
                                <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg2" role="tab" aria-controls="pills-msg" aria-selected="false">Edit Order</a>
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
                                    <h5 class="card-header">Detail Order [id]</h5>
                                    <div class="card-body">
                                        <!-- <form class="needs-validation" method="POST" action="" id="userForm"> -->
                                            <div class="row">
                                                <div class="offset-xl-12 col-xl-12 offset-lg-12 col-lg-12 col-md-12 col-sm-12 col-12 p-4">
                                                    <!-- <div class="d-flex justify-content-between"> -->
                                                        
                                                        <!-- <div class="product-details"> -->
                                                            <div class="list-group">
                                                                <div class="list-group-item d-flex justify-content-around">
                                                                    <img class="img-responsive" src="<?=base_url('assets/images/pakaian-pria.jpg');?>" style="object-fit: cover; width: 280px; height: 280px;">
                                                                    <div class="product-details w-100">
                                                                        <div class="border-bottom pb-3 mb-3">
                                                                            <h2 class="mb-3">Nama Barang</h2>
                                                                            <h3 class="mb-0 text-primary">Rp. 1.000.000</h3>
                                                                        </div>
                                                                        <div class="product-size border-bottom">
                                                                            <h4>Ukuran</h4>
                                                                            <div class="btn-group" role="group" aria-label="First group">
                                                                                <div class="form-group">
                                                                                    <h4>M</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-qty">
                                                                                <h4>Jumlah</h4>
                                                                                <div class="quantity">
                                                                                    1
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="list-group-item d-flex justify-content-around">
                                                                    <img class="img-responsive" src="<?=base_url('assets/images/pakaian-pria.jpg');?>" style="object-fit: cover; width: 280px; height: 280px;">
                                                                    <div class="product-details w-100">
                                                                        <div class="border-bottom pb-3 mb-3">
                                                                            <h2 class="mb-3">Nama Barang</h2>
                                                                            <h3 class="mb-0 text-primary">Rp. 1.000.000</h3>
                                                                        </div>
                                                                        <div class="product-size border-bottom">
                                                                            <h4>Ukuran</h4>
                                                                            <div class="btn-group" role="group" aria-label="First group">
                                                                                <div class="form-group">
                                                                                    <h4>M</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-qty">
                                                                                <h4>Jumlah</h4>
                                                                                <div class="quantity">
                                                                                    1
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <a href="<?=base_url('customer')?>" class="btn btn-brand float-left mt-3">Kembali</a>
                                                            </div>
                                                            
                                                        <!-- </div> -->
                                                    <!-- </div> -->
                                                </div>

                                            </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="pills-msg2" role="tabpanel" aria-labelledby="pills-msg-tab">
                                <div class="card">
                                    <h5 class="card-header">Edit Order</h5>
                                    <div class="card-body">
                                        <form class="needs-validation" method="POST" action="" id="userForm">
                                            <div class="row">
                                                <div class="offset-xl-12 col-xl-12 offset-lg-12 col-lg-12 col-md-12 col-sm-12 col-12 p-4">
                                                    <div class="list-group">
                                                        <div class="list-group-item d-flex justify-content-around">
                                                            <img class="img-responsive" src="<?=base_url('assets/images/pakaian-pria.jpg');?>" style="object-fit: cover; width: 280px; height: 280px;">
                                                            <div class="product-details w-100">
                                                                <a href="" class="btn btn-danger btn-xs float-right"><i class="fa fa-trash"></i></a>
                                                                <div class="border-bottom pb-3 mb-3">
                                                                    <h2 class="mb-3">Nama Barang</h2>
                                                                    <h3 class="mb-0 text-primary">Rp. 1.000.000</h3>

                                                                </div>
                                                                <div class="product-size border-bottom">
                                                                    <h4>Ukuran</h4>
                                                                    <div class="btn-group" role="group" aria-label="First group">
                                                                        <div class="form-group">
                                                                            <select name="size" class="form-control">
                                                                                <option>S</option>
                                                                                <option>M</option><option>L</option>
                                                                                <option>XL</option>
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-qty">
                                                                        <h4>Jumlah</h4>
                                                                        <div class="quantity">
                                                                            <input type="number" min="1" max="100" step="1" value="1" name="stock" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="list-group-item d-flex justify-content-around">
                                                            <img class="img-responsive" src="<?=base_url('assets/images/pakaian-pria.jpg');?>" style="object-fit: cover; width: 280px; height: 280px;">
                                                            <div class="product-details w-100">
                                                                <a href="" class="btn btn-danger btn-xs float-right"><i class="fa fa-trash"></i></a>
                                                                <div class="border-bottom pb-3 mb-3">
                                                                    <h2 class="mb-3">Nama Barang</h2>
                                                                    <h3 class="mb-0 text-primary">Rp. 1.000.000</h3>

                                                                </div>
                                                                <div class="product-size border-bottom">
                                                                    <h4>Ukuran</h4>
                                                                    <div class="btn-group" role="group" aria-label="First group">
                                                                        <div class="form-group">
                                                                            <select name="size" class="form-control">
                                                                                <option>S</option>
                                                                                <option>M</option><option>L</option>
                                                                                <option>XL</option>
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-qty">
                                                                        <h4>Jumlah</h4>
                                                                        <div class="quantity">
                                                                            <input type="number" min="1" max="100" step="1" value="1" name="stock" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="<?=base_url('customer')?>" class="btn btn-brand float-left mt-3">Kembali</a>
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
    