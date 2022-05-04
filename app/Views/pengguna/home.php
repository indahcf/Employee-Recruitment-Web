<?= $this->extend('pengguna/templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center" data-background="<?= base_url() ?>/img/hero/h1_hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-9 col-md-10">
                        <div class="hero__caption">
                            <h1>Temukan Pekerjaan Impian Anda di Ultranesia!</h1>
                        </div>
                    </div>
                </div>
                <div class="search-form">
                    <a href="<?= base_url('/job_listing'); ?>">Cari Pekerjaan</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!-- How  Apply Process Start-->
<div class="apply-process-area apply-bg pt-150 pb-150" data-background="<?= base_url() ?>/img/gallery/how-applybg.png">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle white-text text-center">
                    <h2>Proses Rekrutmen di Ultranesia</h2>
                </div>
            </div>
        </div>
        <!-- Apply Process Caption -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-search"></span>
                    </div>
                    <div class="process-cap">
                        <h5>1</h5>
                        <p>Daftar ke posisi pekerjaan yang diinginkan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-content"></span>
                    </div>
                    <div class="process-cap">
                        <h5>2</h5>
                        <p>HRD mereview berkas lamaran Anda, jika lolos seleksi berkas akan lanjut ke tahap wawancara.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-curriculum-vitae"></span>
                    </div>
                    <div class="process-cap">
                        <h5>3</h5>
                        <p>Wawancara dengan HRD bagi yang lolos tahap seleksi berkas.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-tour"></span>
                    </div>
                    <div class="process-cap">
                        <h5>4</h5>
                        <p>Tawaran kerja.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- How  Apply Process End-->
<?= $this->endSection(); ?>