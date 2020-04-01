<div class="mt-4 col-xl-12">
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto">
        <div class="card card-fluid pb-2">
            <!-- .card-body -->
            <div class="card-body text-center">
                <!-- .user-avatar -->
                <a href="user-profile.html" class="user-avatar my-3">
              <img src="../assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xl">
               </a>
                <!-- /.user-avatar -->
                <h3 class="card-title mb-2 text-truncate">
                <a href=""><!-- <?=$users->nama_lengkap;?> --> Nama</a>
                  </h3>
                <h6 class="card-subtitle text-muted mb-3"> Admin </h6>
                <!-- .skills -->
                <!-- <p class="skills">
                    <a href="#" class="btn btn-xs btn-outline-secondary mt-1">react</a>
                    <a href="#" class="btn btn-xs btn-outline-secondary mt-1">angular</a>
                    <a href="#" class="btn btn-xs btn-outline-secondary mt-1">vue</a>
                    <a href="#" class="btn btn-xs btn-outline-secondary mt-1">html5</a>
                    <a href="#" class="btn btn-xs btn-outline-secondary mt-1">css3</a>
                    <a href="#" class="btn btn-xs btn-warning circle mt-1">3+</a>
                </p> -->
                <!-- /.skills -->
                <!-- <p class="text-muted"> Deskripsi (kalo ada) </p> -->
                <a href="<?=base_url()?>Admin/changePassword" class="btn btn-warning btn-rounded">Ubah Password</a>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto">
        <div class="card card-fluid">
            <div class="card-header">
                <h3 class="card-title text-truncate">
                    Information
                </h3>
            </div>
            <div class="card-body">
                <form id="basicform">
                    <div class="form group mx-4 my-4">
                        <label class="font-16" style="font-weight: bold;">Username</label>
                        <input type="text" name="username" value="Username" class="form-control">
                    </div>
                </form>
                <form id="basicform">
                    <div class="form group mx-4 my-4">
                        <label class="font-16" style="font-weight: bold;">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="Nama Lengkap" class="form-control">
                    </div>
                </form>
                <form id="basicform">
                    <div class="form group mx-4 my-4">
                        <label class="font-16" style="font-weight: bold;">Jenis Kelamin</label>
                        <br>
                        <div>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="jenis-kelamin" value="L" class="custom-control-input"><span class="custom-control-label">Laki-laki</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="jenis-kelamin" value="P" class=" custom-control-input"><span class="custom-control-label">Perempuan</span>
                            </label>

                        </div>
                    </div>
                </form>
                <form id="basicform">
                    <div class="form group mx-4 my-4">
                        <label class="font-16" style="font-weight: bold;">Alamat</label>
                        <!-- <input type="text" name="username" value="Username" class="form-control"> -->
                        <textarea name="alamat" class="form-control">Alamat</textarea>
                    </div>
                </form>
                <form id="basicform">
                    <div class="form group mx-4 my-4">
                        <label class="font-16" style="font-weight: bold;">No. Telp</label>
                        <input type="text" name="notelp" value="No Telepon" class="form-control">
                    </div>
                </form>
                <form id="basicform">
                    <div class="form group mx-4 my-4">
                        <label class="font-16" style="font-weight: bold;">Email</label>
                        <input type="email" name="email" value="" class="form-control">
                    </div>
                </form>
            </div>
            <div class="card-footer text-center ">
                <input type="button" name="edit" class="btn btn-primary" value="Simpan Perubahan">
            </div>
        </div>
    </div>    
</div>
