<script>
	$(document).ready(function() {
		jQuery.ajax({
			type: "POST",
			url: "<?= base_url('pengaturan/akun/get_data/') ?>",
			dataType: 'json',
			data: {
				user_id: $(this).attr("data")
			},
			beforeSend: function(xhr) {
				$("#overlay").fadeIn(300);
			},
			success: function(data) {
				$("#overlay").fadeOut(300);
				$("#user_login").attr("disabled", "TRUE");
				$("#user_login").val("");
				$("#user_pass").attr("disabled", "TRUE");
				$("#user_pass").val("");
				$.each(data, function(key, value) {
					var ctrl = $('[name=' + key + ']', $('#Frm'));
					switch (ctrl.prop("type")) {
						case "select-one":
							ctrl.val(value).change();
							break;
						default:
							ctrl.val(value);
					}
				});
			},
			error: function(xhr, status, error) {
				swal(error, "Terjadi kegagalan saat memuat data. Sepertinya internetmu kurang stabil. Silahkan coba kembali saat internetmu stabil.", "error").then((value) => {
					$("#dtTable").DataTable().ajax.reload(function() {
						$("#overlay").fadeOut(300)
					}, false);
				})
			}
		});
		$('#Frm').submit(function(e) {
			e.preventDefault();
			swal({
				title: "Anda Yakin Ingin Menyimpan Data?",
				text: "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if (Oke) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('pengaturan/akun/simpan/') ?>",
						data: $("#Frm").serialize(),
						timeout: 5000,
						beforeSend: function(xhr) {
							$("#overlay").fadeIn(300);
						},
						success: function(response) {
							$("#overlay").fadeOut(300);
							var data = JSON.parse(response);
							swal(data.warning, data.pesan, data.kode).then((value) => {
								if (data.kode == "success") {
									$("#overlay").fadeOut(300)
									location.reload();
								}
							})
						},
						error: function(xhr, status, error) {
							swal(error, "Please Ask Support or Refresh the Page!", "error").then((value) => {
								$("#overlay").fadeOut(300);
							})
						}
					})
				} else {
					swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
						location.reload();
					})
				}
			});
		});
		$(document).on('click', '#sandi-baru', function() {
			swal({
				title: "Anda Yakin Ingin Mengganti Sandi?",
				text: "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if (Oke) {
					$("#user_login").removeAttr("disabled", "TRUE");
					$("#user_login").val("");
					$("#user_pass").removeAttr("disabled", "TRUE");
					$("#user_pass").val("");
				} else {
					swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
						location.reload();
					})
				}
			})
		});
	});
</script>