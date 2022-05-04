<?= $this->extend('pelamar/templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Form -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="contact-title">Ubah Password</h2>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="col-12">
            <form class="form-contact contact_form" action="/pelamar/update_password" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control <?= ($validation->hasError('password_lama')) ? 'is-invalid' : ''; ?>" name="password_lama" id="password_lama" value="<?= (old('password_lama')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password_lama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control <?= ($validation->hasError('password_baru')) ? 'is-invalid' : ''; ?>" name="password_baru" id="password_baru" value="<?= (old('password_baru')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password_baru'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="konfirm_password" class="col-sm-3 col-form-label">Konfirm Password Baru</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control <?= ($validation->hasError('konfirm_password')) ? 'is-invalid' : ''; ?>" name="konfirm_password" id="konfirm_password" value="<?= (old('konfirm_password')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('konfirm_password'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <button type="submit" name="edit" class="button button-contactForm boxed-btn">Ubah Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>