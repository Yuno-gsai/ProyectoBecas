<?php
// Siempre iniciamos la sesión al principio.
session_start();

// Verificamos si la variable de sesión del usuario está establecida.
// Si no lo está, significa que el usuario no ha iniciado sesión.
if (!isset($_SESSION['usuario_id'])) {
    // Lo redirigimos a la página de login.
    header('Location: login.php');
    exit();
}

// Si la sesión existe, podemos usar los datos guardados.
$nombreUsuario = $_SESSION['nombre_usuario'];
$rolUsuario = $_SESSION['rol_usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
     <style>
        body { font-family: sans-serif; padding: 2rem; }
        .welcome-box { max-width: 600px; margin: auto; padding: 2rem; border: 1px solid #ddd; border-radius: 8px; text-align: center; }
        a { color: #007bff; }
    </style>
</head>
<body>
    <div class="welcome-box">
        <h1>¡Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?>!</h1>
        <p>Has iniciado sesión correctamente.</p>
        <p>Tu rol es: <strong><?php echo htmlspecialchars($rolUsuario); ?></strong></p>
        <br>
        <p><a href="logout.php">Cerrar Sesión</a></p>
    </div>
</body>
</html>