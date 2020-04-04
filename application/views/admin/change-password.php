<!-- <div class="container-fluid dashboard-content"> -->
    <div class="splash-container pt-5">
        <div class="card">
            <div class="card-header text-center"><h3><?=$users->nama_lengkap?></h3><span class="splash-description">Ganti Password Admin</span></div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php else :
                    echo $this->session->userdata('message');
                endif; ?>

                <form class="needs-validation" method="POST" action="" id="userForm">
                    <!-- <p>Password Lama</p> -->
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="password" name="passLama" required="" placeholder="Password Lama" autocomplete="off">
                        <div class="invalid-feedback">
                            <?php echo form_error('passLama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- <p>Password Baru</p> -->
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="password" name="passBaru" required="" placeholder="Password Baru" autocomplete="off">
                        <div class="invalid-feedback">
                            <?php echo form_error('passBaru', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="password" name="konfirmasi" required="" placeholder="Konfirmasi Password Baru" autocomplete="off">
                        <div class="invalid-feedback">
                            <?php echo form_error('konfirmasi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-xl pt-1">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <!-- <span>Don't have an account? <a href="pages-sign-up.html">Sign Up</a></span> -->
            </div>
        </div>
    </div>

<!-- </div> -->
