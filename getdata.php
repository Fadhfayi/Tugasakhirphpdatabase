<?php
include_once('koneksi.php');

// var_dump($id);die;
$ambil_data = mysqli_query($koneksi, "SELECT data_anggota.*, data_tingkat.id, data_tingkat.tingkat FROM data_anggota JOIN daftar_tingkat on data_anggota.id_anggota=daftar_tingkat.no_anggota JOIN data_tingkat on daftar_tingkat.id_tingkat=data_tingkat.id");
// $ambil_data_tingkat = mysqli_query($koneksi,$ambil_data);
$data = mysqli_fetch_assoc($ambil_data);
$no = $data ['id_anggota']; 
// var_dump($data);die;

?>




