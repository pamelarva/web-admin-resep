<?php
include "koneksi.php";
$id = $_GET['id_resep'];
$sql = "DELETE FROM cara WHERE id_resep='$id'";
$hasil = mysqli_query($koneksi, $sql);

echo "<script> alert ('Data Berhasil Dihapus')</script>";
header("location:index.php");

?>