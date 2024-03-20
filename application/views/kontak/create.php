<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('/admin/kontak') ?>" class="btn btn-primary mb-3">Back</a>
<div class="form-group">
    <form method="post">
        <div class=" mb-3">
            <label for="informasi_kontak" class="form-label">Informasi Kontak</label>
            <input type="text" id="informasi_kontak" name="informasi_kontak" class="form-control">
        </div>
        <div class="mb-3">
            <label for="id_jenis_kontak" class="form-label">Jenis Kontak</label>
            <select name="id_jenis_kontak" id="id_jenis_kontak">
                <option value="">Pilih Jenis Kontak</option>
                <?php foreach ($jenis_kontak as $j) : ?>
                    <option value="<?= $j['id_jenis_kontak'] ?>"><?= $j['nama_kontak'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-footer">
            <button type="submit" class='btn btn-primary'>Add</button>
            <a class="btn btn-secondary" href='<?= base_url('admin/kontak') ?>'>Close</a>
        </div>
    </form>
</div>