<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #182434;">
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
	<br>
	<div class="sidebar-heading">
		Kelola Data
	</div>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/artikel') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Artikel</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/produk') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Produk</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/berita') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Berita</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/event') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Event</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/profil') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Profil</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/kontak') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Kontak</span></a>
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