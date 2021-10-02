<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Nama</th>
						<th>Password</th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="card-footer">
				<button type="button" id="encryptAll" class="btn btn-primary btn-sm"><i class="fa fa-key"></i> Encrypt</button>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('sistem/js/js_password_encrypter_tools') ?>