<!-- Begin Page Content -->
<div class="container-fluid">
	<a href="<?= base_url('product/create') ?>" class="btn btn-primary mb-3">Add New Product</a>
	<form action="<?= base_url('product/create') ?>" method="post">
		<table id="dataTable" class="table mt-4 table-striped">
			<thead>
				<tr>
					<th scope="col">Nomor</th>
					<th scope="col">Nama</th>
					<th scope="col">Deskripsi</th>
					<th scope="col">Spesifikasi</th>
					<th scope="col">Gambar</th>
					<th scope="col">Slug</th>
					<th scope="col">Harga</th>
					<th scope="col">Jenis</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">

				<?php
				$i = 1;
				foreach ($products as $data) : ?>

					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['product_name']; ?></td>
						<td><?= $data['product_description']; ?></td>
						<td><?= $data['product_specification']; ?></td>
						<td><?= $data['product_image']; ?></td>
						<td><?= $data['product_slug']; ?></td>
						<td><?= $data['product_price']; ?></td>
						<td><?= $data['category_title']; ?></td>
						<td>
							<a href="<?= base_url('product/edit/') . $data['product_id'] ?>" class="btn btn-warning">Edit</a>
							<a href="<?= base_url('product/delete/') . $data['product_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->