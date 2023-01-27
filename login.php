<?php
session_start();

// if (isset($_COOKIE['nama_login'])) {
//     header("Location: index.php");
// }
if (isset($_SESSION['ingatkan'])) {
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-color:#21618C ">

    <div class="container mt-5 ">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body " style="width: 18rem; background-color:black ;">
                    <?php
                    if (isset($_GET['pesan'])) { ?>
                    <div class="alert alert-primary" role="alert">
                        <?= $_GET['pesan'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php }
                    ?>
                    <form class="" action="aksilogin.php" method="post">
                        <div class="mb-3">
                            <label style="color:white" for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="" name="username">

                        </div>
                        <div class="mb-3">
                            <label style="color:white" for="password" class="form-label style="color:white"">Password</label style="color:white">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="ingat" name="ingatkan">
                            <label style="color:white" class="form-check-label style="color:white"" for="ingat">Ingat Saya</label style="color:white">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body >

</html>