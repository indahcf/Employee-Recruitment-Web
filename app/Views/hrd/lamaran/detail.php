<?= $this->extend('templates/index');; ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-900">Detail Lamaran Pekerjaan</h1>

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3">ID Lamaran</label>
                <div class="col-sm-9">
                    RU<?= str_pad($lamaran['id_lamaran'], 5, "0", STR_PAD_LEFT); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3">Nama Lengkap</label>
                <div class="col-sm-9">
                    <?= $lamaran['fullname']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jk" class="col-sm-3">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <?= $lamaran['jk']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tempat_lahir" class="col-sm-3">Tempat Lahir</label>
                <div class="col-sm-9">
                    <?= $lamaran['tempat_lahir']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-sm-3">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <?= date('d/m/Y', strtotime($lamaran['tgl_lahir'])); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-3">Alamat</label>
                <div class="col-sm-9">
                    <?= $lamaran['alamat']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3">Email</label>
                <div class="col-sm-9">
                    <?= $lamaran['email']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-3">No Telepon</label>
                <div class="col-sm-9">
                    <?= $lamaran['no_hp']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="pendidikan_terakhir" class="col-sm-3">Pendidikan Terakhir</label>
                <div class="col-sm-9">
                    <?= $lamaran['pendidikan_terakhir']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="univ" class="col-sm-3">Nama Universitas</label>
                <div class="col-sm-9">
                    <?= $lamaran['univ']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-3">Jurusan</label>
                <div class="col-sm-9">
                    <?= $lamaran['jurusan']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tahun_lulus" class="col-sm-3">Tahun Kelulusan</label>
                <div class="col-sm-9">
                    <?= $lamaran['tahun_lulus']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="ipk" class="col-sm-3">IPK</label>
                <div class="col-sm-9">
                    <?= number_format($lamaran['ipk'], 2); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="cv" class="col-sm-3">CV</label>
                <div class="col-sm-9">
                    <a href="/hrd/lamaran/download_cv/<?= $lamaran['id_lamaran']; ?>" class="btn btn-info">Unduh <i class="fa fa-download"></i></a>
                </div>
            </div>
            <div class="form-group row">
                <label for="portofolio" class="col-sm-3 col-form-label">Portofolio</label>
                <div class="col-sm-9">
                    <?php if ($lamaran['portofolio'] != null || $lamaran['portofolio'] != "") : ?>
                        <a href="/hrd/lamaran/download_portofolio/<?= $lamaran['id_lamaran']; ?>" class="btn btn-info">Unduh <i class="fa fa-download"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="divisi" class="col-sm-3">Divisi</label>
                <div class="col-sm-9">
                    <?= $lamaran['nama_divisi']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lamaran" class="col-sm-3">Tanggal Lamaran</label>
                <div class="col-sm-9">
                    <?= $lamaran['tgl_lamaran']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-3">Status</label>
                <div class="col-sm-9">
                    <?= $lamaran['status_lamaran']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jadwal_interview" class="col-sm-3">Jadwal Interview</label>
                <div class="col-sm-9">
                    <?= $lamaran['jadwal_interview']; ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-9">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $lamaran['id_lowongan']; ?>">
                        Konfirm
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $lamaran['id_lowongan']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/lamaran/update_status" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id_lamaran" value="<?= $lamaran['id_lamaran']; ?>">
                                        <div class="form-group">
                                            <label for="status_lamaran" class="col-form-label">Status Lamaran</label>
                                            <select class="form-control w-100 status" id="status_lamaran" name="status_lamaran">
                                                <option value="Menunggu Konfirmasi" <?= $lamaran['status_lamaran'] == 'Menunggu Konfirmasi' ? 'selected' : '';  ?>>Menunggu Konfirmasi</option>
                                                <option value="Review HRD" <?= $lamaran['status_lamaran'] == 'Review HRD' ? 'selected' : '';  ?>>Review HRD</option>
                                                <option value="Interview" <?= $lamaran['status_lamaran'] == 'Interview' ? 'selected' : '';  ?>>Interview</option>
                                                <option value="Diterima" <?= $lamaran['status_lamaran'] == 'Diterima' ? 'selected' : '';  ?>>Diterima</option>
                                                <option value="Ditolak" <?= $lamaran['status_lamaran'] == 'Ditolak' ? 'selected' : '';  ?>>Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-jadwal" style="display: none">
                                            <label for="jadwal_interview" class="col-form-label">Jadwal Interview</label>
                                            <input type="datetime-local" class="form-control" id="jadwal_interview" name="jadwal_interview" value="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('select[name=status_lamaran]').on('change', function() {
                                if ($(this).val() == 'Interview') {
                                    $('.input-jadwal').css('display', 'block')
                                } else {
                                    $('.input-jadwal').css('display', 'none')
                                }
                            })
                        })
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>