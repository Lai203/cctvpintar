<!-- Begin Page Content -->
<h3>Kelola Artikel</h3>
<div class="card shadow mb-4">
	<div class="card-body">
		<a href="<?= base_url('artikel/create') ?>" class="btn btn-primary mb-3">Buat Artikel Baru</a>
		<div class="table-responsive">
			<table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Judul</th>
						<th scope="col">Deskripsi</th>
						<th scope="col">Keyword</th>
						<th scope="col">Isi</th>
						<th scope="col">Gambar</th>
						<th scope="col">Tags</th>
						<th scope="col">Kategori</th>
						<th scope="col">Tanggal Dibuat</th>
						<th scope="col">Tanggal Update</th>
						<th scope="col">Status</th>
						<th scope="col">Slug</th>
						<th scope="col">Terakhir Update</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">

					<?php
					$i = 1;
					foreach ($artikel as $data) : ?>

						<tr>
							<td><?= $i++; ?></td>
							<td><?= $data['judul_artikel']; ?></td>
							<td><?= $data['deskripsi_artikel']; ?></td>
							<td><?= $data['keyword_artikel']; ?></td>
							<td><?= $data['isi_artikel']; ?></td>
							<td> <img class="img-fluid rounded" src="<?= base_url('asset'); ?>/uploads/artikel/<?= $data['thumbnail_artikel']; ?>" width="100" /></td>
							<td><?= $data['tags_artikel']; ?></td>
							<td><?= $data['nama_kategori_artikel']; ?></td>
							<td><?= $data['tanggal_dibuat_artikel']; ?></td>
							<td><?= $data['tanggal_update_artikel']; ?></td>
							<td><?= $data['status_artikel']; ?></td>
							<td><?= $data['slug_artikel']; ?></td>
							<td><?= $data['last_updated'] ?></td>
							<td>
								<a href="<?= base_url('artikel/view') . $data['slug_artikel'] ?>" class="btn btn-success">Lihat</a>
								<a href="<?= base_url('artikel/edit/') . $data['id_artikel'] ?>" class="btn btn-warning">Edit</a>
								<a href="<?= base_url('artikel/delete/') . $data['id_artikel'] ?>" class="btn btn-danger btn-delete">Delete</a>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
	<div class="card-body">
		<a href="<?= base_url('artikel/create_kategori') ?>" class="btn btn-primary mb-3">Buat Kategori Baru</a>
		<div class="table-responsive">
			<table class="table table-bordered" id="datatablesSimple2" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama</th>
						<th scope="col">Deskripsi</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">

					<?php
					$i = 1;
					foreach ($kategori as $data) : ?>

						<tr>
							<td><?= $i++; ?></td>
							<td><?= $data['nama_kategori_artikel']; ?></td>
							<td><?= $data['deskripsi_kategori_artikel']; ?></td>
							<td>
								<a href="<?= base_url('artikel/edit_kategori/') . $data['id_kategori_artikel'] ?>" class="btn btn-warning">Edit</a>
								<a href="<?= base_url('artikel/delete_kategori/') . $data['id_kategori_artikel'] ?>" class="btn btn-danger btn-delete">Delete</a>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->