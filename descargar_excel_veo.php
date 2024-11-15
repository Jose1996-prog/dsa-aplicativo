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
$sql = "SELECT * FROM ivc_veo";
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"ivc_veo_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
            <th>Item</th>
            <th>Nombre del tecnico saneamiento</th>
            <th>fecha visita</th>
            <th>municipio</th>
            <th>Categoria establecimiento</th>
            <th>Tipo de establecimiento</th>
            <th>Nombre del establecimiento</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Area</th>
            <th>Nombre del representante legal</th>
            <th>Cedula</th>
            <th>Nit</th>
            <th>Tipo de persona</th>
            <th>Cuenta con la documentacion</th>
            <th>Motivo de la visita</th>
            <th>Porcentaje de cumplimiento</th>
            <th>Concepto sanitario</th>
            <th>Visitas</th>
      </tr>";

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nombre_del_tecnico_saneamiento']}</td>
            <td>{$row['fecha_visita']}</td>
            <td>{$row['municipio']}</td>
            <td>{$row['categoria_establecimiento']}</td>
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
            <td>{$row['cuenta_con_la_documentacion']}</td>
            <td>{$row['motivo_de_la_visita']}</td>
            <td>{$row['porcentaje_de_cumplimiento']}</td>
            <td>{$row['concepto_sanitario']}</td>
            <td>{$row['visitas']}</td>

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
