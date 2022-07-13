<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-6 col-md-4 mb-4">
            <a class="nav-link" href="<?= base_url('hrd/kategori'); ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Kategori Pekerjaan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahKategori; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-6 col-md-4 mb-4">
            <a class="nav-link" href="<?= base_url('hrd/lowongan'); ?>">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Lowongan Pekerjaan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahLowongan; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list-ul fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-6 col-md-4 mb-4">
            <a class="nav-link" href="<?= base_url('hrd/lamaran'); ?>">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lamaran Pekerjaan
                                </div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlahLamaran; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>