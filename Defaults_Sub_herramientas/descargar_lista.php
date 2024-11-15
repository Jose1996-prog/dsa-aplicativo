<?php
// Conexión a la base de datos
$host = "localhost";
$port = 3306;
$socket = "";
$user = "root";
$password = "1996";
$dbname = "calidad_agua";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die('Could not connect to the database server: ' . mysqli_connect_error());

// Consulta para obtener los registros
$sql = "SELECT * FROM ivc_agua"; // Cambia 'tu_tabla' por el nombre de tu tabla
$result = $con->query($sql);

// Configurar la cabecera para descarga de CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="ivc_agua_listado.csv"');

// Abrir el flujo de salida
$output = fopen('php://output', 'w');

// Escribir la cabecera del archivo CSV
fputcsv($output, array('item',
'municipio',
'fecha_de_visita',
'razon_social',
'nit_rut_cc',
'representante_legal',
'documento',
'telefono',
'e_mail',
'irabapp',
'nivel_de_riesgo',
'bpspp',
'nivel_de_riesgo_2',
'quien_realizo_la_visita',
'autocontrol')); // Cambia los nombres de las columnas por los de tu tabla

// Escribir los registros en el CSV
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
} else {
    echo "0 resultados";
}

// Cerrar el flujo
fclose($output);
$con->close();
?>
