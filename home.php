<?php
session_start();
$menu = "data";
if ($_SESSION['nama_login'] == null) {
    header("Location: login.php");
}
require_once('koneksi.php');
require_once('getdata.php');



if (isset($_GET['pencarian'])) {
    $cari = $_GET['pencarian'];
    // panggil table data siswa
    $ambil_data = mysqli_query($koneksi, "SELECT data_anggota.*, data_tingkat.id, data_tingkat.tingkat FROM data_anggota JOIN daftar_tingkat on data_anggota.id_anggota=daftar_tingkat.no_anggota JOIN data_tingkat on daftar_tingkat.id_tingkat=data_tingkat.id like '%$cari%' ");
} else {
    // panggil seluruh table data siswa
    $ambil_data = mysqli_query($koneksi, "SELECT data_anggota.*, data_tingkat.id, data_tingkat.tingkat FROM data_anggota JOIN daftar_tingkat on data_anggota.id_anggota=daftar_tingkat.no_anggota JOIN data_tingkat on daftar_tingkat.id_tingkat=data_tingkat.id;");
   
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sekolah Rakyat Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"       integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  

</head>

<body>

    <?php require_once('navbar.php'); ?>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor Handphone</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Kota Asal</th>
                    <th scope="col">Tingkat</th>
                    <th scope="col">Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $angka = 1;
                while ($data = mysqli_fetch_assoc($ambil_data)) {

                    // jika foto kosong maka tampilkan gambar default
                    if ($data['foto'] == "") {
                        $gambar = "sandal.jpeg";
                    } else {
                        $gambar = $data['foto'];
                    }

                    ?>
                    <tr>
                        <th><?= $angka++; ?></th>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['handphone'] ?></td>
                        <td><?= $data['umur'] ?></td>
                        <td><?= $data['pekerjaan'] ?></td>
                        <td><?= $data['asal'] ?></td>
                        <td><?= $data['tingkat'] ?></td>
                        <td><img  width="100px" src="assets/<?= $gambar ?>" /></td>
                        <td>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-bs-id="<?= $data['id_anggota'] ?>" data-bs-aksi="ubah"> Ubah
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-bs-id="<?= $data['id_anggota'] ?>" data-bs-aksi="hapus"> Hapus
                            </button>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
        <br>
        <br>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
               
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <!-- JQUERY 3.X -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

        <!-- Datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            // alert('Hallo');
            const modal = document.getElementById('exampleModal')
            modal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id');
                const aksi = button.getAttribute('data-bs-aksi');
                // console.log(id);
                $.post('form.php', {id,aksi}, function (a) {
                    // console.log(a);
                }).done(function (x) {
                    $('.modal-body').html(x);
                }).fail(function () {
                    alert("error");
                }).always(function () {
                    // alert("finished");
                });
            });


            // proses update
            $("#form").submit(function (event) {
                event.preventDefault();
                // const data_form = this.serialize();
                // console.log(data_form);
            });


            $('.table').DataTable();

        });

    </script>
</body>

</html>