<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input {
            margin-bottom: 15px;
            width: 100%;
        }

        input[type="text"], input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        a input[type="button"] {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }

        a input[type="button"]:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <form action="login_veo_RD.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" maxlength="5" required>
        <br>
        <label for="contrasenha">Contraseña:</label>
        <input type="password" id="contrasenha" name="contrasenha" maxlength="4" required>
        <br>
        
        <button type="submit">Ingresar</button>

        <a href="../amb_1_index/Inicio_veo.html">
        <input type="button" value="Inicio">
    </form>
</body>
</html>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

// Crear conexión
$con = new mysqli($host, $user, $password, $dbname, $port, $socket) 
    or die ('No se pudo conectar al servidor de base de datos: ' . mysqli_connect_error());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasenha = $_POST['contrasenha'];

    $stmt = $con->prepare('SELECT * FROM users_veo WHERE usuario = ?');
    if ($stmt) {
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($contrasenha == $user['contrasenha']) { // Comparación directa porque la contraseña está almacenada como int
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['veo'] = $user['veo'];
                header('Location: read&delete_veo.php'); // Redirige al archivo que deseas
                exit;
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
    } else {
        echo "Error en la consulta: " . $con->error;
    }
}

$con->close();
?>
