<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
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
        .container {
            width: 90%;
            background: #967E76;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,.3);
            padding: 40px 40px;
            margin-bottom: 40px;
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
    <br>
    <div class="container">
        <center>
            <h2>EDIT RESEP</h2>
            <br>
        </center>
        <?php
        include('koneksi.php');

        if (isset($_GET['id_resep'])) {
            $id = $_GET['id_resep'];
            $sql_edit = mysqli_query($koneksi, "SELECT * FROM cara WHERE id_resep='$id'");
            while ($data = mysqli_fetch_array($sql_edit)) {
                $gambar_roti = $data['gambar_roti'];
                $nama_roti = $data['nama_roti'];
                $id_jenis = $data['id_jenis'];
                $bahan = $data['bahan'];
                $langkah = $data['langkah'];
            }
        ?>

        <form action="edit.php" method="POST">
            <div class="row mb-3">
                <label for="inputID" class="col-sm-2 col-form-label">Id Resep</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_resep" name="id_resep" value="<?php echo $id ?>"
                        readonly="readonly">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputImg" class="col-sm-2 col-form-label" name="gambar_roti">Foto Kue</label>
                <div class="col-sm-10">
                    <image width='120px' src='<?php echo "img/" . $gambar_roti ?>'>
                    File terupload: <?php echo $gambar_roti ?>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputNama" class="col-sm-2 col-form-label">Nama Kue</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_roti" name="nama_roti" value="<?php echo $nama_roti ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputJenis" class="col-sm-2 col-form-label">Id Jenis Kue</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_jenis">
                        <?php
                        $query = "SELECT id_jenis FROM jenis";
                        $result = mysqli_query($koneksi, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row['id_jenis'] == $id_jenis) ? 'selected' : '';
                            echo '<option value="' . $row['id_jenis'] . '" ' . $selected . '>' . $row['id_jenis'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Jenis Kue</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKue" id="gridRadios1" value="kueKering" <?php echo ($id_jenis == 'K00') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gridRadios1">
                        Kue Kering
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKue" id="gridRadios2" value="kueBasah" <?php echo ($id_jenis == 'B00') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gridRadios2">
                        Kue Basah
                        </label>
                    </div>
                </div>
            </fieldset>

            <div class="row mb-3">
                <label for="inputBahan" class="col-sm-2 col-form-label">Bahan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bahan" name="bahan" value="<?php echo $bahan ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputLangkah" class="col-sm-2 col-form-label">Langkah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="langkah" name="langkah" value="<?php echo $langkah ?>">
                </div>
            </div>
            <button type="submit" class="btn custom-button-color" name="simpan" value="Simpan">Edit Resep</button>
        </form>

        <?php
        }

        if (isset($_POST['simpan'])) {
            $id_resep = $_POST['id_resep'];
            $nama_roti = $_POST['nama_roti'];
            $id_jenis = $_POST['id_jenis'];
            $bahan = $_POST['bahan'];
            $langkah = $_POST['langkah'];

            $sql = mysqli_query($koneksi, "UPDATE cara SET nama_roti='$nama_roti', id_jenis='$id_jenis', bahan='$bahan', langkah='$langkah' WHERE id_resep='$id_resep'");

            echo "<br><h5>Data resep <b><i>" . $nama_roti . "</b></i> berhasil diubah.</h5>";
        }
        ?>
        <br>
        <a href="index.php" class="btn custom-button-color">Kembali ke Beranda</a>
        <br>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; Riev's Recipe</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap" /></svg>
            </a>
        </footer>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>
