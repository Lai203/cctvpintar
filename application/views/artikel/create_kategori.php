<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="form-group">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_kategori_artikel" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control" id="nama_kategori_artikel" name="nama_kategori_artikel" placeholder="Masukan Kategori Artikel">
            </div>
            <div class="mb-3">
                <label for="deskripsi_kategori_artikel" class="form-label">Deskripsi Artikel</label>
                <input type="text" class="form-control" id="deskripsi_kategori_artikel" name="deskripsi_kategori_artikel" placeholder="Masukan Deskripsi Kategori Artikel">
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