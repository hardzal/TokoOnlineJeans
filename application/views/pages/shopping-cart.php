<div class="container-fluid">

	<div class="pt-4 mt-4">
		<h2 class="text-center">Shopping Cart</h2>
		<hr>
		<div class="col-md-8" style="margin: 0 auto; float: none; margin-bottom: 10px;">
			<div class="card mt-5">
				<div class="card-header">
					<h4 class="d-flex justify-content-between align-items-center mb-0">
						<span style="font-size: 20px" class="text-muted">Your Cart</span>
						<span class="badge badge-secondary badge-pill"><?php echo $this->session->userdata('order')['total'] ?? 0; ?></span>
					</h4>
				</div>
				<div class="card-body">
					<?php echo $this->session->userdata('message'); ?>
					<?php if (empty($orders)) : ?>
						<p class="alert alert-primary">Belum ada yang kamu order</p>
					<?php else : $total = 0; ?>
						<ul class="list-group mb-3">
							<?php foreach ($orders as $order) : ?>
								<li class="list-group-item d-flex justify-content-between">
									<div class="d-flex justify-content-between">
										<img width="128px" height="128px" class="img-fluid" src="<?= base_url() ?>assets/images/avatar-1.jpg">
										<div class="ml-3">
											<h4 class="my-0"><?php echo $order['collection']->name; ?></h4>
											<!-- <p class="my-0"><?php echo $order['catalog']; ?></p> -->
											<p class="my-0"><?php echo $order['quantity']; ?> Potong</p>
											<small class="text-muted"><?php echo $order['collection']->description; ?></small>
										</div>
									</div>
									<span style="font-size: 20px;" class="text-muted">Rp <?php echo number_format($order['collection']->price, 0, ',', '.'); ?></span>
								</li>
							<?php
								$total = $total + $order['collection']->price;
							endforeach; ?>
							<!--<li class="list-group-item d-flex justify-content-between bg-light">
								<div class="text-success">
									<h5 class="my-0">Promo code</h5>
									<small>EXAMPLECODE</small>
								</div>
								<span style="font-size: 20px;" class="text-success">-Rp 50.000</span>
							</li>-->
							<li class="list-group-item d-flex justify-content-between">
								<span style="font-size: 14px;">Total (IDR)</span>
								<strong style="font-size: 20px;">Rp <?php echo number_format($total, 0, ',', '.'); ?></strong>
							</li>
						</ul>
						<form method="POST" action="">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="">
								<div class="input-group-append">
									<button type="submit" class="btn btn-secondary">Redeem</button>
								</div>
							</div>
						</form>
						<div class="text-center mt-4 mb-3">
							<a class="btn btn-brand" href="<?= base_url() ?>Order/payment" style="font-size: 16px;">Pembayaran</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row pt-4 mx-auto">

	</div>
</div>
