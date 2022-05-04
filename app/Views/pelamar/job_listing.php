<?= $this->extend('pelamar/templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Job List Area Start -->
<div class="job-listing-area pt-50 pb-50">
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="small-section-tittle2 mb-45">
                            <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                    <path fill-rule="evenodd" fill="rgb(27, 207, 107)" d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                </svg>
                            </div>
                            <h4>Filter Pekerjaan</h4>
                        </div>
                    </div>
                </div>
                <!-- Job Category Listing start -->
                <div class="job-category-listing mb-50">
                    <!-- single one -->
                    <div class="single-listing">
                        <!-- select-Categories start -->
                        <div class="select-Categories">
                            <div class="small-section-tittle2">
                                <h4>Kategori Pekerjaan</h4>
                            </div>
                            <?php foreach ($kategori as $k) : ?>
                                <label class="container">
                                    <?php echo $k['kategori']; ?>
                                    <input class="filter" type="checkbox" name="filter[]" value="<?= $k['id_kategori']; ?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <!-- select-Categories End -->
                    </div>
                </div>
                <!-- Job Category Listing End -->
            </div>
            <!-- Right content -->
            <div class="col-xl-9 col-lg-9 col-md-8">
                <!-- Featured_job_start -->
                <section class="featured-job-area">
                    <div class="container">
                        <!-- Count of Job list Start -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="count-job mb-35">

                                </div>
                            </div>
                        </div>
                        <!-- Count of Job list End -->
                        <!-- single-job-content -->
                        <div id="lowongan"></div>
                        <!-- single-job-content -->
                    </div>
                </section>
                <!-- Featured_job_end -->
            </div>
        </div>
    </div>
</div>
<!-- Job List Area End -->
<!--Pagination Start  -->
<div class="pagination-area pb-115 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Pagination End  -->
<script>
    $(document).ready(function() {
        let ids = [];

        fetch_data(ids)

        $('.filter').on('change', function() {
            ids = [];
            $('.filter:checked').each(function() {
                ids.push($(this).val())
            })

            fetch_data(ids)
            console.log(ids);
        })

        function formatDate(string) {
            bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            tanggal = string.split("-")[2];
            bulan = string.split("-")[1];
            tahun = string.split("-")[0];

            return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
        }

        function fetch_data(data) {
            $.ajax({
                type: 'POST',
                url: "<?= base_url(); ?>/pelamar/ajax_lowongan",
                data: {
                    filter: data
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    let lowongan = '';
                    if (data.lowongan.length) {
                        data.lowongan.forEach(function(val) {
                            lowongan +=
                                `
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="job-tittle job-tittle2">

                                        <a href="#">
                                            <h4>${val.nama_divisi}</h4>
                                        </a>
                                        <ul>
                                            <li>
                                                <label class="label">Kategori</label>
                                                <span class="detail-desc text-dark">${val.kategori}</span>
                                            </li>
                                            <li>
                                                <label class="label">Total Posisi</label>
                                                <span class="detail-desc text-dark">${val.total_posisi}</span>
                                            </li>
                                            <li>
                                                <label class="label">Deadline</label>
                                                <span class="detail-desc text-dark">${formatDate(val.deadline)}</span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="<?= base_url(); ?>/pelamar/job_details/${val.id_lowongan} ?>">Lihat Detail</a>
                                </div>
                            </div>
                        `

                        })
                    } else {
                        lowongan = `<div class="text-center my-4">Tidak ada data yang ditemukan!</div>`
                    }

                    $('#lowongan').html(lowongan);

                    $('.count-job').html(`${data.lowongan.length} pekerjaan ditemukan`)
                }
            })
        }
    })
</script>
<?= $this->endSection(); ?>