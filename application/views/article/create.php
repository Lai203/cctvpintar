<!-- Begin Page Content -->

<script type="text/javascript" src="<?= base_url('asset/') ?>vendor/ckeditor/ckeditor.js"></script>
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<?= $this->session->flashdata('message'); ?>

	<a href="<?= base_url('/admin/article') ?>" class="btn btn-primary mb-3">Back</a>
	<form method="post">
		<div class=" mb-3">
			<label for="blog_title" class="form-label">Judul Artikel</label>
			<input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Your title here">
		</div>
		<div class="mb-3">
			<label for="blog_description" class="form-label">Deskripsi Artikel</label>
			<input type="text" class="form-control" id="blog_description" name="blog_description" placeholder="Your title here">
		</div>
		<div class="mb-3">
			<label for="blog_date" class="form-label">Tanggal</label>
			<input type="date" class="form-control" id="blog_date" name="blog_date" placeholder="Your title here">
		</div>
		<div class="mb-3">
			<label for="blog_body" class="form-label">Konten Artikel</label>
			<textarea class="form-control ckeditor" id="blog_body" name="blog_body" rows="6" placeholder="Your main contents"></textarea>
			<script type="text/javascript">
				CKEDITOR.replace('blog_body');
			</script>
		</div>
		<div class="mb-3">
			<label for="blog_thumbnail" class="form-label">Gambar</label>
			<input type="file" class="form-control" id="blog_thumbnail" name="blog_thumbnail" placeholder="Your image">
		</div>
		<div class="mb-3">
			<label for="category_id" class="form-label">Kategori</label>
			<select class="form-control" name="category_id" id="category_id">
				<option value="">Pilih Kategori</option>
				<?php foreach ($category as $c) : ?>
					<option value="<?= $c['category_id'] ?>"><?= $c['category_title'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="mb-3">
			<label for="blog_tags" class="form-label">Tags</label>
			<input type="text" class="form-control" id="blog_tags" name="blog_tags" placeholder="Your title here">
		</div>
		<div class="input-footer">
			<button type="submit" class='btn btn-primary'>Add</button>
			<a class="btn btn-secondary" href='<?= base_url('admin/article') ?>'>Close</a>
		</div>
	</form>

</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->