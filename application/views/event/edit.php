<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('/admin/event') ?>" class="btn btn-primary mb-3">Back</a>
    <form method="post" enctype="multipart/form-data">
        <div class=" mb-3">
            <label for="event_title" class="form-label">Judul Event</label>
            <input type="text" class="form-control" id="event_title" name="event_title" placeholder="Your title here" value="<?= set_value('event_title', $events['event_title']); ?>">
        </div>
        <div class="mb-3">
            <label for="event_description" class="form-label">Deskripsi Event</label>
            <input type="text" class="form-control" id="event_description" name="event_description" placeholder="Your description here" value="<?= set_value('event_description', $events['event_description']); ?>">
        </div>
        <div class="mb-3">
            <label for="event_date" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="event_date" name="event_date" placeholder="Your date here" value="<?= set_value('event_date', $events['event_date']); ?>">
        </div>
        <div class="mb-3">
            <label for="event_time" class="form-label">Waktu</label>
            <input type="time" class="form-control" id="event_time" name="event_time" placeholder="Your date here" value="<?= set_value('event_time', $events['event_time']); ?>">
        </div>
        <div class="mb-3">
            <label for="event_location" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="event_location" name="event_location" placeholder="Event Location here" value="<?= set_value('event_location', $events['event_location']); ?>">
        </div>
        <div class="mb-3">
            <label for="event_thumbnail" class="form-label">Thumbnail</label>
            <input type="file" class="form-control" id="event_thumbnail" name="event_thumbnail" placeholder="Your image" value="<?= set_value('event_thumbnail', $events['event_thumbnail']); ?>">
        </div>
        <div class="mb-3">
            <label for="event_contact" class="form-label">Kontak</label>
            <input type="tel" class="form-control" id="event_contact" name="event_contact" placeholder="Your Contact" value="<?= set_value('event_contact', $events['event_contact']); ?>">
        </div>
        <div class="mb-3">
            <label for="event_status" class="form-label">Status</label>
            <select class="form-control" name="event_status" id="event_status">
                <option value="">Pilih Status</option>
                <option value="Upcoming" <?= ($events['event_status'] === 'Upcoming') ? 'selected' : ''; ?>>Upcoming</option>
                <option value="Ongoing" <?= ($events['event_status'] === 'Ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                <option value="Completed" <?= ($events['event_status'] === 'Ongoing') ? 'selected' : ''; ?>>Completed</option>
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