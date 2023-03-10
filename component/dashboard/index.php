<?php
require '../database/koneksi.php';


if (isset($_SESSION['log'])) {
} else {
    header('location:index.php');
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WH AESTHETIC CLINIC & APOTEK MEDIKA</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php"><img src="../../images/logo.png" width="40" height="40">  Wh ACAM</a>
        <!-- Sidebar Toggle
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
        <!-- Navbar Search-->
        <div class="input-group">
        </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../../logout/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link active" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="data_pasien.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Pasien
                        </a>
                        <a class="nav-link" href="data_jadwal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Jadwal Dokter
                        </a>
                        <a class="nav-link" href="data_laporan_pendaftaran.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Laporan Pendafataran
                        </a>
                        <a class="nav-link" href="ganti_password.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Ganti Password
                        </a>                 
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged sebagai:</div>
                    <?php 
                    if ($_SESSION['admin'] == True) {
                        echo $_SESSION['name'];
                    }
                    else{
                        
                    }
                    ?>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-5">  
                    <!-- Content Row -->
                    <div class="row">

                        <!-- User Card -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Pasien</div>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) totaluser FROM pasien");
                                        $datauser = mysqli_fetch_array($query);
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datauser['totaluser'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dokter Card -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            Jadwal Dokter</div>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) totaldokter FROM data_jadwal_dokter");
                                        $datadokter = mysqli_fetch_array($query);
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $datadokter['totaldokter'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; WH AESTHETIC CLINIC & APOTEK MEDIKA</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>