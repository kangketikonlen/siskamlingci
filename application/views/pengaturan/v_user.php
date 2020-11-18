<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Level</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Login Terakhir</th>
						<th><i class="fa fa-cogs"></i></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="card-footer d-flex justify-content-center">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#frmData"><i class="fa fa-plus"></i> Tambah Data</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="frmData">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h4 class="modal-title">Formulir Hak Akses</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="level_id">Level</label>
							<input type="hidden" name="user_id" id="user_id">
							<select name="level_id" id="level_id" class="form-control form-control-sm" required="true">
								<option value=""></option>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="user_nama">Nama</label>
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
							<label for="user_pass">Kata Sandi</label>
							<input type="password" name="user_pass" id="user_pass" class="form-control form-control-sm" placeholder="Masukkan password user..." autocomplete="off" required="true">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" id="random-pass" class="btn btn-sm btn-warning ml-2"><i class="fa fa-key"></i> Random Password</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<?php $this->load->view('pengaturan/js/js_user') ?>