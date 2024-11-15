<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['alimentos'])) {
    header('Location: login_alimentos_ins_RD.php');
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
    'departamento' => 'Departamento',
    'municipio' => 'Municipio',
    'fecha' => 'Fecha',
    'codigo_divipola_departamento' => 'Código DIVIPOLA Departamento',
    'codigo_divipola_municipio' => 'Código DIVIPOLA Municipio',
    'numero_inscripcion' => 'Número de Inscripción',
    'razon_social' => 'Razón Social',
    'nombre_comercial' => 'Nombre Comercial',
    'tipo_documento_de_identificacion' => 'Tipo Documento de Identificación',
    'numero_identificacion_tributaria' => 'Número de Identificación Tributaria',
    'nombre_establecimiento_de_comercio' => 'Nombre Establecimiento de Comercio',
    'nombre_propietario_del_establecimiento' => 'Nombre Propietario del Establecimiento',
    'tipo_documento_per_natural' => 'Tipo Documento PER Natural',
    'numero_de_documento' => 'Número de Documento',
    'direccion_ubicacion_del_establecimiento' => 'Dirección de Ubicación del Establecimiento',
    'zona' => 'Zona',
    'barrio' => 'Barrio',
    'vereda' => 'Vereda',
    'lugar_de_establecimiento' => 'Lugar de Establecimiento',
    'otro' => 'Otro',
    'cual' => 'Cuál',
    'telefono' => 'Teléfono',
    'fax' => 'Fax',
    'celular' => 'Celular',
    'correo_electronico' => 'Correo Electrónico',
    'direccion_de_notificacion_fisica' => 'Dirección de Notificación Física',
    'direccion_de_notificacion_electronica' => 'Dirección de Notificación Electrónica',
    'autoriza_la_notificacion_electronica' => 'Autoriza la Notificación Electrónica',
    'municipio_de_direccion_de_notificacion' => 'Municipio de Dirección de Notificación',
    'departamento_de_direccion_de_notificacion' => 'Departamento de Dirección de Notificación',
    'preparacion_alimentos' => 'Preparación Alimentos',
    'comedores' => 'Comedores',
    'expendio_de_alimentos' => 'Expendio de Alimentos',
    'grandes_superficies' => 'Grandes Superficies',
    'ensamble_de_alimentos' => 'Ensamble de Alimentos',
    'almacenamiento' => 'Almacenamiento',
    'venta_en_via_publica' => 'Venta en Vía Pública',
    'expendio_de_bebidas_alcoholicas' => 'Expendio de Bebidas Alcohólicas',
    'plaza_de_mercado' => 'Plaza de Mercado',
    'establecimiento_inspeccionado_entidad_territorial_salud' => 'Inspeccionado por Entidad Territorial de Salud',
    'fecha_de_ultima_inspeccion' => 'Fecha de Última Inspección',
    'ultimo_concepto_sanitario_emitio' => 'Último Concepto Sanitario Emitido',
    'funcionario_que_realiza_la_inspeccion' => 'Funcionario que Realiza la Inspección',
    'observaciones_por_autoridad_sanitaria' => 'Observaciones por Autoridad Sanitaria',
    'observaciones_por_responsable_de_la_inscripcion' => 'Observaciones por Responsable de la Inscripción',
    'entregado_por_nombre_completo' => 'Entregado por Nombre Completo',
    'entregado_por_cedula' => 'Entregado por Cédula',

    'en_calidad_de_responsable' => 'En Calidad de Responsable',
    'recibido_por_nombre_completo' => 'Recibido por Nombre Completo',
    'recibido_por_cedula' => 'Recibido por Cédula',

    'en_calidad_de_funcionario' => 'En Calidad de Funcionario',
);

// Validar la opción de orden
if (!array_key_exists($orden, $opciones_orden)) {
    $orden = 'id'; // Valor por defecto si la clave no es válida
}

// Eliminar registro si se ha enviado una solicitud de eliminación
if (isset($_POST['eliminar_id'])) {
    $eliminar_id = intval($_POST['eliminar_id']);
    $delete_sql = "DELETE FROM ins_alimentos WHERE id = ?";
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
$sql = "SELECT * FROM ins_alimentos ORDER BY $orden";
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
<title>Page Title</title>
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
<a href="descargar_excel_ins_alimentos.php" class="btn_btn-primary">Descargar CSV</a>
<a href="logout_alimentos_ins_RD.php" class="logout-button">Cerrar sesión</a>
</body>
</html>
