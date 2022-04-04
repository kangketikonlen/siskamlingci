<div class="login-box">
	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<a href="<?= base_url() ?>" class="h4"><?= $Instansi->instansi_nama ?></a>
		</div>
		<div class="card-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<?= form_open("", array('id' => 'Frm')) ?>
			<div class="input-group mb-3">
				<input type="text" id="user_login" class="form-control" name="user_login" required="true" autocomplete="off" placeholder="Username">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-user"></span>
					</div>
				</div>
			</div>
			<div class="input-group mb-3">
				<input type="password" id="user_pass" class="form-control" name="user_pass" required="true" autocomplete="off" placeholder="Password">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-lock"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<button type="submit" class="btn btn-primary btn-block">Sign In</button>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<script>
	$('#Frm').submit(function(e) {
		e.preventDefault();
		var dataUrl = "<?= base_url('portal/proses_login') ?>";
		var dataReq = new FormData(this);
		confirmLogin().then(function(status) {
			if (status) {
				requests(dataUrl, "POST", dataReq).then(function(results) {
					var msg = JSON.parse(results);
					pesanThenReload(msg.warning, msg.kode, msg.pesan, true);
				}).catch(function(err) {
					pesan("Error " + err.status, "error", "Request " + err.statusText);
				});
			}
		})
	});
</script>