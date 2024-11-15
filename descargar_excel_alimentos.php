<?php
// Conexión a la base de datos
$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die('Could not connect to the database server: ' . mysqli_connect_error());

// Consulta para obtener los registros
$sql = "SELECT * FROM ivc_alimentos"; // Cambia 'ivc_agua' por el nombre de tu tabla
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"ivc_alimentos_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
        <th>id</th>
        <th>nombre del tecnico saneamiento</th>
        <th>municipio</th>
        <th>nombre de establecimiento</th>
        <th>nombre del representante legal</th>
        <th>identificacion cedula y/o nit</th>
        <th>direccion del establecimiento</th>
        <th>area</th>
        <th>telefono</th>
        <th>correo electronico</th>
        <th>categoria establecimiento</th>
        <th>seleccione el tipo de establecimiento</th>
        <th>fecha de visita actual</th>
        <th>concepto sanitario</th>
        <th>porcentaje de cumplimiento</th>
        <th>motivo de la visita</th>
        <th>verificacion de rotulado</th>
        <th>numero de rotulados realizados</th>
        <th>establecimiento cuenta con la documentacion si no</th>
      </tr>";

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre_del_tecnico_saneamiento']}</td>
                <td>{$row['municipio']}</td>
                <td>{$row['nombre_de_establecimiento']}</td>
                <td>{$row['nombre_del_representante_legal']}</td>
                <td>{$row['identificacion_cedula_y_o_nit']}</td>
                <td>{$row['direccion_del_establecimiento']}</td>
                <td>{$row['area']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['correo_electronico']}</td>
                <td>{$row['categoria_establecimiento']}</td>
                <td>{$row['seleccione_el_tipo_de_establecimiento']}</td>
                <td>{$row['fecha_de_visita_actual']}</td>
                <td>{$row['concepto_sanitario']}</td>
                <td>{$row['porcentaje_de_cumplimiento']}</td>
                <td>{$row['motivo_de_la_visita']}</td>
                <td>{$row['verificacion_de_rotulado']}</td>
                <td>{$row['numero_de_rotulados_realizados']}</td>
                <td>{$row['establecimiento_cuenta_con_la_documentacion_si_no']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='15'>0 resultados</td></tr>";
}

// Cerrar la tabla
echo "</table>";

// Cerrar la conexión a la base de datos
$con->close();
?>
