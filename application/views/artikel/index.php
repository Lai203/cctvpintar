<!-- Begin Page Content -->
<div class="container">
	<div class="row">
		<!-- Main Content Column -->
		<div class="col-lg-8">
			<?php

			foreach ($articles as $article) :
			?>
				<!-- Page content-->
				<div class="container mt-5">
					<div class="row">
						<div class="col-lg-12">
							<!-- Post content-->
							<article>
								<!-- Post header-->
								<header class="mb-4">
									<!-- Post title-->
									<a href="<?= base_url('article/detail/') . $article['blog_slug'] ?>" class="text-decoration-none">
										<h1 class="fw-bolder mb-1"><?= $article['blog_title'] ?></h1>
									</a>
									<!-- Post meta content-->
									<div class="text-muted fst-italic mb-2">Posted on <?= $article['blog_date'] ?> by Rc Electronics</div>
									<!-- Post categories-->
									<a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
									<a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
								</header>
								<!-- Preview image figure-->
								<figure class="mb-4"><img class="img-fluid rounded" src="<?= base_url('assets') ?>/img/article/<?= $article['blog_thumbnail'] ?>" alt="Article Image" /></figure>
								<!-- Post content-->
								<section class="mb-5">
									<p class="fs-5 mb-4"><?= $article['blog_body'] ?></p>
								</section>
							</article>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

			<!-- Comments section-->
			<section class="mb-5">
				<div class="card bg-light">
					<div class="card-body">
						<!-- Comment form-->
						<form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
						<!-- Comment with nested comments-->
						<!-- Add your comments dynamically based on the data -->
					</div>
				</div>
			</section>
		</div>

		<!-- Side Widgets Column -->
		<div class="col-lg-4 mt-5">
			<!-- Search widget-->
			<div class="card mb-4">
				<div class="card-header">Search</div>
				<div class="card-body">
					<div class="input-group">
						<input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
						<button class="btn btn-primary" id="button-search" type="button">Go!</button>
					</div>
				</div>
			</div>
			<!-- Categories widget-->
			<div class="card mb-4">
				<div class="card-header">Categories</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<ul class="list-unstyled mb-0">
								<li><a href="#!">Web Design</a></li>
								<li><a href="#!">HTML</a></li>
								<li><a href="#!">Freebies</a></li>
							</ul>
						</div>
						<div class="col-sm-6">
							<ul class="list-unstyled mb-0">
								<li><a href="#!">JavaScript</a></li>
								<li><a href="#!">CSS</a></li>
								<li><a href="#!">Tutorials</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- Side widget-->
			<div class="card mb-4">
				<div class="card-header">Side Widget</div>
				<div class="card-body">You can put anything you want inside of these side widgets. They are easy to use and feature the Bootstrap 5 card component!</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Main Content -->