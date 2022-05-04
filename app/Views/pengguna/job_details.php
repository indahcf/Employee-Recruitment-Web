<?= $this->extend('pengguna/templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- job post company Start -->
<div class="job-post-company pt-50 pb-50">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <!-- Left Content -->
            <!-- job single -->
            <div class="single-job-items col-xl-7 col-lg-8 mb-20">
                <div class="job-items">
                    <div class="job-tittle">
                        <a href="#">
                            <h4><?= $lowongan['nama_divisi']; ?></h4>
                        </a>
                        <ul>
                            <li>
                                <label class="label">Kategori</label>
                                <span class="detail-desc text-dark"><?= $lowongan['kategori']; ?></span>
                            </li>
                            <li>
                                <label class="label">Total Posisi</label>
                                <span class="detail-desc text-dark"><?= $lowongan['total_posisi']; ?></span>
                            </li>
                            <li>
                                <label class="label">Deadline</label>
                                <span class="detail-desc text-dark"><?= date('d F Y', strtotime($lowongan['deadline'])); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- job single End -->
            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4 text-right">
                <div class="apply-btn2">
                    <a href="<?= route_to('login') ?>" class="btn">Daftar Sekarang</a>
                </div>
            </div>
        </div>
        <div class="px-3">
            <div class="post-details1 mb-50">
                <!-- Small Section Tittle -->
                <div class="small-section-tittle">
                    <h4>Deskripsi Pekerjaan</h4>
                </div>
                <p><?= $lowongan['deskripsi']; ?></p>
            </div>
            <div class="post-details2  mb-50">
                <!-- Small Section Tittle -->
                <div class="small-section-tittle">
                    <h4>Persyaratan</h4>
                </div>
                <div>
                    <?= $lowongan['persyaratan']; ?>
                </div>
            </div>
            <div class="post-details2  mb-50">
                <!-- Small Section Tittle -->
                <div class="small-section-tittle">
                    <h4>Skill yang Dibutuhkan</h4>
                </div>
                <div>
                    <?= $lowongan['skills']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job post company End -->
<?= $this->endSection(); ?>