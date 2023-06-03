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
  $userInfo = "SELECT * FROM usuarios";
  $TiendasInfo = "SELECT * FROM tiendas";



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
          <a class="sidebar-brand brand-logo" href="PanelAdmin.php"><img src="assets/images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="PanelAdmin.php"><img src="assets/images/logo_mini.png" alt="logo" /></a>
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
            <a class="nav-link" href="PanelAdmin.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">TIENDAS</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
            <?php $viewDatauser = mysqli_query($conexion, $TiendasInfo);
                          while($row=mysqli_fetch_assoc($viewDatauser)){
                        ?>
                        <tbody>
                          <tr>
                          <td style="text-align: right;"><label class="btn btn-light"><?php echo $row["nombre"];?></label></td>
                          </tr>
                        </tbody> <?php } ?>
            </div>
          </li>
          
            <div class="collapse" id="auth">
            </div>
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
                  <a href="PanelAdminRegister.php" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-outline text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">AGREGAR PROPIETARIOS</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="PanelAdminRegisterTiendas.php" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-web text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">AGREGAR NUEVAS TIENDAS</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="PanelAdminModificar.php" class="dropdown-item preview-item">
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
                      <p  class="preview-subject mb-1">Cerrar Sesión</p>
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
                <div class="card">
                  <div class="card-body">
                    

                  <!--CONTENIDO DASHBOARD-->

                    <div class="row">
                      <div class="col-9">
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">PANEL DE ADMINISTRADOR</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">SUBIDA DE DATOS</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">ENTRADA DE DATOS</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">BASE DE DATOS INTEGRADA</h6>
                  </div>
                </div>
              </div>
            </div>
          <div>

            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>productos resgitrados</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">En espera de datos</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+0.0%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">intproduct</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>productos registrados</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">En espera de datos</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+0.0%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">intproduct</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>productos registrados</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">En espera de datos</h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">+0.0% </p>
                        </div>
                        <h6 class="text-muted font-weight-normal">intproduct</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--INFORMACION DE LOS ADMINISTRAORES-->
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">USUARIOS REGISTRADOS</h4>
                    <div class="table-responsive">
                    <div class="row">
                      <!--INICIO DE LA TABLA--->
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>usuario</th>
                            <th>correo</th>
                            <th>ROL</th>
                          </tr>
                        </thead>
                        <?php $viewDatauser = mysqli_query($conexion, $userInfo);
                          while($row=mysqli_fetch_assoc($viewDatauser)){
                        ?>
                        <tbody>
                          <tr>
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["usuario"];?></td>
                            <td><?php echo $row["correo"];?></td>
                            <td><label class="badge badge-danger"><?php echo $row["rol_id"];?></label></td>
                          </tr>
                        </tbody> <?php } ?>
                      </table>
                      

                    </div>
                    </div>
                    </div>
                      <!--AQUI VA LA INFO DE ADMIS EN PHP-->
                  </div>
                </div>
              </div>
            </div>

          <!--INFORMACION DE LOS RETAURANTES-->
                        <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">RESTAURANTES</h4>
                    <div class="table-responsive">
                                            <!--INICIO DE LA TABLA--->
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>NIT</th>
                            <th>NOMBRE DE LA TIENDA</th>
                            <th>DIRECCION</th>
                            <th>FOTO</th>
                          </tr>
                        </thead>
                        <?php $viewDatTiendas = mysqli_query($conexion, $TiendasInfo);
                          while($row=mysqli_fetch_assoc($viewDatTiendas)){
                        ?>
                        <tbody>
                          <tr>
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["nit"];?></td>
                            <td><?php echo $row["nombre"];?></td>
                            <td><?php echo $row["lugar"];?></td>
                            <td><img src="data:image/webp;base64,<?php echo base64_decode($row["foto"])?>" alt=""></td>
                          </tr>
                        </tbody> <?php } ?>
                      </table>
                      

                    </div>
                    </div>
                      <!--AQUI VA LA INFO DE ADMIS EN PHP-->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!---PARTE DE RECOMENACIONES DE LOS DUEÑOS DE RESTAURANTES-->
            <div class="row">
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">MENSAJES</h4>
                    </div>
                    <!--INFORMACION PHP MENSAJES ADMINS-->
                  </div>
                </div>
              </div>
              
              <!--FLUJO DE INFORMACION DE REGISTROS DE USUARIOS-->
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">USUARIOS ENTRANTES</h4>
                    <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                    </div>
                  </div>
                </div>
              </div>

              <!--AÑADIR USUARIOS ADMIN-->
              <div class="col-md-12 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
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