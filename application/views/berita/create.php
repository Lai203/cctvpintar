<script type="text/javascript" src="<?= base_url('asset/') ?>vendor/ckeditor/ckeditor.js"></script>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('message'); ?>

<a href="<?= base_url('/admin/berita') ?>" class="btn btn-primary mb-3">Back</a>
<form method="post" enctype="multipart/form-data">
    <div class=" mb-3">
        <label for="judul_berita" class="form-label">Judul Berita</label>
        <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Masukkan Judul Berita">
    </div>
    <div class="mb-3">
        <label for="deskripsi_berita" class="form-label">Deskripsi Berita</label>
        <input type="text" class="form-control" id="deskripsi_berita" name="deskripsi_berita" placeholder="Masukkan Deskripsi Berita">
    </div>
    <div class="mb-3">
        <label for="tanggal_dibuat_berita" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="tanggal_dibuat_berita" name="tanggal_dibuat_berita">
    </div>
    <div class="mb-3">
        <label for="isi_berita" class="form-label">Konten Berita</label>
        <textarea class="form-control ckeditor" id="isi_berita" name="isi_berita" rows="6" placeholder="Masukkan Isi Berita"></textarea>
        <script type="text/javascript">
            CKEDITOR.replace('isi_berita');
        </script>
    </div>
    <div class="mb-3">
        <label for="thumbnail_berita" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="thumbnail_berita" name="thumbnail_berita">
    </div>
    <div class="mb-3">
        <label for="jenis_berita" class="form-label">Jenis Berita</label>
        <select class="form-control" name="jenis_berita" id="jenis_berita">
            <option value="">Pilih Kategori</option>
            <option value="Produk">Produk</option>
            <option value="Perusahaan">Perusahaan</option>
        </select>
    </div>
    <div class="input-footer">
        <button type="submit" class='btn btn-primary'>Add</button>
        <a class="btn btn-secondary" href='<?= base_url('admin/berita') ?>'>Close</a>
    </div>
</form>