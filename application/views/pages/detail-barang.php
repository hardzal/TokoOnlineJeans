<div class="container-fluid">
	<div class="row p-4">
		<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
					<div class="product-slider bg-dark">
						<div id="carouselExampleIndicators" class="product-carousel carousel slide" data-ride="carousel">
							<!-- <ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							</ol> -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100 img-thumbnail" src="<?= base_url() ?>assets/images/collections/<?php echo $jeans->img; ?>" alt="First slide" style="width: 285px; height: 313px">
								</div>
							</div>
							<!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span> </a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span> </a> -->
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
					<form method="POST" action="<?php echo base_url('order/index'); ?>">
						<div class="product-details">
							<div class="border-bottom pb-3 mb-3">
								<h2 class="mb-3"><?php echo $jeans->name; ?></h2>
								<!-- <div class="product-rating d-inline-block float-right">
								<i class="fa fa-fw fa-star"></i>
								<i class="fa fa-fw fa-star"></i>
								<i class="fa fa-fw fa-star"></i>
								<i class="fa fa-fw fa-star"></i>
								<i class="fa fa-fw fa-star"></i>
							</div> -->
								<h3 class="mb-0 text-primary">Rp. <?php echo number_format($jeans->price, 0, ',', '.'); ?></h3>
							</div>
							<div class="product-size border-bottom">
								<h4>Ukuran</h4>
								<div class="btn-group" role="group" aria-label="First group">
									<div class="form-group">
										<select name="size" class="form-control" id="size" required>
											<option value="">Pilih Ukuran</option>
											<?php foreach ($sizes as $size) : ?>
												<option value="<?php echo $size->size_id; ?>"><?php echo $size->size; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="product-qty">
									<h4>Quantity</h4>
									<div class="quantity">
										<input type="number" min="1" max="<?php echo $jeans->stock; ?>" step="1" value="1" name="stock" />
									</div>
								</div>
							</div>
							<div class="product-description">
								<h4 class="mb-1">Deskripsi</h4>
								<p>Stok : <?php echo $jeans->stock; ?> Potong</p>
								<p><?php echo $jeans->description; ?></p>
								<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
								<input type="hidden" name="collection_id" value="<?php echo $jeans->id; ?>" />
								<button type="submit" class="btn btn-primary btn-block btn-lg">Add to Cart</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-10">
					<h3> Barang terkait</h3>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="product-thumbnail">
						<div class="product-img-head">
							<div class="product-img">
								<img src="<?= base_url() ?>assets/images/eco-product-img-1.png" alt="" class="img-fluid" style="width: 228px; height: 250px"></div>
							<div class="ribbons">New</div>
							<div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
						</div>
						<div class="product-content">
							<div class="product-content-head">
								<h3 class="product-title">Nama Produk</h3>
								<div class="product-rating d-inline-block">
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
								</div>
								<div class="product-price mt-4">Rp. 490.000</div>
							</div>
							<div class="product-btn text-center">
								<a href="#" class="btn btn-primary">Add to Cart</a>
								<a href="#" class="btn btn-outline-light">Details</a>
								<!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-exchange-alt"></i></a> -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="product-thumbnail">
						<div class="product-img-head">
							<div class="product-img">
								<img src="<?= base_url() ?>assets/images/eco-product-img-1.png" alt="" class="img-fluid" style="width: 228px; height: 250px"></div>
							<div class="ribbons bg-danger">Sold</div>
							<div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
						</div>
						<div class="product-content">
							<div class="product-content-head">
								<h3 class="product-title">Nama Produk</h3>
								<div class="product-rating d-inline-block">
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
								</div>
								<div class="product-price mt-4">Rp. 500.000</div>
							</div>
							<div class="product-btn text-center">
								<a href="#" class="btn btn-primary">Add to Cart</a>
								<a href="#" class="btn btn-outline-light">Details</a>
								<!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-exchange-alt"></i></a> -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="product-thumbnail">
						<div class="product-img-head">
							<div class="product-img">
								<img src="<?= base_url() ?>assets/images/eco-product-img-1.png" alt="" class="img-fluid" style="width: 228px; height: 250px"></div>
							<div class="ribbons bg-brand">Offer</div>
							<div class=""><a href="#" class="product-wishlist-btn active"><i class="fas fa-heart"></i></a></div>
						</div>
						<div class="product-content">
							<div class="product-content-head">
								<h3 class="product-title">Nama Produk</h3>
								<div class="product-rating d-inline-block">
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
									<i class="fa fa-fw fa-star"></i>
								</div>
								<div class="product-price mt-4">Rp. 99.000
								</div>
							</div>
							<div class="product-btn text-center">
								<a href="#" class="btn btn-primary">Add to Cart</a>
								<a href="#" class="btn btn-outline-light">Details</a>
								<!-- <a href="#" class="btn btn-outline-light"><i class="fas fa-exchange-alt"></i></a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
