<!-- Begin Page Content -->

<script type="text/javascript" src="<?= base_url('asset/') ?>vendor/ckeditor/ckeditor.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('/admin/product') ?>" class="btn btn-primary mb-3">Back</a>
    <form method="post">
        <div class=" mb-3">
            <label for="product_name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Your title here">
        </div>
        <div class="mb-3">
            <label for="product_description" class="form-label">Deskripsi</label>
            <textarea class="form-control ckeditor" id="product_description" name="product_description" rows="6" placeholder="Your main contents"></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('product_description');
            </script>
        </div>
        <div class="mb-3">
            <label for="product_specification" class="form-label">Spesifikasi</label>
            <textarea class="form-control ckeditor" id="product_specification" name="product_specification" rows="6" placeholder="Your main contents"></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('product_specification');
            </script>
        </div>
        <div class="mb-3">
            <label for="product_price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Your title here">
        </div>
        <div class="mb-3">
            <label for="product_image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="product_image" name="product_image" placeholder="Your image">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">Pilih Kategori</option>
                <?php foreach ($category as $c) : ?>
                    <option value="<?= $c['category_id'] ?>"><?= $c['category_title'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-footer">
            <button type="submit" class='btn btn-primary'>Add</button>
            <a class="btn btn-secondary" href='<?= base_url('admin/product') ?>'>Close</a>
        </div>
    </form>

</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->