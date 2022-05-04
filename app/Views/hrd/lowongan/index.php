<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Lowongan Pekerjaan</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="/hrd/lowongan/create" class="btn btn-primary btn-icon-split">
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
                            <th style="max-width:20px;">No</th>
                            <th>Divisi</th>
                            <th>Deadline</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($lowongan as $l) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $l['nama_divisi']; ?></td>
                                <td><?= date('d/m/Y', strtotime($l['deadline'])); ?></td>
                                <td>
                                    <a href="/hrd/lowongan/edit/<?= $l['id_lowongan']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="/hrd/lowongan/<?= $l['id_lowongan']; ?>" method="post" class="d-inline">
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