<?= $this->extend('templates/index');; ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Lowongan Pekerjaan</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/lowongan/save" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori Pekerjaan</label>
                    <div class="col-sm-10">
                        <select class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori">
                            <option value="">Pilih Kategori Pekerjaan</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?php echo $k['id_kategori']; ?>" <?= old('kategori') == $k['id_kategori'] ? 'selected' : null ?>>
                                    <?php echo $k['kategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kategori'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="divisi" class="col-sm-2 col-form-label">Divisi Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('divisi')) ? 'is-invalid' : ''; ?>" id="divisi" name="divisi" value="<?= old('divisi'); ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('divisi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Pekerjaan</label>
                    <div class="col-sm-10">
                        <textarea rows="5" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>"></textarea>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="persyaratan" class="col-sm-2 col-form-label">Persyaratan</label>
                    <div class="col-sm-10">
                        <textarea rows="5" class="form-control <?= ($validation->hasError('persyaratan')) ? 'is-invalid' : ''; ?>" id="persyaratan" name="persyaratan" value="<?= old('persyaratan'); ?>"></textarea>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('persyaratan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="skills" class="col-sm-2 col-form-label">Skills</label>
                    <div class="col-sm-10">
                        <textarea rows="5" class="form-control <?= ($validation->hasError('skills')) ? 'is-invalid' : ''; ?>" id="skills" name="skills" value="<?= old('skills'); ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('skills'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="total_posisi" class="col-sm-2 col-form-label">Total Posisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('total_posisi')) ? 'is-invalid' : ''; ?>" id="total_posisi" name="total_posisi" value="<?= old('total_posisi'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('total_posisi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deadline" class="col-sm-2 col-form-label">Deadline</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('deadline')) ? 'is-invalid' : ''; ?>" id="deadline" name="deadline" value="<?= old('deadline'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('deadline'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
            <script>
                CKEDITOR.replace('deskripsi');
                CKEDITOR.replace('persyaratan');
                CKEDITOR.replace('skills');
            </script>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>