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
$sql = "SELECT * FROM ivc_saneamiento";
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"ivc_saneamiento_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
            <th>ID</th>
            <th>Nombre Del Tecnico Saneamiento</th>
            <th>Municipio</th>
            <th>Categoria Establecimiento</th>
            <th>Tipo De Establecimiento</th>
            <th>Motivo De La Visita</th>
            <th>Fecha Visita Actual</th>
            <th>Nombre Del Establecimiento</th>
            <th>Direccion Del Establecimiento</th>
            <th>Area</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Tipo De Persona</th>
            <th>Nombre Del Representante Legal</th>
            <th>Identificacion Cedula</th>
            <th>¿Tiene Nit el Establecimiento?</th>
            <th>Digite El Nit</th>
            <th>Porcentaje De Cumplimiento</th>
            <th>Concepto Sanitario</th>
            <th>Numero De Visita</th>
            <th>Establecimiento Cuenta Con La Documentacion</th>
      </tr>";

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre_del_tecnico_saneamiento']}</td>
                <td>{$row['municipio']}</td>
                <td>{$row['categoria_establecimiento']}</td>
                <td>{$row['tipo_de_establecimiento']}</td>
                <td>{$row['motivo_de_la_visita']}</td>
                <td>{$row['fecha_visita_actual']}</td>
                <td>{$row['nombre_del_establecimiento']}</td>
                <td>{$row['direccion_del_establecimiento']}</td>
                <td>{$row['area']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['correo']}</td>
                <td>{$row['tipo_de_persona']}</td>
                <td>{$row['nombre_del_representante_legal']}</td>
                <td>{$row['identificacion_cedula']}</td>
                <td>{$row['nit_del_establecimiento']}</td>
                <td>{$row['digite_el_nit']}</td>
                <td>{$row['porcentaje_de_cumplimiento']}</td>
                <td>{$row['concepto_sanitario']}</td>
                <td>{$row['numero_de_visita']}</td>
                <td>{$row['establecimiento_cuenta_con_la_documentacion']}</td>

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
