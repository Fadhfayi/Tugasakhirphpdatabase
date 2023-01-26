<?php
session_start();

require_once('koneksi.php');
/* if (empty($_COOKIE['nama_login'])) {
header("Location: login.php");
} */
$menu = "daftar_kota";
if ($_SESSION['nama_login'] == null) {
    header("Location: login.php");
}


$query = "SELECT asal,COUNT(asal) as kota_asal from data_anggota group by asal having kota_asal > 1 ORDER by kota_asal DESC";
$data_asal = mysqli_query($koneksi, $query);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sekolah Rakyat Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>


    <?php require_once('navbar.php'); ?>

    <div class="container mt-5">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kota</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                while ($asal = mysqli_fetch_assoc($data_asal)) { ?>
                    <tr>
                        <th scope="row"><?= $no++;?></th>
                        <td><?=$asal['asal']?></td>
                        <td><?=$asal['kota_asal']?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>