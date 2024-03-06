<!-- Begin Page Content -->
<div class="container-fluid">
	<a href="<?= base_url('article/create') ?>" class="btn btn-primary mb-3">Add New Article</a>
	<form action="<?= base_url('article/create') ?>" method="post">
		<table id="dataTable" class="table mt-4 table-striped">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Judul</th>
					<th scope="col">Deskripsi</th>
					<th scope="col">Isi</th>
					<th scope="col">Gambar</th>
					<th scope="col">Tags</th>
					<th scope="col">Kategori</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Slug</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">

				<?php
				$i = 1;
				foreach ($articles as $data) : ?>

					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['blog_title']; ?></td>
						<td><?= $data['blog_description']; ?></td>
						<td><?= $data['blog_body']; ?></td>
						<td><?= $data['blog_thumbnail']; ?></td>
						<td><?= $data['blog_tags']; ?></td>
						<td><?= $data['category_title']; ?></td>
						<td><?= $data['blog_date']; ?></td>
						<td><?= $data['blog_slug']; ?></td>
						<td>
							<a href="<?= base_url('article/edit/') . $data['blog_id'] ?>" class="btn btn-warning">Edit</a>
							<a href="<?= base_url('article/delete/') . $data['blog_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->