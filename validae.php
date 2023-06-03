<?php
    session_start();
    include 'db.php';

    $correo = $_POST ['correo'];
    $contrasena =$_POST ['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    // validamos 
    $validar_login ="SELECT * FROM usuarios WHERE correo='$correo' and contrasena='$contrasena'";
    $resultado = mysqli_query ($conexion,$validar_login);
    $filas = mysqli_fetch_array($resultado);



    if (mysqli_num_rows($resultado)>0){

    if($filas['rol_id']==2){
        $_SESSION['correo'] =$correo;
        header("location:PanelAdmin.php");
        exit;
    }

    if($filas['rol_id']==3){
        $_SESSION['correo'] =$correo;
        header("location:adminlogin.php");
        exit;
    }

    if ($filas['rol_id']==1)  {
        header("location:adminlogin.php");
        exit;


    }
}
else{        echo '
        <script>

        alert("Usuario no existe, por favor veifique los datos introducidos ");
        window.location ="adminlogin.php"; 
        
        </script>'; exit;
}

?>