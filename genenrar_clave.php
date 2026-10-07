<?php
// Cambia "123456" por la contraseña que quieras usar
$clave_en_texto_plano = "123456";
$hash = password_hash($clave_en_texto_plano, PASSWORD_DEFAULT);

echo "Tu contraseña es: " . $clave_en_texto_plano . "<br>";
echo "Copia y pega este Hash en tu base de datos (SQL): <br><b>" . $hash . "</b>";
?>