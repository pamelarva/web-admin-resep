<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        .custom-btn-info {
            background-color: #4F4A45;
            color: #fff;
        }
        .custom-btn-danger {
            background-color: #fff;
            border-color: #4F4A45;
            color: #4F4A45;
        }
        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1;
            background-color: #fff;
        }
        body {
            margin-top: 100px;
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <br>
    <div class="container">
        <center><h2>RESEP KUE</h2></center>
        <br>
        <a href="tambah.php"  class="btn custom-button-color">Tambah Resep</a>
        <br>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Foto Kue</th>
                <th>Nama Kue</th>
                <th>Jenis Kue</th>
                <th>Bahan</th>
                <th>Langkah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            include ('koneksi.php');
            $sql = mysqli_query($koneksi, "SELECT c.*, j.jenis_roti 
                                          FROM cara c
                                          INNER JOIN jenis j ON c.id_jenis = j.id_jenis
                                          ORDER BY c.id_resep ASC");
            $no = 1;
            
            while ($row = mysqli_fetch_array($sql)) {
                $roti = $row['nama_roti'];
                echo "
                <tr>
                    <td width='30'>" . $no . "</td>
                    <td width='100'><image width='120px' src='img/" . $row['gambar_roti'] . "'></td>
                    <td width='200'>" . $row['nama_roti'] . "</td>
                    <td width='200'>" . $row['jenis_roti'] . "</td>
                    <td width='200'>" . $row['bahan'] . "</td>
                    <td width='300'>" . $row['langkah'] . "</td>
                    <td width='200'><a class='btn custom-btn-info' href='edit.php?id_resep=" . $row['id_resep'] . "'>
                    Edit</a> <a class='btn custom-btn-danger' href='hapus.php?id_resep=" . $row['id_resep'] . "'>Hapus</a>
                    </td>
                </tr>
                ";
                $no++;
            }
            
        ?>
        </tbody>
    </table>
    </div>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-muted">&copy; Riev's Recipe</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          </a>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
