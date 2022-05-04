<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Ubah Password</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/hrd/update_password" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control <?= ($validation->hasError('password_lama')) ? 'is-invalid' : ''; ?>" id="password_lama" name="password_lama" value="<?= (old('password_lama')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password_lama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control <?= ($validation->hasError('password_baru')) ? 'is-invalid' : ''; ?>" id="password_baru" name="password_baru" value="<?= (old('password_baru')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password_baru'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="konfirm_password" class="col-sm-3 col-form-label">Konfirm Password Baru</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control <?= ($validation->hasError('konfirm_password')) ? 'is-invalid' : ''; ?>" id="konfirm_password" name="konfirm_password" value="<?= (old('konfirm_password')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('konfirm_password'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" name="edit" class="btn btn-primary">Ubah Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>