<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('/admin/profil') ?>" class="btn btn-primary mb-3">Back</a>
    <form method="post" enctype="multipart/form-data">
        <div class=" mb-3">
            <label for="nama" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Perusahaan" value="<?= set_value('nama', $rekan['nama']); ?>">
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo Perusahaan</label>
            <input type="file" class="form-control" id="logo" name="logo">
        </div>
        <div class=" input-footer">
            <button type="submit" class='btn btn-primary'>Update</button>
            <a class="btn btn-secondary" href='<?= base_url('admin/profil') ?>'>Close</a>
        </div>
    </form>

</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->