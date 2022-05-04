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
</head>

<body id="page-top">
    <h4 style="margin-bottom: 5px;">Data Lamaran Pekerjaan</h4>
    <?php echo $label ?>
    <table class="table" border="1" width="100%" style="margin-top: 10px;">
        <tr>
            <th>No</th>
            <th>Nama Pelamar</th>
            <th>Divisi</th>
            <th>Tanggal Lamaran</th>
            <th>Status</th>
        </tr>
        <?php
        if (empty($lamaran)) {
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        } else {
            $i = 1;
            foreach ($lamaran as $l) {
                echo "<tr>";
                echo "<td style='width: 25px;'>" . $i++ . "</td>";
                echo "<td style='width: 100px;'>" . $l['fullname'] . "</td>";
                echo "<td style='width: 200px;'>" . $l['nama_divisi'] . "</td>";
                echo "<td style='width: 80px;'>" . date('d-m-Y', strtotime($l['tgl_lamaran'])) . "</td>";
                echo "<td style='width: 100px;'>" . $l['status_lamaran'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>