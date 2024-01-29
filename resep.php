<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
    $hostname="localhost";
    $username="root";
    $password="";
    $dbname = "resep_2650";

    $conn = new mysqli($hostname, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    //Menghitung jumlah resep kue kering (K00)
    $queryKueKering = "SELECT COUNT(id_jenis) AS total_kue_kering FROM cara WHERE id_jenis = 'K00'";
    $resultKueKering = $conn->query($queryKueKering);

    //Menghitung jumlah resep kue basah (B00)
    $queryKueBasah = "SELECT COUNT(id_jenis) AS total_kue_basah FROM cara WHERE id_jenis = 'B00'";
    $resultKueBasah = $conn->query($queryKueBasah);

    if ($resultKueKering->num_rows > 0) {
        $rowKueKering = $resultKueKering->fetch_assoc();
        $totalKueKering = $rowKueKering['total_kue_kering'];
    } else {
        $totalKueKering = 0;
    }
    
    if ($resultKueBasah->num_rows > 0) {
        $rowKueBasah = $resultKueBasah->fetch_assoc();
        $totalKueBasah = $rowKueBasah['total_kue_basah'];
    } else {
        $totalKueBasah = 0;
    }

    $conn->close();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riev's Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .custom-bg-color {
             background-color: #4F4A45;
        }
        .custom-button-color {
            background-color: #4F4A45;
            border-color: #4F4A45;
            color: #fff;
        }
        .custom-logo {
            width: 70px;
            height: auto;
        }
        .btn-rs {
            background-color: #4F4A45;
            color: #fff;
        }
        .card {
            margin-top: 40px;
        }
        .body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="lg.png" alt="Riev's Recipe Logo" class="custom-logo">
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="tambah.php">Upload Resep</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="resep.php">Data Resep</a>
                </li>
            </ul>
                <a class="btn custom-button-color ms-auto" href="logout.php">Logout</a>  
            </div>
        </div>
    </nav>
    <center><h2>DATA SEMUA RESEP</h2></center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-1" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Resep Kue Kering</h5>
                        <p class="card-text">Total Resep: <?php echo $totalKueKering; ?></p>
                        <a href="tambah.php" class="w-100 btn btn-r btn-rs">Tambah Resep</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Resep Kue Basah</h5>
                        <p class="card-text">Total Resep: <?php echo $totalKueBasah; ?></p>
                        <a href="tambah.php" class="w-100 btn btn-r btn-rs">Tambah Resep</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>