<?php
session_start();
if(isset($_SESSION['id_usuario'])) {
    header("Location: views/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CEN</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-card shadow-lg row w-100">
        
        <!-- Panel Izquierdo -->
        <div class="col-md-6 panel-left d-flex flex-column justify-content-between p-5 text-white">
            <div>
                <div class="d-flex align-items-center gap-2 mb-4">
                    <span class="badge badge-custom rounded-pill">CEN - MÓDULO DE INSCRIPCIÓN</span>
                    <span class="badge badge-custom rounded-pill">v1.0</span>
                </div>
                <h1 class="display-4 fw-bold mb-3">¡Hola!</h1>
                <p class="fs-5">Iniciá sesión para acceder al panel de gestión académica del CENTRO EDUCATIVO NONOGASTA.</p>
            </div>
            
            <div class="text-center my-4">
                <!-- Asegúrate de tener una imagen en assets/img/logo.png -->
                <div class="logo-placeholder bg-white rounded-circle d-inline-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-graduation-cap text-brown fs-1"></i>
                </div>
                <p class="mt-3 fw-bold small text-uppercase" style="letter-spacing: 1px;">Centro Educativo Nonogasta<br>La Rioja C.E.N.</p>
            </div>

            <div class="footer-left d-flex align-items-center gap-2">
                <i class="fa-solid fa-shield-halved"></i>
                <small>Seguridad activa - Sesión cifrada</small>
            </div>
        </div>

        <!-- Panel Derecho -->
        <div class="col-md-6 panel-right p-5 bg-cream">
            <div class="d-flex flex-column h-100 justify-content-center">
                <h2 class="fw-bold mb-1">Iniciar sesión</h2>
                <p class="text-muted mb-4">Usá tu cuenta institucional de preceptoría para continuar.</p>

                <!-- Contenedor de Alertas -->
                <div id="alertBox" class="alert d-none" role="alert"></div>

                <form id="loginForm">
                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Email institucional</label>
                        <div class="input-group input-custom rounded-pill overflow-hidden shadow-sm">
                            <span class="input-group-text border-0 bg-transparent text-muted ms-2">
                                <i class="fa-regular fa-envelope"></i>
                            </span>
                            <input type="email" id="email" class="form-control border-0 bg-transparent" placeholder="usuario@cen.edu.ar" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña</label>
                        <div class="input-group input-custom rounded-pill overflow-hidden shadow-sm">
                            <span class="input-group-text border-0 bg-transparent text-muted ms-2">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" id="password" class="form-control border-0 bg-transparent" placeholder="••••••••" required>
                            <span class="input-group-text border-0 bg-transparent text-muted me-2" id="togglePassword" style="cursor: pointer;">
                                <i class="fa-regular fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Forgot Password -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="#" class="text-decoration-none text-muted small fw-bold custom-link">¿Olvidaste tu contraseña?</a>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-mustard w-100 rounded-pill py-2 fw-bold text-uppercase" id="btnSubmit">
                        Entrar
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div>

<script src="assets/js/login.js"></script>
</body>
</html>