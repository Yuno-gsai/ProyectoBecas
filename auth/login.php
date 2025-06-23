<?php
session_start();

// Si el usuario ya está logueado, lo mandamos al index principal que lo llevará al dashboard.
if (isset($_SESSION['userID'])) { // Uso 'userID' para coincidir con tu index.php
    header("Location: /index.php");
    exit();
}

require_once '../Models/BeUsuarioModel.php'; // La ruta ahora sube un nivel (../)

$mensajeError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUsuario = $_POST['nombreUsuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    if (empty($nombreUsuario) || empty($clave)) {
        $mensajeError = 'Por favor, introduce tu nombre de usuario y clave.';
    } else {
        $usuarioModel = new BeUsuarioModel();
        $usuarioVerificado = $usuarioModel->findByUsernameAndVerifyClave($nombreUsuario, $clave);

        if ($usuarioVerificado) {
            session_regenerate_id(true);
            // Usamos 'userID' como en tu index.php para mantener consistencia
            $_SESSION['userID'] = $usuarioVerificado['IdUsuario'];
            $_SESSION['nombre_usuario'] = $usuarioVerificado['NombreUsuario'];
            $_SESSION['rol_usuario'] = $usuarioVerificado['RolUsuario'];

            // Redirigimos al index principal, que se encargará de mostrar el dashboard.
            header('Location: /index.php');
            exit();
        } else {
            $mensajeError = 'Nombre de usuario o clave incorrectos.';
        }
    }
}

// Al final, después de toda la lógica, incluimos la vista que contiene el HTML.
// La lógica y las variables de este script (como $mensajeError) estarán disponibles en la vista.
require_once '../Views/login_view.php';
?>