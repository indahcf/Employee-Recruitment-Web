<?= $this->extend('pengguna/templates/index'); ?>

<?= $this->section('page-content'); ?>
<style>
    /* Media query untuk background slider */
    @media only screen and (max-width: 600px) {
        .single-slider {
            background-image: url('<?= base_url() ?>/img/hero/h1_hero_iphone1415ProMax.jpg');
            /* Gambar latar belakang untuk layar <= 600px */
            background-size: cover;
            background-position: top center;
            background-repeat: no-repeat;
            /* height: 300px; */
            /* Tinggi slider untuk layar <= 600px */
        }
    }

    @media only screen and (min-width: 601px) and (max-width: 991px) {
        .single-slider {
            background-image: url('<?= base_url() ?>/img/hero/h1_hero_surfacePro8.jpg');
            /* Gambar latar belakang untuk layar 601px - 991px */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 400px;
            /* Tinggi slider untuk layar 601px - 991px */
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .single-slider {
            background-image: url('<?= base_url() ?>/img/hero/h1_hero_surface.jpg');
            /* Gambar latar belakang untuk layar Surface Pro 8 */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 500px;
            /* Tinggi slider untuk layar Surface Pro 8 */
        }
    }

    @media only screen and (min-width: 1200px) {
        .single-slider {
            background-image: url('<?= base_url() ?>/img/hero/h1_hero.jpg');
            /* Gambar latar belakang untuk layar desktop */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 600px;
            /* Tinggi slider untuk layar desktop */
        }
    }

    /* Media query untuk background apply process area */
    @media only screen and (max-width: 991px) {
        .apply-process-area {
            background-image: url('<?= base_url() ?>/img/gallery/how-applybg.png');
            /* Gambar latar belakang untuk area apply process di layar <= 991px */
            background-size: cover;
            background-position: center;
            /* Tinggi area apply process untuk layar <= 991px */
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .apply-process-area {
            background-image: url('<?= base_url() ?>/img/gallery/how-applybg.png');
            /* Gambar latar belakang untuk area apply process di layar tablet */
            background-size: cover;
            background-position: center;
            /* Tinggi area apply process untuk layar tablet */
        }
    }

    @media only screen and (min-width: 1200px) {
        .apply-process-area {
            background-image: url('<?= base_url() ?>/img/gallery/how-applybg.png');
            /* Gambar latar belakang untuk area apply process di layar desktop */
            background-size: cover;
            background-position: center;
            /* Tinggi area apply process untuk layar desktop */
        }
    }
</style>

<div class="slider-area">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center">
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

<!-- How Apply Process Start-->
<div class="apply-process-area apply-bg pt-150 pb-150">
    <div class="container">
        <!-- Section Title -->
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
<!-- How Apply Process End-->
<?= $this->endSection(); ?>