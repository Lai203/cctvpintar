<!-- Begin Page Content -->
<div class="container-fluid">
	<form method="post">
		<table id="dataTable" class="table mt-4 table-striped">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Contact 1</th>
					<th scope="col">Contact 2</th>
					<th scope="col">Contact 3</th>
					<th scope="col">Contact 4</th>
					<th scope="col">Whatsapp</th>
					<th scope="col">Facebook</th>
					<th scope="col">Instagram</th>
					<th scope="col">Twitter</th>
					<th scope="col">Email</th>
					<th scope="col">Website</th>
					<th scope="col">Address</th>
					<th scope="col">Linkedin</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">
				<?php
				$i = 1;
				foreach ($contacts as $data) : ?>

					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['contact_number1']; ?></td>
						<td><?= $data['contact_number2']; ?></td>
						<td><?= $data['contact_number3']; ?></td>
						<td><?= $data['contact_number4']; ?></td>
						<td><?= $data['contact_whatsapp']; ?></td>
						<td><?= $data['contact_facebook']; ?></td>
						<td><?= $data['contact_instagram']; ?></td>
						<td><?= $data['contact_twitter']; ?></td>
						<td><?= $data['contact_email']; ?></td>
						<td><?= $data['contact_website']; ?></td>
						<td><?= $data['contact_address']; ?></td>
						<td><?= $data['contact_linkedin']; ?></td>
						<td>
							<a href="<?= base_url('contact/edit/') . $data['contact_id'] ?>" class="btn btn-warning">Edit</a>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->