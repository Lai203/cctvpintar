<script type="text/javascript" src="<?= base_url('asset/') ?>vendor/ckeditor/ckeditor.js"></script>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('message'); ?>

<a href="<?= base_url('/admin/profil') ?>" class="btn btn-primary mb-3">Back</a>
<form method="post">
    <div class=" mb-3">
        <label for="profil" class="form-label">Profil Perusahaan</label>
        <textarea class="form-control ckeditor" id="profil" name="profil" rows="6" placeholder="Your main contents"><?= set_value('profil', $profil['profil']); ?></textarea>
        <script type="text/javascript">
            CKEDITOR.replace('profil');
        </script>
    </div>

    <div class=" mb-3">
        <label for="sejarah" class="form-label">Sejarah Perusahaan</label>
        <textarea class="form-control ckeditor" id="sejarah" name="sejarah" rows="6" placeholder="Your main contents"><?= set_value('sejarah', $profil['sejarah']); ?></textarea>
        <script type="text/javascript">
            CKEDITOR.replace('sejarah');
        </script>
    </div>

    <div class=" mb-3">
        <label for="visi" class="form-label">Visi</label>
        <textarea class="form-control ckeditor" id="visi" name="visi" rows="6" placeholder="Your main contents"><?= set_value('visi', $profil['visi']); ?></textarea>
        <script type="text/javascript">
            CKEDITOR.replace('visi');
        </script>
    </div>

    <div class=" mb-3">
        <label for="misi" class="form-label">Misi</label>
        <textarea class="form-control ckeditor" id="misi" name="misi" rows="6" placeholder="Your main contents"><?= set_value('misi', $profil['misi']); ?></textarea>
        <script type="text/javascript">
            CKEDITOR.replace('misi');
        </script>
    </div>

    <div class=" mb-3">
        <label for="pencapaian" class="form-label">Pencapaian</label>
        <textarea class="form-control ckeditor" id="pencapaian" name="pencapaian" rows="6" placeholder="Your main contents"><?= set_value('pencapaian', $profil['pencapaian']); ?></textarea>
        <script type="text/javascript">
            CKEDITOR.replace('pencapaian');
        </script>
    </div>

    <div class="input-footer">
        <button type="submit" class='btn btn-primary'>Update</button>
        <a class="btn btn-secondary" href='<?= base_url('admin/profil') ?>'>Close</a>
    </div>
</form>