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
  </head>
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
        .btn-sv {
        background-color: #4F4A45;
        color: #fff;
        }
        .btn-brn {
          background-color: #4F4A45;
          color: #fff;
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
    <br> 
    <div class="container">
      <center><h2>RESEP KUE</h2></center>
        <br>
        <form action="tambah.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="inputGambar" class="col-sm-2 col-form-label">Foto Kue</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="fileKue" name="fileKue">
            </div>
        </div>
          <div class="row mb-3">
            <label for="inputNama" class="col-sm-2 col-form-label">Nama Kue</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="namaRoti" name="namaRoti">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputJenis" class="col-sm-2 col-form-label">Id Jenis Kue</label>
            <div class="col-sm-10">
              <select class="form-control" name="id_jenis">
              <?php
                include('koneksi.php');
                $query = "SELECT id_jenis FROM jenis";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id_jenis'] . '">' . $row['id_jenis'] . '</option>';
                }
            ?>
              </select>
            </div>
          </div>
          <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Jenis Kue</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKue" id="gridRadios1" value="kueKering" checked>
                <label class="form-check-label" for="gridRadios1">
                  Kue Kering
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKue" id="gridRadios2" value="kueBasah">
                <label class="form-check-label" for="gridRadios2">
                  Kue Basah
                </label>
              </div>  
            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputBahan" class="col-sm-2 col-form-label">Bahan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="bahan" name="bahan">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputLangkah" class="col-sm-2 col-form-label">Langkah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="langkah" name="langkah">
            </div>
          </div>
          <button type="submit" class="w-100 btn btn-s btn-sv" name="simpan" value="Simpan">Tambahkan</button>
        </form>
        <br>
        <a href="index.php"  class="w-100 btn btn-br btn-brn">Kembali ke Beranda</a>

      <?php
        if (isset ($_POST['simpan'])) {
            include ('koneksi.php');
            $gambar_roti = basename($_FILES["fileKue"]["name"]);
            $nama_roti = $_POST['namaRoti'];
            $id_jenis = $_POST['id_jenis'];
            $bahan = $_POST['bahan'];
            $langkah = $_POST['langkah'];
            
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["fileKue"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              echo "Maaf, file ekstensi foto tidak bisa diupload.";
              $uploadOk = 0;
            }

            if ($uploadOk == 0) {
              echo "Maaf, file Anda gagal diupload.";
            } else {
              if (move_uploaded_file($_FILES["fileKue"]["tmp_name"], $target_file)) {
                echo "File ". htmlspecialchars( basename( $_FILES["fileKue"]["name"])). " berhasil diupload.";
              } else {
                echo "Maaf, ada error ketika mengupload file Anda.";
              }
            }

            if ($uploadOk == 1) {

              $sql=mysqli_query ($koneksi, "INSERT INTO cara (gambar_roti, nama_roti, id_jenis, bahan, langkah) VALUES ('$gambar_roti','$nama_roti','$id_jenis','$bahan', '$langkah')");
            }

            }
        ?>
    </div>
    
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-muted">&copy; Riev's Recipe</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          </a>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>