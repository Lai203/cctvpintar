<script type="text/javascript" src="<?= base_url('asset/') ?>vendor/ckeditor/ckeditor.js"></script>
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('message'); ?>

<a href="<?= base_url('/admin/artikel') ?>" class="btn btn-primary mb-3">Back</a>
<form method="post" enctype="multipart/form-data">
	<div class=" mb-3">
		<label for="judul_artikel" class="form-label">Judul Artikel</label>
		<input type="text" class="form-control" id="judul_artikel" name="judul_artikel" placeholder="Masukkan Judul Artikel">
	</div>
	<div class="mb-3">
		<label for="deskripsi_artikel" class="form-label">Deskripsi Artikel</label>
		<input type="text" class="form-control" id="deskripsi_artikel" name="deskripsi_artikel" placeholder="Masukkan Deskripsi Artikel">
	</div>
	<div class="mb-3">
		<label for="keyword_artikel" class="form-label">Keyword</label>
		<input type="text" class="form-control" id="keyword_artikel" name="keyword_artikel" placeholder="Masukkan Keyword">
	</div>
	<div class="mb-3">
		<label for="tanggal_dibuat_artikel" class="form-label">Tanggal</label>
		<input type="date" class="form-control" id="tanggal_dibuat_artikel" name="tanggal_dibuat_artikel">
	</div>
	<div class="mb-3">
		<label for="status_artikel" class="form-label">Status</label>
		<select class="form-control" name="status_artikel" id="status_artikel">
			<option value="Publish">Publish</option>
			<option value="Review">Review</option>
			<option value="Pending">Pending</option>
		</select>
	</div>
	<div class="mb-3">
		<label for="isi_artikel" class="form-label">Konten Artikel</label>
		<textarea class="form-control ckeditor" id="isi_artikel" name="isi_artikel" rows="6" placeholder="Masukkan Konten Artikel"></textarea>
		<script type="text/javascript">
			CKEDITOR.replace('konten');
		</script>
	</div>
	<div class="mb-3">
		<label for="thumbnail_artikel" class="form-label">Gambar</label>
		<input type="file" class="form-control" id="thumbnail_artikel" name="thumbnail_artikel">
	</div>
	<div class="mb-3">
		<label for="id_kategori_artikel" class="form-label">Kategori</label>
		<select class="form-control" name="id_kategori_artikel" id="id_kategori_artikel">
			<option value="">Pilih Kategori</option>
			<?php foreach ($kategori_artikel as $k) : ?>
				<option value="<?= $k['id_kategori_artikel'] ?>"><?= $k['nama_kategori_artikel'] ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="mb-3">
		<label for="tags_artikel" class="form-label">Tags</label>
		<input type="text" class="form-control" id="tags_artikel" name="tags_artikel" placeholder="Masukkan Tags">
	</div>
	<div class="input-footer">
		<button type="submit" class='btn btn-primary'>Add</button>
		<a class="btn btn-secondary" href='<?= base_url('admin/artikel') ?>'>Close</a>
	</div>
</form>