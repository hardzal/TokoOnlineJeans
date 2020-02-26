$(document).ready(function () {

	if (document.querySelector('.custom-file-input')) {
		document.querySelector('.custom-file-input').addEventListener('change', function (e) {
			var fileName = document.getElementById("customFile").files[0].name;
			var nextSibling = e.target.nextElementSibling;
			nextSibling.innerText = fileName;
		});
	}

	$("#tambahKatalog").on('click', function (e) {
		e.preventDefault();
		const link = $(this).data('link');
		$('#catalogForm').prop('action', link);

		$('.catalog-modal-title').html("Tambah data katalog");
		$('#catalogForm')[0].reset();
	});

	$(".editCatalog").on('click', function (e) {
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

	$('#tambahUser').on('click', function (e) {
		e.preventDefault();
		const link = $(this).data('link');

		$('#userForm').prop('action', link);

		$('.user-modal-title').html("Tambah data customer");
		$('#userForm')[0].reset();
	});

	$('.editUser').on('click', function (e) {
		e.preventDefault();

		const link = $(this).data('link');
		const user_id = $(this).data('id');

		$('#userForm').prop('action', link);
		$('.user-modal-title').html("Edit data customer");
		$('#userForm')[0].reset();

		$.ajax({
			url: link,
			data: {
				id: user_id
			},
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#password').prop('required', false);
				$('#username').val(data.username);
				$('#email').val(data.email);
				$('#nama_lengkap').val(data.nama_lengkap);
				$('#telepon').val(data.telp);
				$('#alamat').val(data.alamat);
				$('input[type="radio"][name="jenis-kelamin"][value="' + data.jenis_kelamin + '"').prop('checked', true);
				$('#user_id').val(data.id);
			}
		});
	});

	$("#tambahFAQ").on('click', function (e) {
		e.preventDefault();
		const link = $(this).data('link');
		$('#faqForm').prop('action', link);

		$('.faq-modal-title').html("Tambah data FAQ");
		$('#faqForm')[0].reset();
	});

	$(".editFaq").on('click', function (e) {
		e.preventDefault();
		const link = $(this).data('link');
		const faq_id = $(this).data('id');

		$('#faqForm').prop('action', link);
		$('.faq-modal-title').html("Edit data FAQ");
		$('#faqForm')[0].reset();

		$.ajax({
			url: link,
			data: {
				id: faq_id
			},
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#question').val(data.question);
				$('#answer').val(data.answer);
				$('#idFaq').val(data.id);
			}
		});
	});
});
