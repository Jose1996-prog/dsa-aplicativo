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
$sql = "SELECT * FROM ivc_sustancias_quimicas";
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"ivc_sustancias_quimicas_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
            <th>Item</th>
            <th>Tecnico Saneamiento</th>
            <th>Fecha Visita</th>
            <th>Municipio</th>
            <th>Categoria</th>
            <th>Tipo De Establecimiento</th>
            <th>Nombre Del Establecimiento</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Area</th>
            <th>Nombre Del Representante Legal</th>
            <th>Cedula</th>
            <th>Nit</th>
            <th>Tipo De Persona</th>
            <th>Documentacion</th>
            <th>Motivo De La Visita</th>
            <th>Cumplimiento Porcentaje</th>
            <th>Concepto Sanitario</th>
            <th>Numero Visitas</th>
      </tr>";

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['tecnico_saneamiento']}</td>
                <td>{$row['fecha_visita']}</td>
                <td>{$row['municipio']}</td>
                <td>{$row['categoria']}</td>
                <td>{$row['tipo_de_establecimiento']}</td>
                <td>{$row['nombre_del_establecimiento']}</td>
                <td>{$row['direccion']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['correo']}</td>
                <td>{$row['area']}</td>
                <td>{$row['nombre_del_representante_legal']}</td>
                <td>{$row['cedula']}</td>
                <td>{$row['nit']}</td>
                <td>{$row['tipo_de_persona']}</td>
                <td>{$row['documentacion']}</td>
                <td>{$row['motivo_de_la_visita']}</td>
                <td>{$row['cumplimiento_porcentaje']}</td>
                <td>{$row['concepto_sanitario']}</td>
                <td>{$row['numero_visitas']}</td>

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
