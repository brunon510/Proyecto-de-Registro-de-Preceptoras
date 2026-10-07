<?php
header("Content-Type: application/json; charset=UTF-8");
require_once '../controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    if(isset($data->email) && isset($data->password)) {
        $auth = new AuthController();
        $response = $auth->login($data->email, $data->password);
        
        http_response_code($response['status'] === 'success' ? 200 : 401);
        echo json_encode($response);
    } else {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Datos incompletos."]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Método no permitido."]);
}
?>