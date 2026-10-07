<?php
session_start();

// Proteger la ruta
if(!isset($_SESSION['id_usuario'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - CEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
<nav class="navbar navbar-dark" style="background-color: #3D2B22;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">CEN - Módulo de Inscripción</a>
        <div class="d-flex align-items-center text-white">
            <span class="me-3">Rol: <?php echo htmlspecialchars($_SESSION['rol']); ?></span>
            <a href="../api/logout.php" class="btn btn-sm btn-outline-light">Cerrar Sesión</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">¡Bienvenido(a), <?php echo htmlspecialchars($_SESSION['nombre'] . ' ' . $_SESSION['apellido']); ?>!</h2>
            <p class="card-text text-muted">Sesión iniciada correctamente con el email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            <hr>
            <p>Este es el panel de gestión académica protegido.</p>
        </div>
    </div>
</div>

</body>
</html>