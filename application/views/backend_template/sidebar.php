<div id="layoutSidenav">

	<div id="layoutSidenav_nav">
		<a class="sb-topnav navbar-brand navbar-brand px-4 py-4 fs-4" href="<?= base_url('admin') ?>">CCTV PINTAR</a>
		<nav class="sb-sidenav accordion sb-sidenav-white border-end" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<ul class="navbar-nav ms-auto ms-md-0 me-lg-4 navbar-brand px-4 mt-3">
					<li class="nav-item dropdown">
						<a class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
							<div class="d-flex align-items-center">
								<img class="img-profile rounded-circle" src="<?= base_url('asset/') ?>undraw_profile.svg" alt="" width="50">
								<span class="ms-2 d-none d-lg-block">Admin123</span>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
						</ul>
					</li>
				</ul>

				<br>
				<div class="nav">
					<a class="nav-link text-dark ms-2" href="<?= base_url('admin/') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-dark"></i></div>
						Dashboard
					</a>
					<div class="sb-sidenav-menu-heading text-primary">Kelola Data</div>

					<a class="nav-link text-dark ms-2" href="<?= base_url('admin/artikel') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-file-alt text-dark"></i></div>
						Artikel
					</a>
					<a class="nav-link text-dark ms-2" href="<?= base_url('admin/produk') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-cube text-dark"></i></div>
						Produk
					</a>
					<a class="nav-link text-dark ms-2" href="<?= base_url('admin/berita') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-newspaper text-dark"></i></div>
						Berita
					</a>
					<a class="nav-link text-dark ms-2" href="<?= base_url('admin/event') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-building text-dark"></i></div>
						Event
					</a>
					<a class="nav-link text-dark ms-2" href="<?= base_url('admin/profil') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-dark"></i></div>
						Profil
					</a>
					<a class="nav-link text-dark ms-2" href="<?= base_url('admin/kontak') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-envelope text-dark"></i></div>
						Kontak
					</a>
				</div>
			</div>
			<div class="sb-sidenav-footer">

			</div>
		</nav>
	</div>


	<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Select "Logout" below if you are ready to end your current session.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<div id="layoutSidenav_content" class="">
		<main>
			<div class="container-fluid ps-4">