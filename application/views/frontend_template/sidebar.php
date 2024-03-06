<?php
$subMenu = $this->db->get_where('sub_menu')->result_array();
$current_page = basename($_SERVER['PHP_SELF']);
?>

<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Rc Electronics</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if ($current_page == 'dashboard') echo 'active'; ?>">
		<a class="nav-link" href="<?= base_url('dashboard'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Administrator</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<?php foreach ($subMenu as $sm) : ?>
		<li class="nav-item <?php echo ($current_page == $sm['submenu']) ? 'active' : ''; ?>">
			<a class="nav-link pb-0" href="<?= base_url($sm['link']); ?>">
				<i class="<?= $sm['icon']; ?>"></i>
				<span><?= $sm['submenu']; ?></span>
			</a>
		</li>
	<?php endforeach; ?>

	<!-- Divider -->
	<hr class="sidebar-divider mt-3">

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('login/index') ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>