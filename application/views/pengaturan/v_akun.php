<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-4">
						<blockquote class="quote-success text-justify">
							<p>Username dan password lama harus terisi jika ingin merubah data user. Jika lupa silahkan hubungi administrator. Tekan tombol ubah sandi jika ingin mengubah kata sandi.</p>
							<small>Untuk tampilan maksimal, silahkan gunakan PC Desktop.</small>
						</blockquote>
					</div>
					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="user_nama">Nama Lengkap</label>
									<input type="hidden" name="user_id" id="user_id">
									<input type="text" name="user_nama" id="user_nama" class="form-control form-control-sm" placeholder="Masukkan nama user..." autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="text-success" for="user_login_lama">Username (Lama)</label>
									<input type="text" name="user_login_lama" id="user_login_lama" class="form-control form-control-sm" placeholder="Masukkan username user..." autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="text-success" for="user_pass_lama">Kata Sandi (Lama)</label>
									<input type="password" name="user_pass_lama" id="user_pass_lama" class="form-control form-control-sm" placeholder="Masukkan password user..." autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="user_login">Username (Baru)</label>
									<input type="text" name="user_login" id="user_login" class="form-control form-control-sm" placeholder="Masukkan username user..." autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="user_pass">Kata Sandi (Baru)</label>
									<input type="password" name="user_pass" id="user_pass" class="form-control form-control-sm" placeholder="Masukkan password user..." autocomplete="off" required="true">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer d-flex justify-content-end">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" id="sandi-baru" class="btn btn-sm btn-success ml-2"><i class="fa fa-key"></i> Ubah sandi</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<?php $this->load->view('pengaturan/js/js_akun') ?>