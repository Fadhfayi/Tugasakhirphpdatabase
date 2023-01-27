<?php
include_once('koneksi.php');
// $no = $_POST['id'];
$nama = $_POST['nama'];
$handphone = $_POST ['Handphone'];
$umur = $_POST['umur'];
$pekerjaan = $_POST['pekerjaan'];
$asal = $_POST['asal'];
$foto = $_FILES['foto']['name'];
$id_tingkat = $_POST ['tingkat'];
$tingkat = $_POST[ 'tingkat'];


$insert_data =mysqli_query($koneksi, "INSERT into `data_anggota` (`nama`,`handphone`,`umur`,`asal`,`pekerjaan`,`foto`) values ('$nama','$handphone','$umur','$asal','$pekerjaan','$foto') ");

$id = $koneksi->insert_id;


 mysqli_query($koneksi,"INSERT into daftar_tingkat (`id_tingkat`,`no_anggota`) values ('$id_tingkat', '$id' )");
echo "<p>Data berhasil masuk</p>";
    echo "<meta http-equiv=refresh content=1;URL='home.php'>";




echo "<br>";


move_uploaded_file($_FILES["foto"]["tmp_name"], 'assets/'.$foto);

