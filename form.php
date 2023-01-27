<?php
require_once('koneksi.php');

$no = $_POST['id'];

$ambil_data = mysqli_query($koneksi, "SELECT data_anggota.*, data_tingkat.id, data_tingkat.tingkat FROM data_anggota JOIN daftar_tingkat on data_anggota.id_anggota = daftar_tingkat.no_anggota JOIN data_tingkat on daftar_tingkat.id_tingkat=data_tingkat.id where `no_anggota` = $no");
$ambil_data_tingkat = mysqli_query($koneksi, "SELECT * FROM `data_tingkat`");

$data = mysqli_fetch_assoc($ambil_data);

$nama = $data ['nama'];
$handphone = $data ['handphone'];
$umur = $data ['umur'];
$pekerjaan = $data ['pekerjaan'];
$asal = $data ['asal'];
$foto = $data ['foto'];
$id_tingkat = $data ['id'];

?>


<?php

// Cek aksi form 
if ($_POST['aksi'] == 'ubah') {
    ?>

    <form id="form" action="editdata.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="hidden" name="id" value="<?= $no ?>">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis namamu"
                value="<?php echo $nama; ?>" />
        </div>
        <div class="mb-3">
            <label for="NOHP" class="form-label">No HP</label>
            <input type="text" class="form-control" id="NOHP" name="handphone" placeholder="Tulis no HP" value="<?= $handphone; ?>">
        </div>
        <div class="mb-3">
            <label for="umur" class="form-label">umur</label>
            <input type="text" class="form-control" id="umur" name="umur" placeholder="Tulis no HP" value="<?= $umur; ?>">
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Tulis Email" value="<?= $pekerjaan ?>">
        </div>
        <div class="mb-3">
            <label for="asal" class="form-label">Kota Asal</label>
            <input type="text" class="form-control" name="asal" id="asal" placeholder="Tulis Email" value="<?= $asal ?>">
        </div>
        <div class="mb-3">
            <label for="tingkat" class="form-label">Pilih Tingkat</label>
            <select name="tingkat" class="form-control" id="tingkat">

                <?php
                while ($datatingkat = mysqli_fetch_assoc($ambil_data_tingkat)) {
                    $selected = ($datatingkat['id'] == $id_tingkat) ? 'selected' : '' ;
                    echo "<option value='{$datatingkat['id']}' $selected>{$datatingkat['tingkat']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input class="form-control" type="file" name="foto" id="foto">
        </div>
        <img src="assets/<?php $foto ?>" class="img-thumbnail" alt="">
        <button type="submit" class="btn btn-sm btn-info" value="ubah">Ubah Data</button>
    </form>


<?php } else { ?>

    <p>Yakin Mau di hapus ??</p>

    <form action="hapusdata.php" method="post">
        <input type="hidden" name="no" value="<?= $no; ?>">
        <input type="submit" value="Hapus" class="btn btn-danger">
    </form>

<?php }

?>