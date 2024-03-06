<!-- Begin Page Content -->
<div class="container-fluid">
	<form method="post">
		<table id="dataTable" class="table mt-4 table-striped">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Profil Perusahaan</th>
					<th scope="col">Sejarah Perusahaan</th>
					<th scope="col">Visi</th>
					<th scope="col">Misi</th>
					<th scope="col">Pencapaian</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">
				<?php
				$i = 1;
				foreach ($about as $data) : ?>

					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['about_description']; ?></td>
						<td><?= $data['about_history']; ?></td>
						<td><?= $data['about_vision']; ?></td>
						<td><?= $data['about_mission']; ?></td>
						<td><?= $data['about_achievement']; ?></td>
						<td>
							<a href="<?= base_url('about/edit/') . $data['about_id'] ?>" class="btn btn-warning">Edit</a>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->