<?php

require '../component/database/koneksi.php';
$id_admin = 1;
// echo $_SESSION['id_pasien'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/index.css">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <title>WH AESTHETIC CLINIC & APOTEK MEDIKA</title>
    <style>
        table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        body{
        background-color:white;
        /* background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        height: 100%; */
    }
    </style>
    
        
</head>
<body >
    
    <div  >
        <center>
        <table border="0" style="margin-top: 20px;">
            <tr>
                <td width="80%">
                    <font class="edoc-logo" style="color: black;">Wh ACAM</font>
                    <font class="edoc-logo-sub" style="color: black;">| WEBSITE PENDAFTARAN PASIEN ONLINE</font>
                </td>
                <td width="10%" style="color: black;"><a class="dropdown-item"  href="cetak_kartu.php">Cetak Kartu</a></li>
                </td>
                <td width="10%" style="color: black;"><a class="dropdown-item"  href="../logout/logout.php">Logout</a></li>
                </td>
            </tr>
    </table>
    <h1 style="color: black; font-weight: bold;">Jadwal <br>WH AESTHETIC CLINIC</h1>
    <p class="sub-text2" style="color: black;"><?= date("d-m-Y"); ?></p>
    </center>

                <?php 
                $datajadwal = mysqli_query($koneksi, "SELECT * FROM data_jadwal_dokter WHERE tanggal_jadwal=CURDATE()");
                $i = 1;
                while ($data = mysqli_fetch_array($datajadwal)) {
                    $id_jadwal = $data['id_jadwal_dokter'];
                    $nama_dokter = $data['nama_dokter'];
                    $tanggal_jadwal = $data['tanggal_jadwal'];
                    $jam_jadwal = $data['jam_jadwal'];
                
                ?>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokter</th>
                            <th>Jam</th>
                            <th>Antrian</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $nama_dokter; ?></td>
                        <td><?= $jam_jadwal;?></td>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT COUNT(*) totalantrian FROM pendaftaran WHERE id_jadwal_dokter='$id_jadwal'");
                        $dataantrian = mysqli_fetch_array($query);
                        ?>
                        <td><?= 20 - $dataantrian['totalantrian']; ?></td>
                        <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#daftar<?= $id_jadwal; ?>">Daftar</button></td>
                        </tr>

                        <!-- daftar Modal -->
                    <div class="modal" id="daftar<?= $id_jadwal; ?>">
                <div class="modal-dialog">
                <div class="modal-content">
                 <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Daftar Sesi Dokter</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <form method="post">
                            <div class="modal-body">
                                <input type="text" name="nama_dokter" value="<?= $nama_dokter; ?>" class="form-control" disabled>
                                <br>
                                <input type="date" name="tanggal_jadwal" value="<?= $tanggal_jadwal; ?>" class="form-control" disabled>
                                <br>
                                <input type="time" name="jam_jadwal" value="<?= $jam_jadwal; ?>" class="form-control" disabled>
                                <br>  
                                <input type="hidden" name="id_jadwal" value="<?= $id_jadwal; ?>">
                                <input type="hidden" name="id_pasien" value="<?= $_SESSION['id_pasien']; ?>">
                                <input type="hidden" name="id_admin" value="<?= $id_admin; ?>">
                                <button type="submit" class="btn btn-primary" name="daftarsesi">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
                                        </div>
                                        <?php }?>
                    </tbody>     
                </table>
                    
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