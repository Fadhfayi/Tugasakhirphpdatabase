<?php
include_once('getdata.php');    
session_start();
$no = $data ['id_anggota'];
$nama = $data ['nama'];
$handphone = $data ['handphone'];
$umur = $data ['umur'];
$pekerjaan = $data ['pekerjaan'];
$asal = $data ['asal'];
$foto = $data ['foto'];
$id_tingkat = $data ['tingkat'];
$tingkat = $data ['tingkat'];
$ambil_data_tingkat = mysqli_query($koneksi, "SELECT * FROM `data_tingkat`");
$menu = "home";
if ($_SESSION['nama_login'] == null) {
    header("Location: login.php");
}

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
    
    <div class="container mt-5 ">
        <form action="postdata.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="hidden" name="no" value="<?= $no ?>">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis namamu">
            </div>
        
            <div class="mb-3">
                <label for="Handphone" class="form-label">No HP</label>
                <input type="number" class="form-control" id="Handphone" name="Handphone" placeholder="Tulis no HP">
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" placeholder="Tulis umur">
            </div>
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Tulis namamu">
            </div>
            <div class="mb-3">
                <label for="asal" class="form-label">Kota Asal</label>
                <input type="text" class="form-control" id="asal" name="asal" placeholder="Tulis namamu">
            </div>
            <div class="mb-3">
            <label for="tingkat" class="form-label">Tingkat</label>
            <select class="form-select" name='tingkat' id="tingkat">
                <option>Pilih Tingkat</option>
                <?php
                while ($tingkat = mysqli_fetch_assoc($ambil_data_tingkat)) {
                    $nama_tingkat = $tingkat['tingkat'];
                    $selected = ($tingkat['id'] == $idtingkat) ? 'selected' : '' ;
                    echo "<option value='{$tingkat['id']}' $selected>{$tingkat['tingkat']}</option>";
                }
                ?>
            </select>
        </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control" type="file" name="foto" id="foto">
            </div>
            <button type="submit" class="btn btn-sm btn-info">Upload</button>
        </form>
    </div>

    <br>
    <br>
    <br>
    <br>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>