<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Lamaran Pekerjaan</title>

    <link rel="icon" href="<?= base_url() ?>/favicon.ico" type="image/x-icon">

    <style>
        body {
            padding: 25px;
        }

        .table-laporan {
            border-collapse: collapse;
        }

        .table-laporan,
        .table-laporan th,
        .table-laporan td {
            border: 1px solid black;
        }

        .table-laporan th,
        .table-laporan td {
            padding: 5 px;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
        }

        .surat {
            border-bottom: 2px solid #000;
            padding: 2px;
        }

        .tengah {
            text-align: center;
            line-height: 10px;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body id="page-top">
    <div class="rangkasurat">
        <table width="100%" class="surat">
            <tr>
                <td class="tengah">
                    <h3>PT Noto Teknologi Indonesia</h3>
                    <p>Alamat: Jl. Bocoran 62 Karangsalam Kidul RT 03/02 Kedungbanteng, Telp: 081334923095</p>
                    <p><i>Email</i>: halo@ultranesia.com <i>Website</i>: ultranesia.com</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="laporan">
        <h3 style="margin-bottom: 5px;"><u>DATA LAMARAN PEKERJAAN</u></h3>
        <?php echo $label ?><br>
        <table class="table-laporan" width="100%" style="margin-top: 10px;">
            <tr>
                <th>No</th>
                <th>ID Lamaran</th>
                <th>Nama Pelamar</th>
                <th>Divisi</th>
                <th>Tanggal Lamaran</th>
                <th>Status</th>
            </tr>
            <?php
            if (empty($lamaran)) {
                echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
            } else {
                $i = 1;
                foreach ($lamaran as $l) {
                    echo "<tr>";
                    echo "<td style='width: 15px; text-align: center;'>" . $i++ . "</td>";
                    echo "<td style='width: 50px; text-align: center;'>RU" . str_pad($l['id_lamaran'], 5, "0", STR_PAD_LEFT) . "</td>";
                    echo "<td style='width: 100px; text-align: center;'>" . $l['fullname'] . "</td>";
                    echo "<td style='width: 100px; text-align: center;'>" . $l['nama_divisi'] . "</td>";
                    echo "<td style='width: 80px; text-align: center;'>" . date('d-m-Y', strtotime($l['tgl_lamaran'])) . "</td>";
                    echo "<td style='width: 100px; text-align: center;'>" . $l['status_lamaran'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</body>

</html>