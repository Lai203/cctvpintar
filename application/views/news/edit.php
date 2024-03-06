<!-- Begin Page Content -->

<script type="text/javascript" src="<?= base_url('asset/') ?>vendor/ckeditor/ckeditor.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('/admin/news') ?>" class="btn btn-primary mb-3">Back</a>
    <form method="post">
        <div class=" mb-3">
            <label for="news_title" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="news_title" name="news_title" placeholder="Your title here" value="<?= set_value('news_title', $news['news_title']); ?>">
        </div>
        <div class="mb-3">
            <label for="news_description" class="form-label">Deskripsi Berita</label>
            <input type="text" class="form-control" id="news_description" name="news_description" placeholder="Your title here" value="<?= set_value('news_description', $news['news_description']); ?>">
        </div>
        <div class="mb-3">
            <label for="news_date" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="news_date" name="news_date" placeholder="Your title here" value="<?= set_value('news_date', $news['news_date']); ?>">
        </div>
        <div class="mb-3">
            <label for="news_body" class="form-label">Konten Berita</label>
            <textarea class="form-control ckeditor" id="news_body" name="news_body" rows="6" placeholder="Your main contents"><?= set_value('news_body', $news['news_body']); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('blog_body');
            </script>
        </div>
        <div class="mb-3">
            <label for="news_thumbnail" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="news_thumbnail" name="news_thumbnail" placeholder="Your image" value="<?= set_value('news_thumbnail', $news['news_thumbnail']); ?>">
        </div>
        <div class="mb-3">
            <label for="news_type" class="form-label">Jenis Berita</label>
            <select class="form-control" name="news_type" id="news_type">
                <option value="">Pilih Kategori</option>
                <option value="Produk" <?= ($news['news_type'] === 'Produk') ? 'selected' : ''; ?>>Produk</option>
                <option value="Perusahaan" <?= ($news['news_type'] === 'Perusahaan') ? 'selected' : ''; ?>>Perusahaan</option>
            </select>
        </div>
        <div class="input-footer">
            <button type="submit" class='btn btn-primary'>Add</button>
            <a class="btn btn-secondary" href='<?= base_url('admin/news') ?>'>Close</a>
        </div>
    </form>

</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->