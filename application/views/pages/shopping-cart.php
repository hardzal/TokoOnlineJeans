<div class="container-fluid">

	<div class="pt-4">
		<h2 class="text-center">Shopping Cart</h2>
		<hr>
		<div class="col-md-8" style="margin: 0 auto; float: none; margin-bottom: 10px;">
			<div class="card mt-5">
				<div class="card-header">
					<h4 class="d-flex justify-content-between align-items-center mb-0">
						<span style="font-size: 20px" class="text-muted">Your Cart</span>
						<span class="badge badge-secondary badge-pill"><?php echo @count($orders); ?></span>
					</h4>
				</div>
				<div class="card-body">
					<?php echo $this->session->userdata('message'); ?>
					<?php if (empty($orders)) : ?>
						<p class="alert alert-primary">Belum ada yang kamu order</p>
						<?php else : $total = 0;
						if ($this->session->userdata('transactions') == 1) : ?>
							<p class="alert alert-success">Anda sudah melakukan checkout</p>
						<?php elseif ($this->session->userdata('transactions') == 2) : ?>
							<p class="alert alert-primary">Anda sudah melakukan konfirmasi pembayaran</p>
						<?php elseif ($this->session->userdata('transactions') == 0) : ?>
							<form method="POST" action="<?= base_url('order/edit') ?>" id="form-orders">
								<ul class="list-group mb-3">
									<?php
									foreach ($orders as $key => $order) : ?>
										<li class="list-group-item d-flex justify-content-between">
											<div class="d-flex justify-content-between">
												<img width="128px" height="128px" class="img-fluid" src="<?= base_url() ?>assets/images/collections/<?php echo @$order['collection']->img; ?>" >
												<div class="ml-3">
													<h4 class="my-0"><?php echo @$order['collection']->name; ?></h4>
													<div class="form-group row">
														<label for="size" class="col-sm-2 col-form-label mr-5">Ukuran</label>
														<div class="col-sm-6">
															<select name="size_id" class="form-control" id="size" required>
																<?php foreach ($sizes as $size) : ?>
																	<?php if (@$order['size']->size_id == $size->id) : ?>
																		<option value="<?php echo $size->id; ?>" selected><?php echo $size->size; ?></option>
																	<?php else : ?>
																		<option value="<?php echo $size->id; ?>"><?php echo $size->size; ?></option>
																	<?php endif; ?>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="form-group row mt-3">
														<label for="quantity<?= @$order['collection']->id; ?>" class="col-sm-2 col-form-label mr-5">Total</label>
														<div class="col-sm-6">
															<input type="number" value="<?php echo @$order['quantity']; ?>" name="quantity[]" max="<?php echo @$order['size']->stock; ?>" class="form-control" min=1 id="quantity<?= @$order['collection']->id; ?>" />
															<input type="hidden" name="index[]" value="<?php echo $key; ?>" />
														</div>
													</div>
													<div class="mt-3">
														<h4>Deskripsi</h4>
														<p class="text-muted"><?php echo @$order['collection']->description; ?></p>
													</div>
												</div>
											</div>
											<div>
												<div class="align-left">
													<a href="<?php echo base_url('order/delete/') . $key; ?>" class="btn btn-danger"><i class="far fa-trash-alt" onclick="return confirm('Apa kamu yakin ingin menghapus ini?');"></i></a>
												</div>
												<div>
													<span style="font-size: 20px;" class="text-muted">Rp <?php echo idr_format($order['collection']->price * $order['quantity']); ?></span>
												</div>
											</div>
										</li> <?php
												$total = $total + ($order['collection']->price * $order['quantity']);
											endforeach; ?>
									<!--<li class=" list-group-item d-flex justify-content-between bg-light">
											<div class="text-success">
												<h5 class="my-0">Promo code</h5>
												<small>EXAMPLECODE</small>
											</div>
											<span style="font-size: 20px;" class="text-success">-Rp 50.000</span>
									</li>-->
									<li class="list-group-item d-flex justify-content-between">
										<span style="font-size: 14px;">Total (IDR)</span>
										<strong style="font-size: 20px;">Rp <?php echo idr_format($total); ?></strong>
									</li>
								</ul>
								<!-- <div class="input-group">
							<input type="text" class="form-control" placeholder="">
							<div class="input-group-append">
								<button type="submit" class="btn btn-secondary">Redeem</button>
							</div>
						</div> -->
								<div class="text-center mt-4 mb-3">
									<button class="btn btn-primary mr-3" style="font-size: 16px;" type="submit">Update Order</button>
									<a class="btn btn-brand" style="font-size: 16px;" href="<?php echo base_url('order/checkout'); ?>">Checkout</a>
								</div>
							</form>
					<?php
						endif;
					endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row pt-4 mx-auto">

	</div>
</div>
