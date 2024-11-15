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
$fecha = $_POST['fecha'] ?? '';
$encargado_visita = $_POST['encargado_visita'] ?? '';
$cargo = $_POST['cargo'] ?? '';
$dimension = $_POST['dimension'] ?? '';
$componente = $_POST['componente'] ?? '';
$municipio = $_POST['municipio'] ?? '';
$institucion = $_POST['institucion'] ?? '';
$rep_institucional = $_POST['rep_institucional'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$correo_elec = $_POST['correo_elec'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$persona_entrevistada = $_POST['persona_entrevistada'] ?? '';
$cargo_del_entrevistado = $_POST['cargo_del_entrevistado'] ?? '';
$telefono_del_entrevistado = $_POST['telefono_del_entrevistado'] ?? '';
$correo_elec_entrevistado = $_POST['correo_elec_entrevistado'] ?? '';
$objetivo_de_la_visita = $_POST['objetivo_de_la_visita'] ?? '';
$desarrollo = $_POST['desarrollo'] ?? '';
$compromisos = $_POST['compromisos'] ?? '';
$nombre_funcionario_entidad = $_POST['nombre_funcionario_entidad'] ?? '';
$cargo_funcionario_entidad = $_POST['cargo_funcionario_entidad'] ?? '';
$nombre_funcionario_departamento = $_POST['nombre_funcionario_departamento'] ?? '';
$cargo_funcionario_departamento = $_POST['cargo_funcionario_departamento'] ?? '';

$accion = $_POST['accion'] ?? '';

// Función para limpiar los datos de entrada
function limpiar_dato($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

$id = limpiar_dato($_POST['id'] ?? '');
$fecha = limpiar_dato($_POST['fecha'] ?? '');
$encargado_visita = limpiar_dato($_POST['encargado_visita'] ?? '');
$cargo = limpiar_dato($_POST['cargo'] ?? '');
$dimension = limpiar_dato($_POST['dimension'] ?? '');
$componente = limpiar_dato($_POST['componente'] ?? '');
$municipio = limpiar_dato($_POST['municipio'] ?? '');
$institucion = limpiar_dato($_POST['institucion'] ?? '');
$rep_institucional = limpiar_dato($_POST['rep_institucional'] ?? '');
$direccion = limpiar_dato($_POST['direccion'] ?? '');
$correo_elec = limpiar_dato($_POST['correo_elec'] ?? '');
$telefono = limpiar_dato($_POST['telefono'] ?? '');
$persona_entrevistada = limpiar_dato($_POST['persona_entrevistada'] ?? '');
$cargo_del_entrevistado = limpiar_dato($_POST['cargo_del_entrevistado'] ?? '');
$telefono_del_entrevistado = limpiar_dato($_POST['telefono_del_entrevistado'] ?? '');
$correo_elec_entrevistado = limpiar_dato($_POST['correo_elec_entrevistado'] ?? '');
$objetivo_de_la_visita = limpiar_dato($_POST['objetivo_de_la_visita'] ?? '');
$desarrollo = limpiar_dato($_POST['desarrollo'] ?? '');
$compromisos = limpiar_dato($_POST['compromisos'] ?? '');
$nombre_funcionario_entidad = limpiar_dato($_POST['nombre_funcionario_entidad'] ?? '');
$cargo_funcionario_entidad = limpiar_dato($_POST['cargo_funcionario_entidad'] ?? '');
$nombre_funcionario_departamento = limpiar_dato($_POST['nombre_funcionario_departamento'] ?? '');
$cargo_funcionario_departamento = limpiar_dato($_POST['cargo_funcionario_departamento'] ?? '');

switch ($accion) {
    case "Registrar":
        $sql = "INSERT INTO asistencia_cambio_climatico (
            fecha,
            encargado_visita,
            cargo,
            dimension,
            componente,
            municipio,
            institucion,
            rep_institucional,
            direccion,
            correo_elec,
            telefono,
            persona_entrevistada,
            cargo_del_entrevistado,
            telefono_del_entrevistado,
            correo_elec_entrevistado,
            objetivo_de_la_visita,
            desarrollo,
            compromisos,
            nombre_funcionario_entidad,
            cargo_funcionario_entidad,
            nombre_funcionario_departamento,
            cargo_funcionario_departamento
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssssssssssssss",
                $fecha,
                $encargado_visita,
                $cargo,
                $dimension,
                $componente,
                $municipio,
                $institucion,
                $rep_institucional,
                $direccion,
                $correo_elec,
                $telefono,
                $persona_entrevistada,
                $cargo_del_entrevistado,
                $telefono_del_entrevistado,
                $correo_elec_entrevistado,
                $objetivo_de_la_visita,
                $desarrollo,
                $compromisos,
                $nombre_funcionario_entidad,
                $cargo_funcionario_entidad,
                $nombre_funcionario_departamento,
                $cargo_funcionario_departamento
            );

        if ($stmt->execute()) {
            echo "Nuevo registro ingresado con éxito. ";
            echo '<p>Puedes verificarlo presionando <a href="read&delete_climatico.php">aquí</a> y buscar o eliminar el registro.</p>';
            echo 'Presiona <a href="add_climatico.php">aquí</a> si deseas insertar un nuevo registro.';
            echo '<p>O presiona <a href="../amb_1_index/Inicio_cambio_climatico.html">aquí</a> si deseas ir menú principal del programa.</p>';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $stmt->close();
        break;

    }

$con->close();
?>
