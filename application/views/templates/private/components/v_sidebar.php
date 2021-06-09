<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
	<!-- Brand Logo -->
	<a href="<?= base_url() ?>" class="brand-link" style="font-size: small;">
		<i class="fa fa-2x fa-info-circle brand-image" style="margin-top:-2px"></i>
		<strong><u><span class="brand-text font-weight-light"><?= $this->session->userdata('AppInfo') ?></span></u></strong>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($Root == "Dashboard" ? "active" : "") ?>">
						<i class="nav-icon fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php foreach ($this->global->get_modul() as $modul) : ?>
					<?php if (array_search($this->session->userdata('level_id'), explode(",", $modul->modul_roles))) : ?>
						<li class="nav-item has-treeview <?= ($Root == $modul->modul_nama ? "menu-open" : "") ?>">
							<a href="#" class="nav-link <?= ($Root == $modul->modul_nama ? "active" : "") ?>">
								<i class="nav-icon fas <?= $modul->modul_icon ?>"></i>
								<p>
									<?= $modul->modul_nama ?>
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<?php foreach ($this->global->get_submodul($modul->modul_id) as $submodul) : ?>
								<?php if (array_search($this->session->userdata('level_id'), explode(",", $submodul->submodul_roles))) : ?>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?= base_url($submodul->submodul_url) ?>" class="nav-link <?= ($Title == $submodul->submodul_root ? "active" : "") ?>">
												<i class="far fa-circle nav-icon"></i>
												<p><?= $submodul->submodul_nama ?></p>
											</a>
										</li>
									</ul>
								<?php endif ?>
							<?php endforeach ?>
						</li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>