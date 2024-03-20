<script type="text/javascript" src="<?= base_url('asset/') ?>vendor/ckeditor/ckeditor.js"></script>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('message'); ?>

<a href="<?= base_url('/admin/product') ?>" class="btn btn-primary mb-3">Back</a>
<form method="post" enctype="multipart/form-data">
    <div class=" mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="<?= set_value('nama_produk', $produk['nama_produk']); ?>">
    </div>
    <div class="mb-3">
        <label for="deskripsi_produk" class="form-label">Deskripsi</label>
        <textarea class="form-control ckeditor" id="deskripsi_produk" name="deskripsi_produk" rows="6" placeholder="Masukkan Deskripsi Produk"><?= set_value('deskripsi_produk', $produk['deskripsi_produk']); ?></textarea>
        <script type="text/javascript">
            CKEDITOR.replace('deskripsi_produk');
        </script>
    </div>
    <div class="mb-3">
        <label for="spesifikasi_produk" class="form-label">Spesifikasi</label>
        <textarea class="form-control ckeditor" id="spesifikasi_produk" name="spesifikasi_produk" rows="6" placeholder="Masukkan Spesifikasi Produk"> <?= set_value('spesifikasi_produk', $produk['spesifikasi_produk']); ?></textarea>
        <script type="text/javascript">
            CKEDITOR.replace('spesifikasi_produk');
        </script>
    </div>
    <div class="mb-3">
        <label for="harga_produk" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga_produk" name="harga_produk" placeholder="Masukkan Harga Produk" value="<?= set_value('harga_produk', $produk['harga_produk']); ?>">
    </div>
    <div class="mb-3">
        <label for="gambar_produk" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
    </div>
    <div class="mb-3">
        <label for="id_jenis_produk" class="form-label">Kategori</label>
        <select class="form-control" name="id_jenis_produk" id="id_jenis_produk">
            <option value="">Pilih Jenis</option>
            <?php foreach ($jenis as $j) : ?>
                <option value="<?= $j['id_jenis_produk'] ?>" <?= ($j['id_jenis_produk'] === $produk['id_jenis_produk']) ? 'selected' : ''; ?>><?= $j['nama_jenis_produk'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-footer">
        <button type="submit" class='btn btn-primary'>Update</button>
        <a class="btn btn-secondary" href='<?= base_url('admin/produk') ?>'>Close</a>
    </div>
</form>