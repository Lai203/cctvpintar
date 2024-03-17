<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">CCTV Pintar</div>
	</a>
	<hr class="sidebar-divider my-0">
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		Interface
	</div>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/artikel') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Kelola Artikel</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/produk') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Kelola Produk</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/berita') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Kelola Berita</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/event') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Kelola Event</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/profil') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Kelola Profil</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/kontak') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Kelola Kontak</span></a>
	</li>
	<hr class="sidebar-divider d-none d-md-block">
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout') ?> " onclick="return confirm('Are you sure you want to Logout?')">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Logout</span></a>
	</li>
	<hr class="sidebar-divider d-none d-md-block">
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
	<div id="content">