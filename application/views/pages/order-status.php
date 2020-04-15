<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 text-center mt-3 mb-3">
	<div class="section-block">
		<h2>Status Pembayaran</h2>
	</div>
	<hr>
</div>
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="card">
		<?php echo $this->session->flashdata('message'); ?>
		<?php
		if ($payment) :
		?>
			<div class="card-header p-4">
				<div class="float-right">
					<?php if ($this->session->userdata('transactions') == 1) : ?>
						<p class="mb-0 btn-danger btn font-16" style="font-weight: bold;">Belum Dibayar</p>
					<?php elseif ($this->session->userdata('transactions') == 2 || $payment) : ?>
						<?php if ($payment->status == 0) : ?>
							<p class="mb-0 btn-warning btn font-16" style="font-weight: bold;">Sedang diproses</p>
						<?php elseif ($payment->status == 1) : ?>
							<p class="mb-0 btn-success btn font-16" style="font-weight: bold;">Terkonfirmasi</p>
						<?php endif; ?>
					<?php endif; ?>
					<p class="ml-2 btn btn-primary"><a href="#" style="color:white;">Cetak</a></p>
				</div>
			</div>
			<div class="card-body">
				<div class="row mb-4">
					<div class="col-sm-6">
						<h5 class="mb-3">Kepada:</h5>
						<h3 class="text-dark mb-1"><?php echo $payment->customerName; ?></h3>
						<div><?php echo $payment->hp; ?></div>

						<?php foreach ($orders as $alamat) : ?>
							<div><?php echo $alamat->address; ?></div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="table-responsive-sm">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="center">#</th>
								<th>Nama Barang</th>
								<th class="right">Harga</th>
								<th class="center">Jumlah</th>
								<th class="right">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($orders as $order) : ?>
								<tr>
									<td class="center"><?php echo $no++; ?></td>
									<td class="left strong"><?php echo $order->name; ?></td>
									<td class="right"><?php echo number_format($order->price, 0, ',', '.'); ?></td>
									<td class="center"><?php echo $order->quantity; ?></td>
									<td class="right"><?php echo $order->price * $order->quantity; ?></td>
								</tr>
							<?php endforeach; ?>
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
									<td class="right"><?php echo number_format($payment->total_price, 0, ',', '.'); ?></td>
								</tr>
								<tr>
									<td class="left">
										<strong class="text-dark">Diskon (0%)</strong>
									</td>
									<td class="right">-</td>
								</tr>
								<tr>
									<td class="left">
										<strong class="text-dark">Biaya Kirim</strong>
									</td>
									<td class="right">-</td>
								</tr>
								<tr>
									<td class="left">
										<strong class="text-dark">Total</strong>
									</td>
									<td class="right">
										<strong class="text-dark"><?php echo number_format($payment->total_price, 0, ',', '.'); ?></strong>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card-footer bg-white">
			</div>
		<?php
		else :
			echo "<p class='alert alert-warning'>Anda belum melakukan pembayaran</p>";
		endif;
		?>
	</div>
</div>
