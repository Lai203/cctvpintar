<!-- Begin Page Content -->
<div class="container-fluid" style="margin-top: 10px;">
	<div class="card shadow mb-4">
		<div class="card-body">
			<a href="<?= base_url('berita/create') ?>" class="btn btn-primary mb-3">Tambah Berita Baru</a>
			<div class="table-responsive">
				<table id="dataTable" class="table mt-4 table-striped">
					<thead>
						<tr>
							<th scope="col">Nomor</th>
							<th scope="col">Judul</th>
							<th scope="col">Deskripsi</th>
							<th scope="col">Isi</th>
							<th scope="col">Thumbnail</th>
							<th scope="col">Slug</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Tanggal Update</th>
							<th scope="col">Jenis</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody class="table-group-divider">

						<?php
						$i = 1;
						foreach ($berita as $data) : ?>

							<tr>
								<td><?= $i++; ?></td>
								<td><?= $data['judul_berita']; ?></td>
								<td><?= $data['deskripsi_berita']; ?></td>
								<td><?= $data['isi_berita']; ?></td>
								<td> <img class="img-fluid rounded" src="<?= base_url('asset'); ?>/uploads/berita/<?= $data['thumbnail_berita']; ?>" /></td>
								<td><?= $data['slug_berita']; ?></td>
								<td><?= $data['tanggal_dibuat_berita']; ?></td>
								<td><?= $data['tanggal_update_berita']; ?></td>
								<td><?= $data['jenis_berita']; ?></td>
								<td>
									<a href="<?= base_url('berita/view') . $data['slug_berita'] ?>" class="btn btn-success">Lihat</a>
									<a href="<?= base_url('berita/edit/') . $data['id_berita'] ?>" class="btn btn-warning">Edit</a>
									<a href="<?= base_url('berita/delete/') . $data['id_berita'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<!-- /.container-fluid -->
		</div>
	</div>
</div>
<!-- End of Main Content -->