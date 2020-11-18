<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
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
				<h4 class="modal-title">Formulir Level</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="level_nama">Nama</label>
							<input type="hidden" name="level_id" id="level_id">
							<input type="text" name="level_nama" id="level_nama" class="form-control form-control-sm" placeholder="Masukkan nama level..." autocomplete="off" required="true">
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
<?php $this->load->view('pengaturan/js/js_level') ?>