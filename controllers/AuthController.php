<?php
session_start();
require_once '../config/database.php';
require_once '../models/Usuario.php';

class AuthController {
    private $db;
    private $usuarioModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuarioModel = new Usuario($this->db);
    }

    public function login($email, $password) {
        if(empty($email) || empty($password)) {
            return ["status" => "error", "message" => "Por favor, complete todos los campos."];
        }

        $user = $this->usuarioModel->getUserByEmail($email);

        if($user && password_verify($password, $user['password_hash'])) {
            // Regenerar ID de sesión por seguridad (previene Session Fixation)
            session_regenerate_id(true);
            
            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['apellido'] = $user['apellido'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['rol'] = $user['rol_nombre'];

            return ["status" => "success", "message" => "Autenticación exitosa."];
        }

        return ["status" => "error", "message" => "Credenciales incorrectas o usuario inactivo."];
    }
}
?>