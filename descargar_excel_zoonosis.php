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
$sql = "SELECT * FROM ivc_zoonosis";
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"ivc_zoonosis_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
            <th>Item</th>
            <th>Codigo</th>
            <th>Municipio</th>
            <th>Numero de Inscripcion</th>
            <th>Nombre del Establecimiento</th>
            <th>Nombre del Propietario</th>
            <th>Direccion</th>
            <th>Tipo de Establecimiento</th>
            <th>Consultorio Veterinario</th>
            <th>Clinicas Veterinarias</th>
            <th>Guarderias Veterinarias</th>
            <th>Agropecuarias</th>
            <th>Venta de Alimentos Concentrados</th>
      </tr>";

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['codigo']}</td>
                <td>{$row['municipio']}</td>
                <td>{$row['numero_de_inscripcion']}</td>
                <td>{$row['nombre_del_establecimiento']}</td>
                <td>{$row['nombre_del_propietario']}</td>
                <td>{$row['direccion']}</td>
                <td>{$row['tipo_de_establecimiento']}</td>
                <td>{$row['consultorio_veter']}</td>
                <td>{$row['clinicas_veter']}</td>
                <td>{$row['guarderia_veter']}</td>
                <td>{$row['agropecuarias']}</td>
                <td>{$row['venta_de_alimentos_concentrado']}</td>

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
