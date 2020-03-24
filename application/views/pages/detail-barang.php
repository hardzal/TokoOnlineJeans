<div class="container-fluid">
	<div class="row p-4">
		<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
					<div class="product-slider bg-dark">
						<div id="carouselExampleIndicators" class="product-carousel carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100 img-thumbnail" src="<?= base_url() ?>assets/images/pakaian-pria.jpg" alt="First slide" style="width: 285px; height: 313px">
								</div>

								<div class="carousel-item">
									<img class="d-block w-100 img-thumbnail" src="<?= base_url() ?>assets/images/pakaian-wanita.jpg" alt="Second slide" style="width: 285px; height: 313px">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span> </a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span> </a>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
					<div class="product-details">
						<div class="border-bottom pb-3 mb-3">
							<h2 class="mb-3"><?php echo $jeans->name; ?></h2>
							<div class="product-rating d-inline-block float-right">
								<i class="fa fa-fw fa-star"></i>
								<i class="fa fa-fw fa-star"></i>
								<i class="fa fa-fw fa-star"></i>
								<i class="fa fa-fw fa-star"></i>
								<i class="fa fa-fw fa-star"></i>
							</div>
							<h3 class="mb-0 text-primary">Rp. <?php echo number_format($jeans->price, 0, ',', '.'); ?></h3>
						</div>
						<div class="product-size border-bottom">
							<h4>Ukuran</h4>
							<div class="btn-group" role="group" aria-label="First group">
								<button type="button" class="btn btn-outline-light">S</button>
								<button type="button" class="btn btn-outline-light">M</button>
								<button type="button" class="btn btn-outline-light">L</button>
								<button type="button" class="btn btn-outline-light">XL</button>
								<button type="button" class="btn btn-outline-light">XXL</button>
							</div>
							<div class="product-qty">
								<h4>Quantity</h4>
								<div class="quantity">
									<input type="number" min="1" max="9" step="1" value="1">
								</div>
							</div>
						</div>
						<div class="product-description">
							<h4 class="mb-1">Deskripsi</h4>
							<p><?php echo $jeans->description; ?></p>
							<a href="#" class="btn btn-primary btn-block btn-lg">Add to Cart</a>
						</div>
					</div>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
					<div class="simple-card">
						<ul class="nav nav-tabs" id="myTab5" role="tablist">
							<li class="nav-item">
								<a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Deskripsi</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent5">
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
								<p><?php echo $jeans->description; ?></p>
							</div>
							<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
								<div class="review-block">
									<p class="review-text font-italic m-0">“Vestibulum cursus felis vel arcu convallis, viverra commodo felis bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non auctor est, sed lacinia velit. Orci varius natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.”</p>
									<div class="rating-star mb-4">
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
									</div>
									<span class="text-dark font-weight-bold">Virgina G. Lightfoot</span><small class="text-mute"> (Company name)</small>
								</div>
								<div class="review-block border-top mt-3 pt-3">
									<p class="review-text font-italic m-0">“Integer pretium laoreet mi ultrices tincidunt. Suspendisse eget risus nec sapien malesuada ullamcorper eu ac sapien. Maecenas nulla orci, varius ac tincidunt non, ornare a sem. Aliquam sed massa volutpat, aliquet nibh sit amet, tincidunt ex. Donec interdum pharetra dignissim.”</p>
									<div class="rating-star mb-4">
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
									</div>
									<span class="text-dark font-weight-bold">Ruby B. Matheny</span><small class="text-mute"> (Company name)</small>
								</div>
								<div class="review-block  border-top mt-3 pt-3">
									<p class="review-text font-italic m-0">“ Cras non rutrum neque. Sed lacinia ex elit, vel viverra nisl faucibus eu. Aenean faucibus neque vestibulum condimentum maximus. In id porttitor nisi. Quisque sit amet commodo arcu, cursus pharetra elit. Nam tincidunt lobortis augueat euismod ante sodales non. ”</p>
									<div class="rating-star mb-4">
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
										<i class="fa fa-fw fa-star"></i>
									</div>
									<span class="text-dark font-weight-bold">Gloria S. Castillo</span><small class="text-mute"> (Company name)</small>
								</div>
							</div>
						</div>
					</div>
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
