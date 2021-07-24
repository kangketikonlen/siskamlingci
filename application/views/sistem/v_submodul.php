<div class="row">
	<div class="col-lg-12">
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
						<th>URL</th>
						<th><i class="fa fa-cogs"></i></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="card-footer">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#frmData"><i class="fa fa-plus"></i> Tambah Data</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="frmData">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="modul_id">Fitur / Menu</label>
							<input type="hidden" name="submodul_id" id="submodul_id">
							<select name="modul_id" id="modul_id" class="form-control" required="true">
								<option value=""></option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="submodul_urutan">Urutan</label>
							<input type="number" name="submodul_urutan" id="submodul_urutan" class="form-control" placeholder="Masukkan urutan <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="submodul_root">Tag</label>
							<input type="text" name="submodul_root" id="submodul_root" class="form-control" placeholder="Masukkan root <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="submodul_nama">Nama</label>
							<input type="text" name="submodul_nama" id="submodul_nama" class="form-control" placeholder="Masukkan nama <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="alert alert-danger m-0">
							<b>Note</b>: Mohon untuk tidak menggunakan karakter spesial atau angka pada kolom isian <strong>Tag</strong>. Karena data tersebut akan dijadikan untuk pembuatan <strong>slug url</strong>. Gunakan alphabet dan spasi saja!. Pastikan data pada <strong>Tag</strong> unique!.
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<?php $this->load->view('sistem/js/js_submodul') ?>