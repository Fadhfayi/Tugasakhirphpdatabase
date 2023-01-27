<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="#">DATA ANGGOTA ORGANISASI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?=($menu=="home") ? "active" : "" ;?>" aria-current="page" href="index.php">Home</a>
                </li>vi
                <li class="nav-item">
                    <a class="nav-link <?=($menu=="data") ? "active" : "" ;?>" href="home.php">Data</a>
                </li>
            </ul>
</div>
            
    <div class="navbar-collapse collapse w-150 order-3 dual-collapse">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Personal
                    </a>
                    <ul class="dropdown-menu">
                        </li>
                        <li><a class="dropdown-item" href="keluar.php">Log Out</a></li>
                    </ul>
                </li>
        </ul>
    </div>
</nav>
