<?php
$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

// Crear una conexión a la base de datos
$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

// Verificar conexión
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

// Inicializar variable para el número de documento
$numero_de_documento = '';

// Verificar si se ha enviado un número de documento y no está vacío
if (isset($_POST['numero_de_documento']) && !empty($_POST['numero_de_documento'])) {
    $numero_de_documento = $_POST['numero_de_documento'];

    // Preparar la consulta SQL
    $sql = "SELECT * FROM ins_saneamiento WHERE numero_de_documento = ?";

    // Preparar y ejecutar la consulta
    $stmt = $con->prepare($sql);

    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $con->error);
    }

    // Enlazar los parámetros
    $stmt->bind_param('i', $numero_de_documento);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró un registro
    if ($result->num_rows > 0) {
        // Mostrar los datos del registro
        echo '<h2 style="text-align: center;">Datos del Registro</h2>';
        echo '<div style="display: flex; justify-content: center;">';
        echo '<table border="1" style="border-collapse: collapse; width: 80%; text-align: left;">';
        echo '<tr><th colspan="2" style="background-color: #f2f2f2;">Detalles del Registro</th></tr>';

        while ($row = $result->fetch_assoc()) {
            // Mostrar cada fila de datos
            foreach ($row as $key => $value) {
                echo '<tr><td><strong>' . htmlspecialchars(ucwords(str_replace('_', ' ', $key))) . ':</strong></td><td>' . htmlspecialchars($value) . '</td></tr>';
            }
        }

        echo '</table>';
        echo '</div>';
    } else {
        echo "<p style='text-align: center;'>No se encontraron registros con el número de documento proporcionado.</p>";
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$con->close();
?>


<!-- Formulario HTML para buscar el registro -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="number"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Buscar Registro por Número de Documento</h1>
    <form method="post" action="read_saneamiento_ins.php">
        <label for="numero_de_documento">Número de Documento:</label>
        <input type="number" id="numero_de_documento" name="numero_de_documento" required>
        <button type="submit">Buscar</button>
    </form>
</body>
</html>

