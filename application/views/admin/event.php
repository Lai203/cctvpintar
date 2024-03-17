<!-- Begin Page Content -->
<div class="container-fluid" style="margin-top: 10px;">
	<div class="card shadow mb-4">
		<div class="card-body">
			<a href="<?= base_url('event/create') ?>" class="btn btn-primary mb-3">Tambah Event Baru</a>
			<div class="table-responsive">
				<table id="dataTable" class="table mt-4 table-striped">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama</th>
							<th scope="col">Deskripsi</th>
							<th scope="col">Gambar</th>
							<th scope="col">Lokasi</th>
							<th scope="col">Kontak</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Waktu</th>
							<th scope="col">Slug</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody class="table-group-divider">
						<?php
						$i = 1;
						foreach ($events as $data) : ?>

							<tr>
								<td><?= $i++; ?></td>
								<td><?= $data['nama_event']; ?></td>
								<td><?= $data['deskripsi_event']; ?></td>
								<td><img class="img-fluid rounded" src="<?= base_url('asset'); ?>/uploads/event/<?= $data['thumbnail_event']; ?>" /></td>
								<td><?= $data['lokasi_event']; ?></td>
								<td><?= $data['kontak_event']; ?></td>
								<td><?= $data['tanggal_event']; ?></td>
								<td><?= $data['waktu_event']; ?></td>
								<td><?= $data['slug_event']; ?></td>
								<td><?= $data['status_event']; ?></td>
								<td>
									<a href="<?= base_url('event/view') . $data['slug_event'] ?>" class="btn btn-success">Lihat</a>
									<a href="<?= base_url('event/edit/') . $data['id_event'] ?>" class="btn btn-warning">Edit</a>
									<a href="<?= base_url('event/delete/') . $data['id_event'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
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