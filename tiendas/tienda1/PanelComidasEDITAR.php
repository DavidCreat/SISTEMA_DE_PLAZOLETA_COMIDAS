<?php
  //seguridad de sesiones
  session_start();
  error_reporting(0);
  $validar_login = $_SESSION['correo'];
  if($validar_login== null || $validar_login=''){
    header("login.php");
    die();
  }

  include("db.php");
  $id = $_GET["id"];
  $userInfo = "SELECT * FROM plato WHERE id = '$id' ";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FESC- ADMIN PANEL</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://i.ibb.co/T1gMmmQ/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo_mini.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face_1.png" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                <span>BIENVENID@:</span>
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION["correo"]; ?></h5>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Informacion de perfil</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="marketplace.php" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Ir a marketplace</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">linea ADMIN</span>
            </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="PanelComidasEDITAR.php">
              <span class="menu-icon">
                <i class="mdi mdi-server"></i>
              </span>
              <span class="menu-title">TABLAS (EDICIÓN USUARIOS)</span>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo_mini.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">ACCIONES</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Projects</h6>
                  <div class="dropdown-divider"></div>
                  <a href="PanelPropietario.php" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-cloud text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Volver al dashboard</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-layers text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">LISTAS DE TABLAS</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face_1.png" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION["correo"]; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a> 
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">PERFIL</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Ajustes</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="cerrar_sesion_admin.php" class="dropdown-item preview-item" href="login.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p  class="preview-subject mb-1">Cerrar Seccion</p>
                    </div>
                  </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>

 <!--INICIO DEL DASH BOARD INTERNO-->
<!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                  <div class="card-body"></div></div></div>
                    

                  <!--CONTENIDO DASHBOARD-->

          <!--INFORMACION DE LOS RETAURANTES-->
                        <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">TABLA DE USUARIO:</h4>
                    
                    <div class="table-responsive">

                    <!--CONTENIDOS REGIUSTRO-->
                    <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">ZONA DE EDICIÓN DE INFORMACIÓN:</h1>
                    <p>Recuerda hacer cambios oportunos (mira bien la información que digites)</p>
                    <div class="table-responsive">
                    <div class="row">
                      <!--INICIO DE LA TABLA--->
                    <form class="table-responsive" action="PanelComidasEDITAR_ATC.php" method="post">
                      <table class="table">
                        <thead>
                          <tr>
                            <th></th>
                            <th>COMIDA</th>
                            <th>PRECIO</th>
                            <th>CATEGORIA</th>
                            <th>FOTO</th>
                            <th>ESTADO</th><br>
                            <th>EDICIÓN</th>
                          </tr>
                        </thead>
                        <?php $viewDataTiendas = mysqli_query($conexion, $userInfo);
                          while($row=mysqli_fetch_assoc($viewDataTiendas)){
                        ?>
                        <tbody>
                          <tr>
                            <td><input type="hidden" value="<?php echo $row["id"];?>" name="id" required=""></td>
                            <td><input type="tex" value="<?php echo $row["nombre"];?>" name="nombre" required=""></td>
                            <td><input type="tex" value="<?php echo $row["precio"];?>" name="precio" required=""></td>
                            <td><input type="tex" value="<?php echo $row["categoria"];?>" name="categoria" required=""></td>
                            <td><input type="file" value="<?php echo $row["foto"];?>" name="foto" required=""></td>
                            <td><input type="list" value="<?php echo $row["estado"];?>" name="foto" required=""></td>
                            <br>
                            <td><input type="submit" value="ACTUALIZAR" class="btn btn-inverse-primary btn-fw"></td><td><a type="button" class="btn btn-inverse-danger btn-fw" href="PanelTiendasModificar.php">cancelar edición</a></td>
                          </tr>
                        </tbody> <?php } ?>

                      </table>
                      

                          </form>
                    </div>
                    </div>
                      <!--AQUI VA LA INFO DE ADMIS EN PHP-->
                  </div>
                </div>
              </div>
            </div>
                      <!--AQUI VA LA INFO DE ADMIS EN PHP-->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!---INFIERIOR DASH--->

<!-- partial -->
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>