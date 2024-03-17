<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<?= $this->session->flashdata('message'); ?>

	<div class="form-group">
		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="judul_artikel" class="form-label">Judul Artikel</label>
				<input type="text" class="form-control" id="judul_artikel" name="judul_artikel" placeholder="Masukan Judul Artikel" value="<?= set_value('judul_artikel', $artikel['judul_artikel']); ?>">
			</div>
			<div class="mb-3">
				<label for="deskripsi_artikel" class="form-label">Deskripsi Artikel</label>
				<input type="text" class="form-control" id="deskripsi_artikel" name="deskripsi_artikel" placeholder="Masukan Deskripsi Artikel" value="<?= set_value('deskripsi_artikel', $artikel['deskripsi_artikel']); ?>">
			</div>
			<div class="mb-3">
				<label for="keyword_artikel" class="form-label">Keyword</label>
				<input type="text" class="form-control" id="keyword_artikel" name="keyword_artikel" placeholder="Masukan Keyword" value="<?= set_value('keyword_artikel', $artikel['keyword_artikel']); ?>">
			</div>
			<div class="mb-3">
				<label for="tanggal_update_artikel" class="form-label">Tanggal</label>
				<input type="date" class="form-control" id="tanggal_update_artikel" name="tanggal_update_artikel" value="<?= set_value('tanggal_update_artikel', $artikel['tanggal_update_artikel']); ?>">
			</div>
			<div class="mb-3">
				<label for="status_artikel" class="form-label">Status</label>
				<select class="form-control" name="status_artikel" id="status_artikel">
					<option value="Publish" <?= ($artikel['status_artikel'] === 'Publish') ? 'selected' : ''; ?>>Publish</option>
					<option value="Review" <?= ($artikel['status_artikel'] === 'Review') ? 'selected' : ''; ?>>Review</option>
					<option value="Pending" <?= ($artikel['status_artikel'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="isi_artikel" class="form-label">Konten Artikel</label>
				<textarea class="form-control texteditor" id="isi_artikel" name="isi_artikel" rows="6" placeholder="Konten Artikel"><?= set_value('isi_artikel', $artikel['isi_artikel']); ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace('isi_artikel');
				</script>
			</div>
			<div class="mb-3">
				<label for="thumbnail_artikel" class="form-label">Gambar</label>
				<input type="file" class="form-control" id="thumbnail_artikel" name="thumbnail_artikel">
				<?php if (!empty($artikel['thumbnail_artikel'])) : ?>
					<small>File Saat Ini: <?= $artikel['thumbnail_artikel']; ?></small>
				<?php endif; ?>
			</div>
			<div class="mb-3">
				<label for="id_kategori_artikel" class="form-label">Kategori</label>
				<select class="form-control" name="id_kategori_artikel" id="id_kategori_artikel">
					<option value="">Pilih Kategori</option>
					<?php foreach ($kategori_artikel as $k) : ?>
						<option value="<?= $k['id_kategori_artikel'] ?>" <?= ($k['id_kategori_artikel'] === $artikel['id_kategori_artikel']) ? 'selected' : ''; ?>><?= $k['nama_kategori_artikel'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="mb-3">
				<label for="tags_artikel" class="form-label">Tags</label>
				<input type="text" class="form-control" id="tags_artikel" name="tags_artikel" placeholder="Masukan Tags" value="<?= set_value('tags_artikel', $artikel['tags_artikel']) ?>">
			</div>
			<div class="input-footer">
				<button type="submit" class='btn btn-primary'>Update</button>
				<a class="btn btn-secondary" href='<?= base_url('admin/artikel') ?>'>Close</a>
			</div>
		</form>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->