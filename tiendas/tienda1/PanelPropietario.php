<?php

// Seguridad de sesiones
session_start();
error_reporting(0);
$validar_login = $_SESSION['correo'];
if (!isset($_SESSION['correo']) || empty($_SESSION['correo'])) {
    // Redirigir al formulario de inicio de sesión
    header("Location: http://localhost/plazoletafesc/propietariosLogin/propietarioslogin.php");
    exit();
}

include("db.php");
$userInfo = "SELECT * FROM usuarios";
// Obtener y mostrar el correo electrónico del usuario
$email = $_SESSION['correo'];
$email2 = $_SESSION['correo'];
$email3 = $_SESSION['correo'];
// Para tomar la id
$id_prop = $_SESSION["rol_id"];
$propietarioInfo = "SELECT * FROM usuario WHERE rol_id = '$id_prop' ";

include '1PanelUp.php';

if ($email === '1@gmail.com') {
    include '1PropietarioInfo.php';
} elseif ($email2 === '2@gmail.com') {
    include '2PropietarioInfo.php';
} elseif ($email3 === '3@gmail.com') {
    include '3PropietarioInfo.php';
} else {
    ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h1>Usted no tiene permiso o se encuentra deshabilitado por el administrador.</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

include '2PanelDown.php';
?>