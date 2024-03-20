<!-- Begin Page Content -->
<h3>Kelola Produk</h3>
<div class="card shadow mb-4">
	<div class="card-body">
		<a href="<?= base_url('produk/create') ?>" class="btn btn-primary mb-3">Add New Product</a>
		<div class="table-responsive">
			<table id="datatablesSimple" class="table mt-4 table-striped">
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
					foreach ($produk as $data) : ?>

						<tr>
							<td><?= $i++; ?></td>
							<td><?= $data['nama_produk']; ?></td>
							<td><?= $data['deskripsi_produk']; ?></td>
							<td><?= $data['spesifikasi_produk']; ?></td>
							<td><img class="img-fluid rounded" src="<?= base_url('asset'); ?>/uploads/produk/<?= $data['gambar_produk']; ?>" width="100" /></td>
							<td><?= $data['slug_produk']; ?></td>
							<td><?= $data['harga_produk']; ?></td>
							<td><?= $data['nama_jenis_produk']; ?></td>
							<td>
								<a href="<?= base_url('produk/view/') . $data['slug_produk'] ?>" class="btn btn-success">Lihat</a>
								<a href="<?= base_url('produk/edit/') . $data['id_produk'] ?>" class="btn btn-warning">Edit</a>
								<a href="<?= base_url('produk/delete/') . $data['id_produk'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<!-- /.container-fluid -->
	</div>
</div>
<!-- End of Main Content -->