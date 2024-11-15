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
$sql = "SELECT * FROM asistencia_produccion_limpia"; // Cambia 'ivc_agua' por el nombre de tu tabla
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"asistencias_produccion_limpia_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Encargado visita</th>
        <th>Cargo</th>
        <th>Dimension</th>
        <th>Componente</th>
        <th>Municipio</th>
        <th>Institucion</th>
        <th>Representante Institucional</th>
        <th>Direccion</th>
        <th>Correo Electronico</th>
        <th>Telefono</th>
        <th>Persona Entrevistada</th>
        <th>Cargo del Entrevistado</th>
        <th>Teléfono del Entrevistado</th>
        <th>Correo Electronico del Entrevistado</th>
        <th>Objetivo de la Visita</th>
        <th>Desarrollo</th>
        <th>Compromisos</th>
        <th>Nombre Funcionario Entidad</th>
        <th>Cargo Funcionario Entidad</th>
        <th>Nombre Funcionario Departamento</th>
        <th>Cargo Funcionario Departamento</th>
      </tr>";

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['fecha']}</td>
                <td>{$row['encargado_visita']}</td>
                <td>{$row['cargo']}</td>
                <td>{$row['dimension']}</td>
                <td>{$row['componente']}</td>
                <td>{$row['municipio']}</td>
                <td>{$row['institucion']}</td>
                <td>{$row['rep_institucional']}</td>
                <td>{$row['direccion']}</td>
                <td>{$row['correo_elec']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['persona_entrevistada']}</td>
                <td>{$row['cargo_del_entrevistado']}</td>
                <td>{$row['telefono_del_entrevistado']}</td>
                <td>{$row['correo_elec_entrevistado']}</td>
                <td>{$row['objetivo_de_la_visita']}</td>
                <td>{$row['desarrollo']}</td>
                <td>{$row['compromisos']}</td>
                <td>{$row['nombre_funcionario_entidad']}</td>
                <td>{$row['cargo_funcionario_entidad']}</td>
                <td>{$row['nombre_funcionario_departamento']}</td>
                <td>{$row['cargo_funcionario_departamento']}</td>

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
