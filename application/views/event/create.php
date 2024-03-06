<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('/admin/event') ?>" class="btn btn-primary mb-3">Back</a>
    <form method="post">
        <div class=" mb-3">
            <label for="event_title" class="form-label">Judul Event</label>
            <input type="text" class="form-control" id="event_title" name="event_title" placeholder="Your title here">
        </div>
        <div class="mb-3">
            <label for="event_description" class="form-label">Deskripsi Event</label>
            <input type="text" class="form-control" id="event_description" name="event_description" placeholder="Your description here">
        </div>
        <div class="mb-3">
            <label for="event_date" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="event_date" name="event_date" placeholder="Your date here">
        </div>
        <div class="mb-3">
            <label for="event_time" class="form-label">Waktu</label>
            <input type="time" class="form-control" id="event_time" name="event_time" placeholder="Your date here">
        </div>
        <div class="mb-3">
            <label for="event_location" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="event_location" name="event_location" placeholder="Event Location here">
        </div>
        <div class="mb-3">
            <label for="event_thumbnail" class="form-label">Thumbnail</label>
            <input type="file" class="form-control" id="event_thumbnail" name="event_thumbnail" placeholder="Your image">
        </div>
        <div class="mb-3">
            <label for="event_contact" class="form-label">Kontak</label>
            <input type="tel" class="form-control" id="event_contact" name="event_contact" placeholder="Your Contact">
        </div>
        <div class="mb-3">
            <label for="event_status" class="form-label">Status</label>
            <select class="form-control" name="event_status" id="event_status">
                <option value="">Pilih Status</option>
                <option value="Upcoming">Upcoming</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        <div class="input-footer">
            <button type="submit" class='btn btn-primary'>Add</button>
            <a class="btn btn-secondary" href='<?= base_url('admin/event') ?>'>Close</a>
        </div>
    </form>

</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->