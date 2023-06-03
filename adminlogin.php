<?php

session_start();

if(isset($_SESSION['usuario'])){
    header("location:PanelAdmin.php");
    die();
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="assets/css/admincss.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="https://i.ibb.co/T1gMmmQ/favicon.png" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>

        <div class="card-body">
          <h4 class="title text-center mt-4">PANEL ADMIN</h4>
          
          <form class="form-box px-3" action="validae.php" method="post">

          <div class="form-input">
          <span><i class="fa fa-user-o"></i></span>
              <input type="email" name="correo" placeholder="correo" tabindex="10">
            </div>

            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="contrasena" placeholder="contraseña">
            </div>

            <div class="mb-3">
              <button  name="btningresar" type="submit" class="btn btn-block text-uppercase">
                INICIAR SESION
              </button>
            </div>
          </form>
          <form class="form-box px-3" method="post">
          <div class="mb-3">
            <a href="login.php" type="submit" class="btn btn-block text-uppercase">
                VOLVER
            </button></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>