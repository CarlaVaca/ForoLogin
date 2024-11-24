<?php
// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no está iniciado, redirigir a login.php
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería</title>
    <link rel="stylesheet" href="styles.css">
</head>
     <!-- Menú de navegación -->
  <header>
    <nav class="navbar">
      <div class="logo">Desarrollo de aplicaciones web</div>
      <ul class="nav-links">
        <li><a href="index.html">Inicio</a></li>
        <li><a href="galeria.php">Galeria</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="registro.php">Registro</a></li>
      </ul>
    </nav>
  </header>
<body_g>

    <header>
        <h1>Bienvenido a la Galería</h1>
        <p>¡Hola, <?php echo $_SESSION['user_name']; ?>! Esta es tu galería personal.</p>
        <a href="logout.php">Cerrar sesión</a>
    </header>

    <div class="container">
        <h1>Galería</h1>
        <table class="gallery-table">
            <tr>
                <th>Imagen 1</th>
                <th>Imagen 2</th>
                <th>Imagen 3</th>
            </tr>
            <tr>
                <td><img src="img/p1.jpg" alt="Imagen 1" class="gallery-image"></td>
                <td><img src="img/p2.jpg" alt="Imagen 2" class="gallery-image"></td>
                <td><img src="img/p3.jpg" alt="Imagen 3" class="gallery-image"></td>
                </tr>
            <tr>
                <td><img src="img/p4.jpg" alt="Imagen 7" class="gallery-image"></td>
                <td><img src="img/p5.jpg" alt="Imagen 8" class="gallery-image"></td>
                <td><img src="img/p6.jpg" alt="Imagen 9" class="gallery-image"></td>
            </tr>
        </table>
    </div>

</body_g>
</html>
