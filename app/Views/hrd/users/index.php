<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Users</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="/admin/users/create" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="kategori" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="max-width:25px;">No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($users as $u) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $u['fullname']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td><?= $u['no_hp']; ?></td>
                                <td><?= $u['role']; ?></td>
                                <td>
                                    <a href="/admin/users/ubah_password/<?= $u['id']; ?>" class="btn btn-primary"><i class="fas fa-key"></i></a>
                                    <a href="/admin/users/edit/<?= $u['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="/admin/users/<?= $u['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


                <script>
                    $(document).ready(function() {
                        $('#kategori').DataTable();
                    });
                </script>

            </div>
        </div>
    </div>


</div>
<?= $this->endSection(); ?>