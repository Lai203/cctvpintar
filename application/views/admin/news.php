<!-- Begin Page Content -->
<div class="container-fluid">
	<a href="<?= base_url('news/create') ?>" class="btn btn-primary mb-3">Add New News</a>
	<form action="<?= base_url('news/create') ?>" method="post">
		<table id="dataTable" class="table mt-4 table-striped">
			<thead>
				<tr>
					<th scope="col">Nomor</th>
					<th scope="col">Title</th>
					<th scope="col">Deskripsi</th>
					<th scope="col">Isi</th>
					<th scope="col">Thumbnail</th>
					<th scope="col">Slug</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Jenis</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">

				<?php
				$i = 1;
				foreach ($news as $data) : ?>

					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['news_title']; ?></td>
						<td><?= $data['news_description']; ?></td>
						<td><?= $data['news_body']; ?></td>
						<td><?= $data['news_thumbnail']; ?></td>
						<td><?= $data['news_slug']; ?></td>
						<td><?= $data['news_date']; ?></td>
						<td><?= $data['news_type']; ?></td>
						<td>
							<a href="<?= base_url('news/edit/') . $data['news_id'] ?>" class="btn btn-warning">Edit</a>
							<a href="<?= base_url('news/delete/') . $data['news_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->