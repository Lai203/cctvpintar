<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('/admin/event') ?>" class="btn btn-primary mb-3">Back</a>
    <form method="post" enctype="multipart/form-data">
        <div class=" mb-3">
            <label for="nama_event" class="form-label">Judul Event</label>
            <input type="text" class="form-control" id="nama_event" name="nama_event" placeholder="Masukkan Nama Event" value="<?= set_value('nama_event', $events['nama_event']); ?>">
        </div>
        <div class="mb-3">
            <label for="deskripsi_event" class="form-label">Deskripsi Event</label>
            <input type="text" class="form-control" id="deskripsi_event" name="deskripsi_event" placeholder="Masukkan Deskripsi Event" value="<?= set_value('deskripsi_event', $events['deskripsi_event']); ?>">
        </div>
        <div class="mb-3">
            <label for="tanggal_event" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal_event" name="tanggal_event" value="<?= set_value('tanggal_event', $events['tanggal_event']); ?>">
        </div>
        <div class="mb-3">
            <label for="waktu_event" class="form-label">Waktu</label>
            <input type="time" class="form-control" id="waktu_event" name="waktu_event" value="<?= set_value('waktu_event', $events['waktu_event']); ?>">
        </div>
        <div class="mb-3">
            <label for="lokasi_event" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi_event" name="lokasi_event" placeholder="Masukkan Lokasi Event" value="<?= set_value('lokasi_event', $events['lokasi_event']); ?>">
        </div>
        <div class="mb-3">
            <label for="thumbnail_event" class="form-label">Thumbnail</label>
            <input type="file" class="form-control" id="thumbnail_event" name="thumbnail_event">
        </div>
        <div class="mb-3">
            <label for="kontak_event" class="form-label">Kontak</label>
            <input type="tel" class="form-control" id="kontak_event" name="kontak_event" placeholder="Masukkan Kontak Event" value="<?= set_value('kontak_event', $events['kontak_event']); ?>">
        </div>
        <div class="mb-3">
            <label for="status_event" class="form-label">Status</label>
            <select class="form-control" name="status_event" id="status_event">
                <option value="">Pilih Status</option>
                <option value="Upcoming" <?= ($events['status_event'] === 'Upcoming') ? 'selected' : ''; ?>>Upcoming</option>
                <option value="Ongoing" <?= ($events['status_event'] === 'Ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                <option value="Completed" <?= ($events['status_event'] === 'Ongoing') ? 'selected' : ''; ?>>Completed</option>
            </select>
        </div>
        <div class="input-footer">
            <button type="submit" class='btn btn-primary'>Update</button>
            <a class="btn btn-secondary" href='<?= base_url('admin/event') ?>'>Close</a>
        </div>
    </form>
    <?= validation_errors() ?>
</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->