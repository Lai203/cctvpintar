<?php
// Get the current page from the URL
$current_page = basename($_SERVER['PHP_SELF']);

// Get the main menu items from the database
$menu = $this->db->get('main_menu')->result_array();
?>

<!-- Responsive navbar-->
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container px-5">
		<a class="navbar-brand" href="<?= base_url('home'); ?>">Rc Electronics <?= $title ?></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				<?php if (!empty($menu)) : ?>
					<?php foreach ($menu as $m) : ?>
						<?php $is_active = ($current_page == $m['main_menu']) ? 'active' : ''; ?>
						<li class="nav-item <?= $is_active; ?>">
							<a class="nav-link pb-0" href="<?= base_url($m['main_menu']) ?>"><?= $m['main_menu'] ?></a>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav> -->

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="border-bottom: 4px solid black;">
	<div class="container mx-auto  mb-2 mt-2">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#" style="color: #073950;">Beranda</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('about') ?>" style="color: #073950;">Profil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('product') ?>" style="color: #073950;">Katalog</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('article') ?>" style="color: #073950;">Artikel</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('event') ?>" style="color: #073950;">Event</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('news') ?>" style="color: #073950;">Berita</a>
				</li>
			</ul>
		</div>
		<a class="btn btn-primary" style="max-width: 200px; width: 100%; background-color: black; color: white;">Kontak Kami</a>
	</div>
</nav>