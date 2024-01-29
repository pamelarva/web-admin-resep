<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riev's Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
      html, body {
        height: 100%;
      }
      body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(utama.jpg);
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        font-family: 'Montserrat', sans-serif;
      }

      .form-signin {
        max-width: 330px;
        padding: 15px;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      .form-signin input[type="email"] {
        width: 100%;
        height: 50px;
        margin-bottom: 25px;
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }

      .btn-login {
        background-color: #4F4A45;
        color: #fff;
      }
      .container {
        width: 400px;
        min-height: 400px;
        background: #FFF;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0,0,0,.3);
        padding: 40px 30px;
      }
      .container .login .form-floating {
        width: 100%;
        height: 50px;
        margin-bottom: 25px;
      }
    </style>
  </head>
  <body class="text-center" style="background-image: foto.jpg;">
    <div class="container">
        <form action="proses_login.php" method="POST" class="login">
          <h1 class="h3 mb-3 fw-normal">Login</h1>
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-100 btn btn-lg btn-login" type="submit" name="submit" value="Submit">Login</button>
          <p class="mt-5 mb-3 text-muted">&copy; Riev's Recipe</p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
