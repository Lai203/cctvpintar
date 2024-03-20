<!-- Begin Page Content -->
<h3>Kelola Kontak</h3>
<div class="card shadow mb-4">
	<div class="card-body">
		<a href="<?= base_url('kontak/create') ?>" class="btn btn-primary mb-3">Tambah Kontak Baru</a>
		<div class="table-responsive">
			<table id="datatablesSimple" class="table mt-4 table-striped">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Jenis</th>
						<th scope="col">Informasi</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php
					$i = 1;
					foreach ($kontak as $data) : ?>

						<tr>
							<td><?= $i++; ?></td>
							<td><?= $data['nama_kontak']; ?></td>
							<td><?= $data['informasi_kontak']; ?></td>
							<td>
								<a href="<?= base_url('kontak/edit/') . $data['id_kontak'] ?>" class="btn btn-warning">Edit</a>
								<a href="<?= base_url('kontak/delete/') . $data['id_kontak'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<!-- /.container-fluid -->
	</div>
</div>

<!-- End of Main Content -->