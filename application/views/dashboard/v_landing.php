<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between">
					<h3 class="card-title">Selamat datang, <b><?= $this->session->userdata('nama') ?></b></h3>
					<span id="tanggal"></span>
				</div>
			</div>
			<div class="card-body">
				<div class="d-flex">
					<p class="text-justify">Ini adalah halaman beranda <?= $this->session->userdata('AppInfo') ?>. Silahkan jelajahi dengan menggunakan tombol navigasi di samping atau tekan tombol <i class=" fa fa-bars"></i> diatas untuk mengakses fitur.</p>
				</div>
			</div>
		</div>
	</div>
</div>