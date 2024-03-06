<!-- Begin Page Content -->

<script type="text/javascript" src="<?= base_url('asset/') ?>vendor/ckeditor/ckeditor.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('/admin/about') ?>" class="btn btn-primary mb-3">Back</a>
    <form method="post">
        <div class=" mb-3">
            <label for="about_description" class="form-label">Profil Perusahaan</label>
            <textarea class="form-control ckeditor" id="about_description" name="about_description" rows="6" placeholder="Your main contents"><?= set_value('about_description', $about['about_description']); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('about_description');
            </script>
        </div>

        <div class=" mb-3">
            <label for="about_history" class="form-label">Sejarah Perusahaan</label>
            <textarea class="form-control ckeditor" id="about_history" name="about_history" rows="6" placeholder="Your main contents"><?= set_value('about_history', $about['about_history']); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('about_history');
            </script>
        </div>

        <div class=" mb-3">
            <label for="about_vision" class="form-label">Visi</label>
            <textarea class="form-control ckeditor" id="about_vision" name="about_vision" rows="6" placeholder="Your main contents"><?= set_value('about_vision', $about['about_vision']); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('about_vision');
            </script>
        </div>

        <div class=" mb-3">
            <label for="about_mission" class="form-label">Misi</label>
            <textarea class="form-control ckeditor" id="about_mission" name="about_mission" rows="6" placeholder="Your main contents"><?= set_value('about_mission', $about['about_mission']); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('about_mission');
            </script>
        </div>

        <div class=" mb-3">
            <label for="about_achievement" class="form-label">Pencapaian</label>
            <textarea class="form-control ckeditor" id="about_achievement" name="about_achievement" rows="6" placeholder="Your main contents"><?= set_value('about_achievement', $about['about_achievement']); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('about_achievement');
            </script>
        </div>

        <div class="input-footer">
            <button type="submit" class='btn btn-primary'>Update</button>
            <a class="btn btn-secondary" href='<?= base_url('admin/about') ?>'>Close</a>
        </div>
    </form>

</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->