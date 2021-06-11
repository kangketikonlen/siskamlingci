<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-4">
						<blockquote class="quote-success text-justify">
							<p>Username dan password lama harus terisi jika ingin merubah data user. Jika lupa silahkan hubungi administrator.</p>
							<small>Untuk tampilan maksimal, silahkan gunakan PC Desktop.</small>
						</blockquote>
					</div>
					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="user_nama">Nama Lengkap</label>
									<input type="text" name="user_nama" id="user_nama" class="form-control form-control-sm" placeholder="Masukkan nama user..." autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="user_login">Username</label>
									<input type="text" name="user_login" id="user_login" class="form-control form-control-sm" placeholder="Masukkan username user..." autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="user_pass_baru">Kata Sandi</label>
									<input type="password" name="user_pass_baru" id="user_pass_baru" class="form-control form-control-sm" placeholder="Masukkan password user..." autocomplete="off">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="row justify-content-between">
					<div class='col'>
						<button type="button" id="link-to-google" class="btn btn-sm btn-light"><i class="fab fa-google"></i> Bind Google</button>
						<button type="button" id="link-to-twitter" class="btn btn-sm btn-info"><i class="fab fa-twitter"></i> Bind Twitter</button>
					</div>
					<div class="col text-right">
						<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<?php $this->load->view('pengaturan/js/js_akun') ?>