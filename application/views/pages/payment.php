<div class="container-fluid">
	<div class="p-4 mt-4">
		<div class="title">
			<h2 class="text-center">Pembayaran</h2>
			<hr>
		</div>
		<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
                <div class="row">
                    <div class="col-md-8" style="margin: 0 auto; float: none; margin-bottom: 10px;">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Form Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate="">
                                    <div class="mb-3">
                                        <label for="no-pembayaran">No.Pembayaran</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="username" placeholder="Username" required readonly value="1234567890">
                                        </div>
                                    </div><div class="mb-3">
                                        <label for="username">Nama Pemesan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="username" placeholder="Nama Lengkap" required="">
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Nama pemesan harus diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address">Alamat</label>
                                        <textarea class="form-control" id="address" placeholder="Alamat Lengkap Pengiriman" required=""></textarea>
                                        <div class="invalid-feedback">
                                            Alamat pengiriman harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address2">Alamat 2 <span class="text-muted">(Optional)</span></label>
                                        <textarea class="form-control" id="address2" placeholder="Rumah atau Kontrakan, dll"></textarea>
                                    </div>
                                    <hr class="mb-4">
                                    <h4 class="mb-3">List Barang dan Diskon</h4>
	                                    <div class="d-flex justify-content-between my-0"> 
	                                    	<label>Barang 1</label>
	                            			<span style="font-size: 14px;" class="text-muted">Rp 120.000</span>
	                                    </div>
	                                    <div class="d-flex justify-content-between my-0"> 
	                                    	<label>Barang 2</label>
	                            			<span style="font-size: 14px;" class="text-muted">Rp 120.000</span>
	                                    </div>
	                                    <div class="d-flex justify-content-between my-2"> 
	                                    	<label>Diskon Promo</label>
	                            			<span style="font-size: 14px;" class="text-success">-Rp 120.000</span>
	                                    </div>
                                    <hr>
	                                    <div class="d-flex justify-content-between">
	                                    	<h4>Total Pembayaran</h4>
	                            			<span style="font-size: 18px;" class="text-muted">Rp 120.000</span>
	                                    </div>
                                    <hr class="mb-4">
                                    <h4 class="mb-3">Metode Pembayaran</h4>
                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                            <label class="custom-control-label" for="credit">Transfer Bank</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                            <label class="custom-control-label" for="debit">Indomaret</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                            <label class="custom-control-label" for="paypal">Alfamart</label>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>