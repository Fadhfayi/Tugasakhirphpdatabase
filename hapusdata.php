<?php
include_once('koneksi.php');

$id = $_POST['no'];

$query = "SELECT `foto` from `data_anggota` where `id_anggota` = '$id'  ";
$data_foto = mysqli_query($koneksi, $query);
$foto = mysqli_fetch_assoc($data_foto);

// Hapus data gambar di assets
unlink("assets/" . $foto['foto']) ?? '';

// Hapus data;
$hapus_data = mysqli_query($koneksi, "DELETE from `data_anggota` where `id_anggota` = '$id' ");
if ($hapus_data) {
    echo "<p>Data berhasil dihapus</p>";
}else{
    echo "<p>Data gagal dihapus</p>";
}
header("Location: home.php");


