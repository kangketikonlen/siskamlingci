<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Akses Modul</h4>
			</div>
			<div class="card-body row">
				<?php foreach ($this->global->get_modul() as $modul) : ?>
					<div class="col-lg-3 col-6">
						<div class="small-box bg-info">
							<div class="inner">
								<h5><?= $modul->modul_nama ?></h5>
								<small>Urutan ke-<?= $modul->modul_urutan ?>, tipe <?= $modul->modul_tipe ?>, tanggal di buat <?= tgl_indo($modul->created_date) ?>, oleh <?= $modul->created_by ?></small>
							</div>
							<div class="icon">
								<i class="fa <?= $modul->modul_icon ?>"></i>
							</div>
							<a href="#" id="setup" data="<?= $modul->modul_id ?>" class="small-box-footer"> Atur Akses </a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<select name="filter_modul_id" id="filter_modul_id" class="form-control" required="true">
					<option value=""></option>
				</select>
			</div>
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Modul</th>
						<th>Root</th>
						<th>Nama</th>
						<th>Roles</th>
						<th><i class="fa fa-cogs"></i></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="frmData">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<input type="hidden" name="submodul_id" id="submodul_id">
						<input type="hidden" name="submodul_roles" id="submodul_roles">
						<h4 id="submodul_nama"></h4>
					</div>
					<?php foreach ($this->m->get_level() as $level) : ?>
						<div class="col-lg-6">
							<div class="form-check">
								<input type="checkbox" name="submodul_roles_checked[]" id="submodul_roles_<?= $level->level_id ?>" class=" form-check-input" value="<?= $level->level_id ?>">
								<label class="form-check-label" for="submodul_roles_<?= $level->level_id ?>"><?= $level->level_nama ?></label>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<div class="modal fade" id="frmSetup">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'FrmSetup')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<input type="hidden" name="modul_id" id="modul_id">
						<input type="hidden" name="modul_roles" id="modul_roles">
						<h4 id="modul_nama"></h4>
					</div>
					<?php foreach ($this->m->get_level() as $level) : ?>
						<div class="col-lg-6">
							<div class="form-check">
								<input type="checkbox" name="modul_roles_checked[]" id="modul_roles_<?= $level->level_id ?>" class=" form-check-input" value="<?= $level->level_id ?>">
								<label class="form-check-label" for="modul_roles_<?= $level->level_id ?>"><?= $level->level_nama ?></label>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<?php $this->load->view('pengaturan/js/js_hak_akses') ?>