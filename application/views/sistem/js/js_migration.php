<script>
	$(document).ready(function() {
		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('sistem/migration/simpan/') ?>";
			var dataReq = new FormData(this);
			confirmSave().then(function(status) {
				if (status) {
					requests(dataUrl, "POST", dataReq).then(function(results) {
						var msg = JSON.parse(results);
						pesan(msg.warning, msg.kode, msg.pesan);
					}).catch(function(err) {
						pesan("Error " + err.status, "error", "Request " + err.statusText);
					});
				}
			})
		});
	});
</script>