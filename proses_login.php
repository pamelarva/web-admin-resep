<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riev's Recipe</title>
  <style>
    .button-kembali {
      font-family: 'Montserrat', sans-serif;
      font-size: 16px;
      background-color: #4F4A45;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      text-decoration: none;
    }
    .body {
      font-family: 'Montserrat', sans-serif;
    }
    .button-kembali a{
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <?php 
    include 'koneksi.php';
    session_start();

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM admin where username='$user' and password='$pass'");
    $cek = mysqli_num_rows($query);

    if ($cek==1)
    {
      session_start();
      $_SESSION['username'] = $user;
      header("location:index.php");
    }

    else{
      echo "<br><br><center><h2>LOGIN GAGAL.</h2></center>";
      echo "<center><h3>Pastikan username dan password anda benar.</h3></center>";
      echo "<center><button class='button-kembali'><a href='login.php'>&#11013 Kembali</a></button></center>";
    }
  ?>
</body>
</html>