<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="form-group">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="contact_number1" class="form-label">Contact 1</label>
                <input type="text" class="form-control" id="contact_number1" name="contact_number1" placeholder="Your title here" value="<?= set_value('contact_number1', $contacts['contact_number1']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_number2" class="form-label">Contact 2</label>
                <input type="text" class="form-control" id="contact_number2" name="contact_number2" placeholder="Your title here" value="<?= set_value('contact_number2', $contacts['contact_number2']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_number3" class="form-label">Contact 3</label>
                <input type="text" class="form-control" id="contact_number3" name="contact_number3" placeholder="Your title here" value="<?= set_value('contact_number3', $contacts['contact_number3']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_number4" class="form-label">Contact 4</label>
                <input type="text" class="form-control" id="contact_number4" name="contact_number4" placeholder="Your title here" value="<?= set_value('contact_number4', $contacts['contact_number4']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_whatsapp" class="form-label">Contact Whatsapp</label>
                <input type="text" class="form-control" id="contact_whatsapp" name="contact_whatsapp" placeholder="Your title here" value="<?= set_value('contact_whatsapp', $contacts['contact_whatsapp']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_facebook" class="form-label">Contact Facebook</label>
                <input type="text" class="form-control" id="contact_facebook" name="contact_facebook" placeholder="Your title here" value="<?= set_value('contact_facebook', $contacts['contact_facebook']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_instagram" class="form-label">Contact Instagram</label>
                <input type="text" class="form-control" id="contact_instagram" name="contact_instagram" placeholder="Your title here" value="<?= set_value('contact_instagram', $contacts['contact_instagram']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_twitter" class="form-label">Contact Twitter</label>
                <input type="text" class="form-control" id="contact_twitter" name="contact_twitter" placeholder="Your title here" value="<?= set_value('contact_twitter', $contacts['contact_twitter']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_email" class="form-label">Contact Email</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Your title here" value="<?= set_value('contact_email', $contacts['contact_email']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_website" class="form-label">Contact Website</label>
                <input type="text" class="form-control" id="contact_website" name="contact_website" placeholder="Your title here" value="<?= set_value('contact_website', $contacts['contact_website']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_address" class="form-label">Contact Address</label>
                <input type="text" class="form-control" id="contact_address" name="contact_address" placeholder="Your title here" value="<?= set_value('contact_address', $contacts['contact_address']); ?>">
            </div>
            <div class="mb-3">
                <label for="contact_linkedin" class="form-label">Contact Linkedin</label>
                <input type="text" class="form-control" id="contact_linkedin" name="contact_linkedin" placeholder="Your title here" value="<?= set_value('contact_linkedin', $contacts['contact_linkedin']); ?>">
            </div>
            <div class="input-footer">
                <button type="submit" class='btn btn-primary'>Update</button>
                <a class="btn btn-secondary" href='<?= base_url('admin/contact') ?>'>Close</a>
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->