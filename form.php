<?php
Header('Content-Type: application/json');
require_once 'bd.php';

$datos = json_decode(file_get_contents("php://input"), true);

if (isset($datos['nombre'], $datos['correo'], $datos['fechanacimiento'], $datos['contrasena'])) {
    $nombre = trim($datos['nombre']);
    $correo = trim($datos['correo']);
    $fecha = $datos['fechanacimiento'];
    $contrasena = password_hash($datos['contrasena'], PASSWORD_DEFAULT); // encriptado seguro

    $conn = obtenerConexion();

    // Evita correos duplicados
    $check = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $check->bind_param("s", $correo);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo json_encode(["exito" => false, "mensaje" => "El correo ya se encuentra registrado."]);
        $check->close();
        $conn->close();
        exit;
    }
    $check->close();

    // Insertando nuevo usuario
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, fechanacimiento, contrasena) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $correo, $fecha, $contrasena);

    if ($stmt->execute()) {
        echo json_encode(["exito" => true]);
    } else {
        echo json_encode(["exito" => false, "mensaje" => "Error al guardar."]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["exito" => false, "mensaje" => "Datos incompletos."]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $fecha = $_POST['fechanacimiento'];
    $contrasena = $_POST['contrasena'];

    $errores = [];

    // VALIDACIONES 
    if (empty($nombre)) {
        $errores[] = "El nombre completo es obligatorio.";
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    if (empty($fecha)) {
        $errores[] = "La fecha de nacimiento es obligatoria.";
    } 
    
    if (strlen($contrasena) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    if (count($errores) > 0) {
        echo "<h3>Errores en el formulario:</h3><ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul><a href='javascript:history.back()'>Volver al formulario</a>";
    } else {
        echo "<h3>Registrado con éxito</h3>";

    }
} else {
    echo "El Acceso no es permitido.";
}

?>