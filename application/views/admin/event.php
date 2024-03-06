<!-- Begin Page Content -->
<div class="container-fluid">
	<a href="<?= base_url('event/create') ?>" class="btn btn-primary mb-3">Add New Event</a>
	<form action="<?= base_url('event/create') ?>" method="post">
		<table id="dataTable" class="table mt-4 table-striped">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Judul</th>
					<th scope="col">Deskripsi</th>
					<th scope="col">Gambar</th>
					<th scope="col">Lokasi</th>
					<th scope="col">Kontak</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Jam</th>
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
						<td><?= $data['event_title']; ?></td>
						<td><?= $data['event_description']; ?></td>
						<td><?= $data['event_thumbnail']; ?></td>
						<td><?= $data['event_location']; ?></td>
						<td><?= $data['event_contact']; ?></td>
						<td><?= $data['event_date']; ?></td>
						<td><?= $data['event_time']; ?></td>
						<td><?= $data['event_slug']; ?></td>
						<td><?= $data['event_status']; ?></td>
						<td>
							<a href="<?= base_url('event/edit/') . $data['event_id'] ?>" class="btn btn-warning">Edit</a>
							<a href="<?= base_url('event/delete/') . $data['event_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->