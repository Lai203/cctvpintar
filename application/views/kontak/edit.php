<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="form-group">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_jenis_kontak" class="form-label">Jenis Kontak</label>
                <select name="id_jenis_kontak" id="id_jenis_kontak">
                    <option value="">Pilih Jenis Kontak</option>
                    <?php foreach ($jenis_kontak as $j) : ?>
                        <option value="<?= $j['id_jenis_kontak'] ?>" <?= ($j['id_jenis_kontak'] === $kontak['id_jenis_kontak']) ? 'selected' : ''; ?>><?= $j['nama_kontak'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="informasi_kontak" class="form-label">Jenis Kontak</label>
                <input type="text" id="informasi_kontak" name="informasi_kontak" class="form-control" value="<?= set_value('tanggal_update_berita', $kontak['informasi_kontak']); ?>">
            </div>

            <div class="input-footer">
                <button type="submit" class='btn btn-primary'>Update</button>
                <a class="btn btn-secondary" href='<?= base_url('admin/kontak') ?>'>Close</a>
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->