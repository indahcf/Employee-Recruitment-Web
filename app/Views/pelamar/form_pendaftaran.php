<?= $this->extend('pelamar/templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Form -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="contact-title">Form Pendaftaran <?= $divisi; ?></h2>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="col-12">
            <form class="form-contact contact_form" action="/pelamar/create" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_lengkap" class="col-form-label">Nama Lengkap</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" name="nama_lengkap" id="nama_lengkap" value="<?= (old('nama_lengkap')) ? old('nama_lengkap') : $user->fullname ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_lengkap'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pendidikan_terakhir" class="col-form-label d-block">Pendidikan Terakhir</label>
                        <select class="form-control w-100 <?= ($validation->hasError('pendidikan_terakhir')) ? 'is-invalid' : ''; ?>" id="pendidikan_terakhir" name="pendidikan_terakhir" value="<?= old('pendidikan_terakhir'); ?>">
                            <option value="">Pilih</option>
                            <option value="D3" <?= $user->pendidikan_terakhir == 'D3' ? 'selected' : '';  ?>>D3</option>
                            <option value="D4" <?= $user->pendidikan_terakhir == 'D4' ? 'selected' : '';  ?>>D4</option>
                            <option value="S1" <?= $user->pendidikan_terakhir == 'S1' ? 'selected' : '';  ?>>S1</option>
                            </option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('pendidikan_terakhir'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jk" class="col-form-label d-block">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?>" type="radio" name="jk" id="jk1" value="laki-laki">
                            <label class="form-check-label" for="jk1">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?>" type="radio" name="jk" id="jk2" value="perempuan">
                            <label class="form-check-label" for="jk2">Perempuan</label>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jk'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama_univ" class="col-form-label">Nama Universitas</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_univ')) ? 'is-invalid' : ''; ?>" name="nama_univ" id="nama_univ" value="<?= old('nama_univ'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_univ'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
                        <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" name="tempat_lahir" id="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tempat_lahir'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jurusan" class="col-form-label">Jurusan</label>
                        <input type="text" class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : ''; ?>" name="jurusan" id="jurusan" value="<?= old('jurusan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jurusan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" name="tanggal_lahir" id="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal_lahir'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tahun_lulus" class="col-form-label">Tahun Kelulusan</label>
                        <input type="text" class="form-control <?= ($validation->hasError('tahun_lulus')) ? 'is-invalid' : ''; ?>" name="tahun_lulus" id="tahun_lulus" value="<?= old('tahun_lulus'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tahun_lulus'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="alamat" class="col-form-label">Alamat</label>
                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat" value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ipk" class="col-form-label">IPK</label>
                        <input type="text" class="form-control <?= ($validation->hasError('ipk')) ? 'is-invalid' : ''; ?>" name="ipk" id="ipk" value="<?= old('ipk'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ipk'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= (old('email')) ? old('email') : $user->email ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="resume" class="col-form-label">Resume</label>
                        <input type="file" class="form-control-file <?= ($validation->hasError('resume')) ? 'is-invalid' : ''; ?>" name="resume" id="resume" value="<?= old('resume'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('resume'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="no_telepon" class="col-form-label">No Telepon</label>
                        <input type="text" class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" name="no_telepon" id="no_telepon" value="<?= (old('no_telepon')) ? old('no_telepon') : $user->no_hp ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_telepon'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="portofolio" class="col-form-label">Portofolio</label>
                        <input type="file" class="form-control-file <?= ($validation->hasError('portofolio')) ? 'is-invalid' : ''; ?>" name="portofolio" id="portofolio" value="<?= old('portofolio'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('portofolio'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <button type="submit" name="edit" class="button button-contactForm boxed-btn">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>