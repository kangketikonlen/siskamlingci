<script>
	$(document).ready(function() {
		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
			return {
				"iStart": oSettings._iDisplayStart,
				"iEnd": oSettings.fnDisplayEnd(),
				"iLength": oSettings._iDisplayLength,
				"iTotal": oSettings.fnRecordsTotal(),
				"iFilteredTotal": oSettings.fnRecordsDisplay(),
				"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
				"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
			};
		};

		var table = $("#dtTable").dataTable({
			initComplete: function() {
				$("#overlay").fadeOut(300);
				var api = this.api();
				$('#dtTable_filter input').off('.DT').on('input.DT', function() {
					api.search(this.value).draw();
					$("#overlay").fadeOut(300);
				});
			},
			processing: true,
			serverSide: true,
			ajax: {
				"url": "<?= base_url('sistem/password_encrypter_tools/list_data/') ?>",
				"type": "POST",
				"error": function(xhr, status, error) {
					swal(error, "Terjadi kegagalan saat memuat data. Sepertinya internetmu kurang stabil. Silahkan coba kembali saat internetmu stabil.", "error").then((value) => {
						$("#dtTable").DataTable().ajax.reload(function() {
							$("#overlay").fadeOut(300)
						}, false);
					})
				}
			},
			columns: [{
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1 + ".";
					}
				},
				{
					"data": "1"
				},
				{
					"data": "2"
				}
			],
			rowCallback: function(row, data, iDisplayIndex) {
				$("#overlay").fadeOut(300);
				var info = this.fnPagingInfo();
				var page = info.iPage;
				var length = info.iLength;
				$('td:eq(0)', row).html();
			}
		});

		$(document).on('click', '#encryptAll', function() {
			swal({
				title: "Anda Yakin Ingin Enkripsi Data?",
				text: "Klik CANCEL jika ingin membatalkan!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if (Oke) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('sistem/password_encrypter_tools/encrypt/') ?>",
						beforeSend: function(xhr) {
							$("#overlay").fadeIn(300);
						},
						success: function(response) {
							$("#overlay").fadeOut(300);
							var data = JSON.parse(response);
							swal(data.warning, data.pesan, data.kode).then((value) => {
								if (data.kode == "success") {
									$("#dtTable").DataTable().ajax.reload(function() {
										$("#overlay").fadeOut(300)
									}, false);
								}
							})
						},
						error: function(xhr, status, error) {
							swal(error, "Please Ask Support or Refresh the Page!", "error").then((value) => {
								$("#dtTable").DataTable().ajax.reload(function() {
									$("#overlay").fadeOut(300)
								}, false);
							})
						}
					})
				} else {
					swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
						location.reload();
					})
				}
			})
		});
	});
</script>