<?php
session_start(); // Iniciar sesión

// Incluir la conexión a la base de datos
include('db_connection.php');

// Inicializar variable para mensajes de error
$error_message = '';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar y validar entradas
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $contrasena = trim($_POST['contrasena']);

    // Validar campos vacíos
    if (empty($email) || empty($contrasena)) {
        $error_message = "Por favor, complete todos los campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Por favor, ingrese un correo electrónico válido.";
    } else {
        // Preparar consulta para verificar si el usuario existe
        $query = "SELECT * FROM login WHERE email = ?";
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            // Verificar si se encontró el usuario
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                // Comparar la contraseña directamente (sin encriptación)
                if ($contrasena === $user['contrasena']) {
                    // Guardar datos del usuario en la sesión
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nombre'];
                    $_SESSION['user_email'] = $user['email'];

                    // Redirigir al usuario al panel principal
                    header("Location: sesion.php");
                    exit;
                } else {
                    // Contraseña incorrecta
                    $error_message = "Contraseña incorrecta.";
                }
            } else {
                // No se encontró el correo electrónico en la base de datos
                $error_message = "No se encontró ninguna cuenta con este correo electrónico.";
            }
            $stmt->close();
        } else {
            // Error en la consulta
            $error_message = "Hubo un error en la consulta. Por favor, intente más tarde.";
        }
    }
}

// Mostrar errores (si los hay)
if (!empty($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>
           <!-- Menú de navegación -->
  <header>
    <nav class="navbar">
      <div class="logo">Desarrollo de aplicaciones web</div>
      <ul class="nav-links">
       <li><a href="index.html">Inicio</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="registro.php">Registro</a></li>
      </ul>
    </nav>
  </header>
    <!-- cuerpo -->
<body_l>
  <div class="login-container">
    <h1>Iniciar Sesión</h1>
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" required placeholder="ejemplo@correo.com">
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="contrasena" required placeholder="••••••••">
      </div>
      <button type="submit" class="btn">Ingresar</button>
      <p class="register-link">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </form>
  </div>
</body_l>

</html>
