<?php
// Conexión a la base de datos
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

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die('Could not connect to the database server: ' . mysqli_connect_error());

// Consulta para obtener los registros
$sql = "SELECT * FROM ivc_agua"; // Cambia 'ivc_agua' por el nombre de tu tabla
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"ivc_agua_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
        <th>Item</th>
        <th>Municipio</th>
        <th>Fecha de Visita</th>
        <th>Razon Social</th>
        <th>NIT/RUT/CC</th>
        <th>Representante Legal</th>
        <th>Documento</th>
        <th>Telefono</th>
        <th>E-Mail</th>
        <th>IRABAPP</th>
        <th>Nivel de Riesgo</th>
        <th>BPSPP</th>
        <th>Nivel de Riesgo 2</th>
        <th>Quien Realizo la Visita</th>
        <th>Autocontrol</th>
      </tr>";

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['item']}</td>
                <td>{$row['municipio']}</td>
                <td>{$row['fecha_de_visita']}</td>
                <td>{$row['razon_social']}</td>
                <td>{$row['nit_rut_cc']}</td>
                <td>{$row['representante_legal']}</td>
                <td>{$row['documento']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['e_mail']}</td>
                <td>{$row['irabapp']}</td>
                <td>{$row['nivel_de_riesgo']}</td>
                <td>{$row['bpspp']}</td>
                <td>{$row['nivel_de_riesgo_2']}</td>
                <td>{$row['quien_realizo_la_visita']}</td>
                <td>{$row['autocontrol']}</td>
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
