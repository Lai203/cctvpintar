<!-- Begin Page Content -->
<h3>Kelola Profil</h3>
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table mt-4 table-striped">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Profil Perusahaan</th>
						<th scope="col">Sejarah Perusahaan</th>
						<th scope="col">Visi</th>
						<th scope="col">Misi</th>
						<th scope="col">Pencapaian</th>
						<th scope="col">Terakhir Update</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php
					$i = 1;
					foreach ($profil as $data) : ?>

						<tr>
							<td><?= $i++; ?></td>
							<td><?= $data['profil']; ?></td>
							<td><?= $data['sejarah']; ?></td>
							<td><?= $data['visi']; ?></td>
							<td><?= $data['misi']; ?></td>
							<td><?= $data['pencapaian']; ?></td>
							<td><?= $data['last_updated']; ?></td>
							<td>
								<a href="<?= base_url('profil/view') ?>" class="btn btn-success">Lihat</a>
								<a href="<?= base_url('profil/edit/') . $data['id'] ?>" class="btn btn-warning">Edit</a>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<a href="<?= base_url('profil/create_rekan') ?>" class="btn btn-primary mb-3">Tambah Rekan</a>
			<table id="datatablesSimple" class="table mt-4 table-striped">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama Perusahaan</th>
						<th scope="col">Logo Perusahaan</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<?php
					$i = 1;
					foreach ($rekan as $data) : ?>

						<tr>
							<td><?= $i++; ?></td>
							<td><?= $data['nama']; ?></td>
							<td><img class="img-fluid rounded" src="<?= base_url('asset'); ?>/uploads/profil/<?= $data['logo']; ?>" width="100" /></td>
							<td>

								<a href="<?= base_url('profil/edit_rekan/') . $data['id'] ?>" class="btn btn-warning">Edit</a>
								<a href="<?= base_url('profil/delete_rekan/') . $data['id'] ?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->