$(document).ready(function () {
	document.querySelector('.custom-file-input').addEventListener('change', function (e) {
		var fileName = document.getElementById("customFile").files[0].name;
		var nextSibling = e.target.nextElementSibling;
		nextSibling.innerText = fileName;
	});

	$("#tambahKatalog").on('click', function (e) {
		e.preventDefault();
		const link = $(this).data('link');
		$('#catalogForm').prop('action', link);

		$('.catalog-modal-title').html("Tambah data katalog");
		$('#catalogForm')[0].reset();
	});

	$('.editCatalog').on('click', function (e) {
		e.preventDefault();
		const link = $(this).data('link');
		const catalog_id = $(this).data('id');

		$('#catalogForm').prop('action', link);
		$('.catalog-modal-title').html("Edit data katalog");
		$('#catalogForm')[0].reset();

		$.ajax({
			url: link,
			data: {
				id: catalog_id
			},
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#namaKatalog').val(data.name);
				$('#deskripsiKatalog').val(data.description);
				$('#idKatalog').val(data.id);
			}
		});
	});

	$("#tambahCollection").on('click', function (e) {
		e.preventDefault();
		const link = $(this).data('link');
		$('#collectionForm').prop('action', link);

		$('.collection-modal-title').html("Tambah data koleksi");
		$('#collectionForm')[0].reset();
	});

	$('.editCollection').on('click', function (e) {
		e.preventDefault();
		const link = $(this).data('link');
		const collection_id = $(this).data('id');

		$('#collectionForm').prop('action', link);
		$('.collection-modal-title').html("Edit data koleksi");
		$('#collectionForm')[0].reset();

		$.ajax({
			url: link,
			data: {
				id: collection_id
			},
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#nama_barang').val(data.name);
				$('#katalog option[value="' + data.catalog_id + '"]').prop('selected', true);
				$('#harga').val(data.price);
				$('#stok').val(data.stock);
				$('#deskripsi').val(data.description);
				$('#koleksi_id').val(data.id);
			}
		});
	});
});
