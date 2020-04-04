<div class="container-fluid mb-4">
	<div class="row pt-4">
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="product-sidebar">
				<div class="product-sidebar-widget">
					<h4 class="mb-0">E-Commerce Filter</h4>
				</div>
				<div class="product-sidebar-widget">
					<h4 class="product-sidebar-widget-title">Category</h4>
					<?php foreach ($catalogs as $catalog) : ?>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="cat-<?php echo $catalog->id; ?>">
							<label class="custom-control-label" for="cat-<?php echo $catalog->id; ?>"><?php echo $catalog->name; ?></label>
						</div>
					<?php endforeach; ?>
				</div>
				<!--<div class="product-sidebar-widget">
					<h4 class="product-sidebar-widget-title">Size</h4>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="size-1">
						<label class="custom-control-label" for="size-1">Small</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="size-2">
						<label class="custom-control-label" for="size-2">Medium</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="size-3">
						<label class="custom-control-label" for="size-3">Large</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="size-4">
						<label class="custom-control-label" for="size-4">Extra Large</label>
					</div>
				</div>
				<div class="product-sidebar-widget">
                    <h4 class="product-sidebar-widget-title">Brand</h4>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="brand-1">
                        <label class="custom-control-label" for="brand-1">Brand Name #1</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="brand-2">
                        <label class="custom-control-label" for="brand-2">Brand Name #2</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="brand-3">
                        <label class="custom-control-label" for="brand-3">Brand Name #3</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="brand-4">
                        <label class="custom-control-label" for="brand-4">Brand Name #4</label>
                    </div>
                </div>
                <div class="product-sidebar-widget">
                    <h4 class="product-sidebar-widget-title">Color</h4>
                    <div class="custom-control custom-radio custom-color-blue ">
                        <input type="radio" id="color-1" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="color-1">Blue</label>
                    </div>
                    <div class="custom-control custom-radio custom-color-red ">
                        <input type="radio" id="color-2" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="color-2">Red</label>
                    </div>
                    <div class="custom-control custom-radio custom-color-yellow ">
                        <input type="radio" id="color-3" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="color-3">Yellow</label>
                    </div>
                    <div class="custom-control custom-radio custom-color-black ">
                        <input type="radio" id="color-4" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="color-4">Black</label>
                    </div>
                </div>
                <div class="product-sidebar-widget">
                    <h4 class="product-sidebar-widget-title">Price</h4>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="price-1">
                        <label class="custom-control-label" for="price-1">$$</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="price-2">
                        <label class="custom-control-label" for="price-2">$$$</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="price-3">
                        <label class="custom-control-label" for="price-3">$$$$</label>
                    </div>
                </div>-->
				<div class="product-sidebar-widget">
					<a href="#" class="btn btn-outline-light">Reset Filter</a>
				</div>
			</div>
		</div>
		<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
			<div class="row">
				<?php if (empty($collections)) : ?>
					<div class="col-md-12">
						<p class='alert alert-primary'>
							Koleksi jeans belum tersedia!
						</p>
					</div>
				<?php else : ?>
					<?php foreach ($collections as $collection) : ?>
						<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="product-thumbnail">
								<div class="product-img-head">
									<div class="product-img">
										<a href="<?php echo base_url('collection/') . $collection->code . "/" . $collection->permalink; ?>" title="<?php echo $collection->name; ?>"><img src="<?= base_url() ?>assets/images/collections/<?php echo $collection->img; ?>" alt="<?php echo $collection->img; ?>" class="img-fluid" style="object-fit: cover; width: 280px; height: 280px;"></a>
									</div>
								</div>
								<div class="product-content">
									<div class="product-content-head">
										<h3 class="product-title"><?php echo $collection->name; ?></h3>
										<div class="product-price">Rp <?php echo number_format($collection->price, 0, ',', '.'); ?></div>
									</div>
									<div class="product-btn text-center">
										<a href="#" class="btn btn-primary">Add to Cart</a>
										<a href="<?php echo base_url('collection/') . $collection->code . "/" . $collection->permalink; ?>" title="<?php echo $collection->name; ?>" class="btn btn-outline-light">Details</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item"><a class="page-link" href="#">Previous</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item active"><a class="page-link " href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">Next</a></li>
							</ul>
						</nav>
					</div>
				<?php endif; ?>
			</div>
		</div>

	</div>
</div>
