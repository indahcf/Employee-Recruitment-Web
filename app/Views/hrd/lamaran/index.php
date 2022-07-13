<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Lamaran Pekerjaan</h1>
    <div class="mb-4">
        <?php echo $label ?>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <form action="<?php echo base_url('/lamaran/index') ?>" method="get" class="form-inline">
                <div class="form-group mr-3">
                    <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" value="<?= @$_GET['tgl_awal'] ?>">
                </div>
                <div>s/d</div>
                <div class="form-group mx-sm-3">
                    <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" value="<?= @$_GET['tgl_akhir'] ?>">
                </div>
                <button type="submit" name="filter" value="true" class="btn btn-primary mr-sm-3">Tampilkan</button>
                <?php
                if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                    echo '<a href="' . base_url('/lamaran/index') . '" class="btn btn-success">Reset</a>';
                ?>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="lamaran" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="max-width:25px;">No</th>
                            <th>ID Lamaran</th>
                            <th>Nama Pelamar</th>
                            <th>Divisi</th>
                            <th>Tanggal Lamaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($lamaran as $l) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td>RU<?= str_pad($l['id_lamaran'], 5, "0", STR_PAD_LEFT); ?></td>
                                <td><?= $l['fullname']; ?></td>
                                <td><?= $l['nama_divisi']; ?></td>
                                <td><?= date('d-m-Y', strtotime($l['tgl_lamaran'])); ?></td>
                                <td><?= $l['status_lamaran']; ?></td>
                                <td>
                                    <a href="/hrd/lamaran/detail/<?= $l['id_lamaran']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?php echo $url_cetak ?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fa fa-download"></i>
                    </span>
                    <span class="text">Cetak Laporan</span>
                </a>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#lamaran').DataTable();
                    });
                </script>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>