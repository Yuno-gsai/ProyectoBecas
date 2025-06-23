<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        /* Mismos estilos de antes */
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; }
        .login-container { padding: 2rem; background-color: white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; }
        .login-container h2 { text-align: center; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; }
        .form-group input { width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; }
        .btn { width: 100%; padding: 0.75rem; border: none; background-color: #007bff; color: white; border-radius: 4px; cursor: pointer; font-size: 1rem; }
        .btn:hover { background-color: #0056b3; }
        .error { color: red; text-align: center; margin-top: 1rem; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="/auth/login.php" method="POST">
            <div class="form-group">
                <label for="nombreUsuario">Usuario:</label>
                <input type="text" id="nombreUsuario" name="nombreUsuario" required>
            </div>
            <div class="form-group">
                <label for="clave">Clave:</label>
                <input type="password" id="clave" name="clave" required>
            </div>
            <button type="submit" class="btn">Acceder</button>
        </form>
        <?php if (!empty($mensajeError)): ?>
            <p class="error"><?php echo htmlspecialchars($mensajeError); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>