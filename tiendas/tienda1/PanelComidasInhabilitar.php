<?php
  // Seguridad de sesiones
  session_start();
  error_reporting(0);
  $validar_login = $_SESSION['correo'];
  if ($validar_login == null || $validar_login == '') {
    header("Location: login.php");
    die();
  }

  include("db.php");
  $id = $_GET["id"];
  $estado = "UPDATE platos SET estado = 0 WHERE id = '$id'"; 
  $resultadoELIMINAR = mysqli_query($conexion, $estado);

  if ($resultadoELIMINAR) {
    echo '
        <script>alert("LOS DATOS SE INHABILITARON CORRECTAMENTE");
        window.location = "PanelTiendasModificar.php";
        </script>';
  } else {
    echo '
        <script>alert("No se pudo inhabilitar los datos, intentelo de nuevo");
        window.location = "PanelTiendasModificar.php";
        </script>';
  }
?>