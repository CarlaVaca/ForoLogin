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
        <li><a href="login.html">Login</a></li>
        <li><a href="registro.html">Registro</a></li>
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
        <input type="password" id="password" name="password" required placeholder="••••••••">
      </div>
      <button type="submit" class="btn">Ingresar</button>
      <p class="register-link">¿No tienes cuenta? <a href="registro.html">Regístrate aquí</a></p>
    </form>
  </div>
</body_l>

</html>
