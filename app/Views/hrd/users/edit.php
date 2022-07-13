<?= $this->extend('templates/index');; ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Users</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/users/update/<?= $users['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $users['id']; ?>">
                <div class="form-group row">
                    <label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" value="<?= (old('fullname')) ? old('fullname') : $users['fullname'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('fullname'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= (old('no_hp')) ? old('no_hp') : $users['no_hp'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_hp'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $users['email'] ?>" readonly>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select class="form-control w-100 <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" id="role" name="role" value="<?= old('role'); ?>">
                            <option value="">Pilih</option>
                            <option value="admin" <?= $users['role'] == 'admin' ? 'selected' : '';  ?>>Admin</option>
                            <option value="hrd" <?= $users['role'] == 'hrd' ? 'selected' : '';  ?>>HRD</option>
                            <option value="pelamar" <?= $users['role'] == 'pelamar' ? 'selected' : '';  ?>>Pelamar</option>
                            </option>
                        </select>
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('role'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>