$(document).ready(function () {
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
});
