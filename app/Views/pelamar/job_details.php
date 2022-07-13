<?= $this->extend('pelamar/templates/index'); ?>

<?= $this->section('page-content'); ?>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
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
                                <span class="detail-desc text-dark"><?= tgl_indo(date('Y-m-d', strtotime($lowongan['deadline']))); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- job single End -->
            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4 text-right">
                <div class="apply-btn2">
                    <a href="/pelamar/pilih_lowongan/<?= $lowongan['id_lowongan']; ?>" class="btn">Daftar Sekarang</a>
                </div>
            </div>
        </div>
        <div class="px-3">
            <div class="post-details2 mb-50">
                <!-- Small Section Tittle -->
                <div class="small-section-tittle">
                    <h4>Deskripsi Pekerjaan</h4>
                </div>
                <div>
                    <?= $lowongan['deskripsi']; ?>
                </div>
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