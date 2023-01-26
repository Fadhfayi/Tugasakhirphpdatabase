<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="#">PHP Database</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?=($menu=="home") ? "active" : "" ;?>" aria-current="page" href="index.php">Home</a>
                </li>vi
                <li class="nav-item">
                    <a class="nav-link <?=($menu=="data") ? "active" : "" ;?>" href="home.php">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=($menu=="daftar_kota") ? "active" : "" ;?>" href="daftar_kota.php">Daftar Kota</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Personal
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Info</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="keluar.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <form action="" method="GET" class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="pencarian" value="<?=(isset($_GET['pencarian']))? $_GET['pencarian']:""?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>