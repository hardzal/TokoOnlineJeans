<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 text-center mt-3 mb-3">
	<div class="section-block">
		<h2>Status Pembayaran</h2>
	</div>
	<hr>
</div>
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="card">
		<?php if (!$this->session->userdata('orders')) : ?>
			<p class='alert alert-warning'>
				Anda belum melakukan order
			</p>
		<?php else : ?>
			<div class="card-header p-4">
				<!-- <a class="pt-2 d-inline-block" href="index.html">Concept</a> -->
				<div class="float-right">
					<p class="mb-0 btn-warning btn font-16" style="font-weight: bold;">Belum Dibayar</p>
					<p class="mb-0 btn-success btn font-16" style="font-weight: bold;">Terkonfirmasi</p>
				</div>
			</div>
			<div class="card-body">
				<div class="row mb-4">
					<!-- <div class="col-sm-6">
                    <h5 class="mb-3">From:</h5>                                            
                    <h3 class="text-dark mb-1">Gerald A. Garcia</h3>
                 
                    <div>2546 Penn Street</div>
                    <div>Sikeston, MO 63801</div>
                    <div>Email: info@gerald.com.pl</div>
                    <div>Phone: +573-282-9117</div>
                </div> -->
					<div class="col-sm-6">
						<h5 class="mb-3">To:</h5>
						<h3 class="text-dark mb-1">Nama</h3>
						<div>Alamat 1</div>
						<div>Alamat 2</div>
						<div>Email</div>
						<div>Phone</div>
					</div>
				</div>
				<div class="table-responsive-sm">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="center">#</th>
								<th>Nama Barang</th>
								<th>Deskripsi</th>
								<th class="right">Harga</th>
								<th class="center">Jumlah</th>
								<th class="right">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="center">1</td>
								<td class="left strong">Origin License</td>
								<td class="left">Extended License</td>
								<td class="right">$1500,00</td>
								<td class="center">1</td>
								<td class="right">$1500,00</td>
							</tr>
							<tr>
								<td class="center">2</td>
								<td class="left">Custom Services</td>
								<td class="left">Instalation and Customization (cost per hour)</td>
								<td class="right">$110,00</td>
								<td class="center">20</td>
								<td class="right">$22.000,00</td>
							</tr>
							<tr>
								<td class="center">3</td>
								<td class="left">Hosting</td>
								<td class="left">1 year subcription</td>
								<td class="right">$309,00</td>
								<td class="center">1</td>
								<td class="right">$309,00</td>
							</tr>
							<tr>
								<td class="center">4</td>
								<td class="left">Platinum Support</td>
								<td class="left">1 year subcription 24/7</td>
								<td class="right">$5.000,00</td>
								<td class="center">1</td>
								<td class="right">$5.000,00</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-lg-4 col-sm-5">
					</div>
					<div class="col-lg-4 col-sm-5 ml-auto">
						<table class="table table-clear">
							<tbody>
								<tr>
									<td class="left">
										<strong class="text-dark">Subtotal</strong>
									</td>
									<td class="right">$28,809,00</td>
								</tr>
								<tr>
									<td class="left">
										<strong class="text-dark">Diskon (20%)</strong>
									</td>
									<td class="right">$5,761,00</td>
								</tr>
								<!-- <tr>
                                <td class="left">
                                    <strong class="text-dark">VAT (10%)</strong>
                                </td>
                                <td class="right">$2,304,00</td>
                            </tr> -->
								<tr>
									<td class="left">
										<strong class="text-dark">Total</strong>
									</td>
									<td class="right">
										<strong class="text-dark">$20,744,00</strong>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card-footer bg-white">
				<!-- <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p> -->
			</div>
		<?php endif; ?>
	</div>
</div>
