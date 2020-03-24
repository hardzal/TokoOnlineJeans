<div class="container-fluid">
	<div class="row p-4 text-center">
		<div class="col-sm-12">
			<h1>Our Collection</h1>
			<hr>
		</div>
		<div class="col-sm-6 text-center">
			<h2 class="p-2">Pria</h2>
			<a href="<?= base_url() ?>collection/type/pria">
				<img class=" img-thumbnail" src="<?= base_url() ?>assets/images/pakaian-pria.jpg" style="width: 370px; height: 370px">
			</a>
		</div>
		<div class="col-sm-6 text-center">
			<h2 class="p-2">Wanita</h2>
			<a href="<?= base_url() ?>collection/type/wanita">
				<img class="img-thumbnail" src="<?= base_url() ?>assets/images/pakaian-wanita.jpg" style="width: 370px; height: 370px">
			</a>
		</div>
	</div>
	<div class="row text-center mt-3">
		<div class="col-sm-12">
			<h1>List Catalogs</h1>
			<hr />
		</div>
		<div class="col-sm-12 mb-3">
			<ul class="list-group">
				<?php foreach ($catalogs as $catalog) : ?>
					<li class="list-group-item">
						<a href="<?php echo base_url('catalog/') . $catalog->permalink; ?>" class="btn btn-primary"><?php echo $catalog->name; ?></a>
						<!--<span class="badge badge-primary badge-pill">14</span>-->
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
