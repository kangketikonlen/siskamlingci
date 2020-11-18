<div class="row">
	<div class="col-lg-12">
		<div class="card">
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
	<div class="modal-dialog">
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
						<span id="Modul"></span>
					</div>
					<?php foreach ($this->m->get_level() as $level) : ?>
						<div class="col">
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
<?php $this->load->view('pengaturan/js/js_hak_akses') ?>