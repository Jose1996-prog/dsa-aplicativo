<?php

session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['agua'])) {
    header('Location: login_agua_ins_RD.php');
    exit;
}

// Configuración de la base de datos
$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

// Verificar conexión
if ($con->connect_error) {
    die('Error de conexión: ' . $con->connect_error);
}

// Definir el orden por defecto y las opciones de orden
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'id';
$opciones_orden = array(
    'id' => 'ID',
    'fecha' => 'Fecha',
    'numero_de_inscripcion' => 'Número de Inscripción',
    'tipo_de_establecimiento' => 'Tipo de Establecimiento',
    'nombre_comercial_del_objeto' => 'Nombre Comercial del Objeto',
    'departamento' => 'Departamento',
    'municipio' => 'Municipio',
    'lugar_del_establecimiento' => 'Lugar del Establecimiento',
    'otro' => 'Otro',
    'cual' => 'Cuál',
    'direccion_establecimiento' => 'Dirección del Establecimiento',
    'telefono_establecimiento' => 'Teléfono del Establecimiento',
    'tipo_de_persona' => 'Tipo de Persona',
    'primer_apellido' => 'Primer Apellido',
    'segundo_apellido' => 'Segundo Apellido',
    'nombres' => 'Nombres',
    'documento_de_identificacion' => 'Documento de Identificación',
    'numero_de_documento' => 'Número de Documento',
    'direccion_de_notificacion' => 'Dirección de Notificación',
    'telefonos' => 'Teléfonos',
    'correo_electronico_propietario' => 'Correo Electrónico del Propietario',
    'el_establecimiento_inspeccionado_por_entidad_salud' => 'Inspeccionado por Entidad de Salud',
    'fecha_de_ultima_inspeccion' => 'Fecha de Última Inspección',
    'ultimo_concepto_sanitario' => 'Último Concepto Sanitario',
    'dia_laboral_1' => 'Dia Laboral 1',
    'dia_laboral_2' => 'Dia Laboral 2',
    'hora_laboral_1' => 'Hora Laboral 1',
    'hora_laboral_2' => 'Hora Laboral 2',
    'dia_laboral_3' => 'Dia Laboral 3',
    'dia_laboral_4' => 'Dia Laboral 4',
    'hora_laboral_3' => 'Hora Laboral 3',
    'hora_laboral_4' => 'Hora Laboral 4',
    'establecimiento_inspeccionado_entidad_territorial_salud' => 'Inspeccionado por Entidad Territorial de Salud',
    'fecha_de_ultima_inspeccion_2' => 'Fecha de Última Inspección 2',
    'ultimo_concepto_sanitario_emitio' => 'Último Concepto Sanitario Emitido',
    'nombre' => 'Nombre',
    'cedula' => 'Cédula',
    'cargo' => 'Cargo',
    'telefono' => 'Teléfono',
    'nombre_2' => 'Nombre 2',
    'cedula_2' => 'Cédula 2',
    'cargo_2' => 'Cargo 2',
    'telefono_2' => 'Teléfono 2',
);

// Validar la opción de orden
if (!array_key_exists($orden, $opciones_orden)) {
    $orden = 'id'; // Valor por defecto si la clave no es válida
}

// Eliminar registro si se ha enviado una solicitud de eliminación
if (isset($_POST['eliminar_id'])) {
    $eliminar_id = intval($_POST['eliminar_id']);
    $delete_sql = "DELETE FROM ins_agua WHERE id = ?";
    $stmt = $con->prepare($delete_sql);
    $stmt->bind_param("i", $eliminar_id);
    if ($stmt->execute()) {
        echo "<script>alert('Registro eliminado correctamente');</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro');</script>";
    }
    $stmt->close();
}

// Consulta SQL con ordenamiento dinámico
$sql = "SELECT * FROM ins_agua ORDER BY $orden";
$result = $con->query($sql);

// Mostrar formulario para seleccionar el orden
echo "<form method='GET' style='position:fixed; top:10px; left:10px; background-color:white; padding:10px; border:1px solid black;'>
        <label for='orden'>Ordenar por:</label>
        <select name='orden' id='orden'>";
foreach ($opciones_orden as $clave => $label) {
    $selected = ($clave == $orden) ? 'selected' : '';
    echo "<option value='$clave' $selected>$label</option>";
}
echo "</select>
      <input type='submit' value='Ordenar'>
      </form>";

// Mostrar resultados en una tabla HTML
if ($result->num_rows > 0) {
    echo "<table border='1' style='margin-top:60px;'>
            <tr>
                <th>Acción</th>";
    foreach ($opciones_orden as $clave => $label) {
        echo "<th><a href='?orden=$clave'>$label</a></th>";
    }
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>
                    <form method='POST' onsubmit='return confirm(\"¿Está seguro de que desea eliminar este registro?\");'>
                        <input type='hidden' name='eliminar_id' value='" . $row['id'] . "'>
                        <input type='submit' value='Eliminar'>
                    </form>
                </td>";
        foreach ($row as $campo => $valor) {
            // Usa htmlspecialchars para evitar inyecciones XSS
            echo "<td>" . htmlspecialchars($valor) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Cerrar conexión a la base de datos
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Elimacion de registro, Inscripciones</title>
<style>
.logout-button, .btn_btn-primary {
    display: inline-block;
    padding: 8px 16px;
    background-color: #ff4d4d;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    font-family: Arial, sans-serif;
    cursor: pointer;
    position: absolute;
    top: 10px;
}
.logout-button {
    right: 10px;
}
.btn_btn-primary {
    right: 150px;
}
</style>
</head>
<body>
<a href="descargar_excel_agua_ins.php" class="btn_btn-primary">Descargar CSV</a>
<a href="logout_agua_ins_RD.php" class="logout-button">Cerrar sesión</a>
</body>
</html>
