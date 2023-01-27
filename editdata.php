<?php
include_once('koneksi.php');
// echo var_dump($_POST);
// Kolom data di table
$id_anggota = $_POST['id'];
$nama = $_POST['nama'];
$handphone = $_POST ['handphone'];
$umur = $_POST['umur'];
$pekerjaan = $_POST['pekerjaan'];
$asal = $_POST['asal'];
$foto = $_FILES['foto']['name'];
$id_tingkat = $_POST ['tingkat'];


$query = "UPDATE data_anggota set `nama` = '$nama',`handphone` = '$handphone',`umur` = '$umur',`pekerjaan` = '$pekerjaan',`asal` = '$asal', `foto` = '$foto'";
if ($foto != '') {
    $query .= ",`foto` = '$foto'";
}

$query .= " where `id_anggota` = '$id_anggota'";
$cek_data_kelas = mysqli_query($koneksi,"SELECT * from daftar_tingkat where `no_anggota` = '$id_anggota' ");
$querytingkat = mysqli_query($koneksi,"UPDATE daftar_tingkat set `id_tingkat`='$id_tingkat' where `no_anggota`='$id_anggota'");

$update_data = mysqli_query($koneksi,$query,$querytingkat);

if ($update_data) {
    echo "<p>Data berhasil masuk</p>";
    echo "<meta http-equiv=refresh content=1;URL='home.php'>";
} else {
    echo "<p>Data gagal masuk</p>";
}



// update daftar kelas
// if (mysqli_fetch_assoc($cek_data_kelas)) {
//  $update_data = mysqli_query($koneksi, $querytingkat);
// } else {
//     // $query = mysqli_query($koneksi,"insert data_kelas values ( null,'$no','$id_kelas')");
// }




echo "<br>";



// $nama = $_FILES["foto"]["name"];

move_uploaded_file($_FILES["foto"]["tmp_name"], 'assets/'.$foto);
header('Location: home.php');

