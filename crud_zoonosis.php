<?php

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

// Crear conexión
$con = new mysqli($host, $user, $password, $dbname, $port, $socket) 
    or die ('No se pudo conectar al servidor de base de datos: ' . mysqli_connect_error());

// Obtener datos del formulario

$id = $_POST['id'] ?? '';
$codigo = $_POST['codigo'] ?? '';
$municipio = $_POST['municipio'] ?? '';
$numero_de_inscripcion = $_POST['numero_de_inscripcion'] ?? '';
$nombre_del_establecimiento = $_POST['nombre_del_establecimiento'] ?? '';
$nombre_del_propietario = $_POST['nombre_del_propietario'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$tipo_de_establecimiento = $_POST['tipo_de_establecimiento'] ?? '';
$consultorio_veter = $_POST['consultorio_veter'] ?? '';
$clinicas_veter = $_POST['clinicas_veter'] ?? '';
$guarderia_veter = $_POST['guarderia_veter'] ?? '';
$agropecuarias = $_POST['agropecuarias'] ?? '';
$venta_de_alimentos_concentrado = $_POST['venta_de_alimentos_concentrado'] ?? '';

$accion = $_POST['accion'] ?? '';

// Función para limpiar los datos de entrada
function limpiar_dato($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

$id = limpiar_dato($_POST['id'] ?? '');
$codigo = limpiar_dato($_POST['codigo'] ?? '');
$municipio = limpiar_dato($_POST['municipio'] ?? '');
$numero_de_inscripcion = limpiar_dato($_POST['numero_de_inscripcion'] ?? '');
$nombre_del_establecimiento = limpiar_dato($_POST['nombre_del_establecimiento'] ?? '');
$nombre_del_propietario = limpiar_dato($_POST['nombre_del_propietario'] ?? '');
$direccion = limpiar_dato($_POST['direccion'] ?? '');
$tipo_de_establecimiento = limpiar_dato($_POST['tipo_de_establecimiento'] ?? '');
$consultorio_veter = limpiar_dato($_POST['consultorio_veter'] ?? '');
$clinicas_veter = limpiar_dato($_POST['clinicas_veter'] ?? '');
$guarderia_veter = limpiar_dato($_POST['guarderia_veter'] ?? '');
$agropecuarias = limpiar_dato($_POST['agropecuarias'] ?? '');
$venta_de_alimentos_concentrado = limpiar_dato($_POST['venta_de_alimentos_concentrado'] ?? '');

switch ($accion) {
    case "Registrar":
        $sql = "INSERT INTO ivc_zoonosis (codigo,
                                        municipio,
                                        numero_de_inscripcion,
                                        nombre_del_establecimiento,
                                        nombre_del_propietario,
                                        direccion,
                                        tipo_de_establecimiento,
                                        consultorio_veter,
                                        clinicas_veter,
                                        guarderia_veter,
                                        agropecuarias,
                                        venta_de_alimentos_concentrado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssss",
        $codigo,
        $municipio,
        $numero_de_inscripcion,
        $nombre_del_establecimiento,
        $nombre_del_propietario,
        $direccion,
        $tipo_de_establecimiento,
        $consultorio_veter,
        $clinicas_veter,
        $guarderia_veter,
        $agropecuarias,
        $venta_de_alimentos_concentrado        
        );

        if ($stmt->execute()) {
            echo "Nuevo registro ingresado con éxito. ";
            echo '<p>Puedes verificarlo presionando <a href="read&delete_zoonosis.php">aquí</a> y buscar o eliminar el registro.</p>';
            echo 'Presiona <a href="add_zoonosis.php">aquí</a> si deseas insertar un nuevo registro.';
            echo '<p>O presiona <a href="../amb_1_index/Inicio_zoonosis.html">aquí</a> si deseas ir menú principal del programa.</p>';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $stmt->close();
        break;

    }

$con->close();
?>
