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
  $eliminar = "DELETE FROM plato WHERE id = '$id'";
  $resultadoELIMINAR = mysqli_query ($conexion,$eliminar);

  if($resultadoELIMINAR){
    echo'
        <script>alert("LOS DATOS SE ELIMINARON CORRECTAMENTE");
        window.location ="PanelTiendasModificar.php";
        </script>';
}else{
    echo'
        <script>alert("No se eliminó los datos intentelo de nuevo");
        window.location ="PanelTiendasModificar.php";
        </script>';
}
?>