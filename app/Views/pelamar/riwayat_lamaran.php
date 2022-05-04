<?= $this->extend('pelamar/templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Form -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="contact-title">Riwayat Lamaran</h2>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="lamaran" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="max-width:25px;">No</th>
                            <th>Divisi</th>
                            <th>Tanggal Lamaran</th>
                            <th>Status</th>
                            <th>Jadwal Interview</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($lamaran as $l) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $l['nama_divisi']; ?></td>
                                <td><?= $l['tgl_lamaran']; ?></td>
                                <td><?= $l['status_lamaran']; ?></td>
                                <td><?= $l['jadwal_interview']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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