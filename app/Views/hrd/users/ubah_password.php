<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Ubah Password Users</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/users/update_password/<?= $users['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="password_lama" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= ($validation->hasError('password_lama')) ? 'is-invalid' : ''; ?>" id="password_lama" name="password_lama" value="<?= (old('password_lama')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password_lama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_baru" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= ($validation->hasError('password_baru')) ? 'is-invalid' : ''; ?>" id="password_baru" name="password_baru" value="<?= (old('password_baru')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password_baru'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass_confirm" class="col-sm-2 col-form-label">Repeat Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= ($validation->hasError('pass_confirm')) ? 'is-invalid' : ''; ?>" id="pass_confirm" name="pass_confirm" value="<?= (old('pass_confirm')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pass_confirm'); ?>
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