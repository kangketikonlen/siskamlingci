<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Icon</th>
						<th>Nama</th>
						<th><i class="fa fa-cogs"></i></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<?php if ($this->session->userdata('level') == "Master") : ?>
				<div class="card-footer d-flex justify-content-center">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#frmData"><i class="fa fa-plus"></i> Tambah Data</button>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>
<div class="modal fade" id="frmData">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="modul_urutan">Urutan</label>
							<input type="text" name="modul_urutan" id="modul_urutan" class="form-control form-control-sm" placeholder="Masukkan urutan <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="modul_icon">Icon</label>
							<input type="hidden" name="modul_id" id="modul_id">
							<input type="text" name="modul_icon" id="modul_icon" class="form-control form-control-sm" placeholder="Masukkan icon <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="modul_nama">Nama</label>
							<input type="text" name="modul_nama" id="modul_nama" class="form-control form-control-sm" placeholder="Masukkan nama <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<?php $this->load->view('pengaturan/js/js_modul') ?>