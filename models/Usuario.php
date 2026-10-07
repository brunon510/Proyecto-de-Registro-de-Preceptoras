<?php
class Usuario {
    private $conn;
    private $table_name = "usuario";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUserByEmail($email) {
        $query = "SELECT u.id_usuario, u.nombre, u.apellido, u.email, u.password_hash, u.activo, r.nombre as rol_nombre 
                  FROM " . $this->table_name . " u 
                  INNER JOIN rol r ON u.id_rol = r.id_rol 
                  WHERE u.email = :email AND u.activo = 1 LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        return $stmt->fetch();
    }
}
?>