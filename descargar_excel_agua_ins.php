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
$sql = "SELECT * FROM ins_agua"; // Cambia 'ivc_agua' por el nombre de tu tabla
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"inscripciones_agua_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
        <th>Id</th>
        <th>Fecha</th>
        <th>Numero De Inscripcion</th>
        <th>Tipo De Establecimiento</th>
        <th>Nombre Comercial Del Objeto</th>
        <th>Departamento</th>
        <th>Municipio</th>
        <th>Lugar Del Establecimiento</th>
        <th>Otro</th>
        <th>Cual</th>
        <th>Direccion Establecimiento</th>
        <th>Telefono Establecimiento</th>
        <th>Tipo De Persona</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Nombres</th>
        <th>Documento De Identificacion</th>
        <th>Numero De Documento</th>
        <th>Direccion De Notificacion</th>
        <th>Telefonos</th>
        <th>Correo Electronico Propietario</th>
        <th>El Establecimiento Inspeccionado Por Entidad Salud</th>
        <th>Fecha De Ultima Inspeccion</th>
        <th>Ultimo Concepto Sanitario</th>
        <th>Establecimiento Inspeccionado Entidad Territorial Salud</th>
        <th>Fecha De Ultima Inspeccion 2</th>
        <th>Ultimo Concepto Sanitario Emitio</th>
        <th>Dia Laboral 1</th>
        <th>Dia Laboral 2</th>
        <th>Hora Laboral 1</th>
        <th>Hora Laboral 2</th>
        <th>Dia Laboral 3</th>
        <th>Dia Laboral 4</th>
        <th>Hora Laboral 3</th>
        <th>Hora Laboral 4</th>
        <th>Nombre</th>
        <th>Cedula</th>
        <th>Cargo</th>
        <th>Telefono</th>
        <th>Nombre 2</th>
        <th>Cedula 2</th>
        <th>Cargo 2</th>
        <th>Telefono 2</th>
      </tr>";

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['fecha']}</td>
                <td>{$row['numero_de_inscripcion']}</td>
                <td>{$row['tipo_de_establecimiento']}</td>
                <td>{$row['nombre_comercial_del_objeto']}</td>
                <td>{$row['departamento']}</td>
                <td>{$row['municipio']}</td>
                <td>{$row['lugar_del_establecimiento']}</td>
                <td>{$row['otro']}</td>
                <td>{$row['cual']}</td>
                <td>{$row['direccion_establecimiento']}</td>
                <td>{$row['telefono_establecimiento']}</td>
                <td>{$row['tipo_de_persona']}</td>
                <td>{$row['primer_apellido']}</td>
                <td>{$row['segundo_apellido']}</td>
                <td>{$row['nombres']}</td>
                <td>{$row['documento_de_identificacion']}</td>
                <td>{$row['numero_de_documento']}</td>
                <td>{$row['direccion_de_notificacion']}</td>
                <td>{$row['telefonos']}</td>
                <td>{$row['correo_electronico_propietario']}</td>
                <td>{$row['el_establecimiento_inspeccionado_por_entidad_salud']}</td>
                <td>{$row['fecha_de_ultima_inspeccion']}</td>
                <td>{$row['ultimo_concepto_sanitario']}</td>
                <td>{$row['establecimiento_inspeccionado_entidad_territorial_salud']}</td>
                <td>{$row['fecha_de_ultima_inspeccion_2']}</td>
                <td>{$row['ultimo_concepto_sanitario_emitio']}</td>
                <td>{$row['dia_laboral_1']}</td>
                <td>{$row['dia_laboral_2']}</td>
                <td>{$row['hora_laboral_1']}</td>
                <td>{$row['hora_laboral_2']}</td>
                <td>{$row['dia_laboral_3']}</td>
                <td>{$row['dia_laboral_4']}</td>
                <td>{$row['hora_laboral_3']}</td>
                <td>{$row['hora_laboral_4']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['cedula']}</td>
                <td>{$row['cargo']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['nombre_2']}</td>
                <td>{$row['cedula_2']}</td>
                <td>{$row['cargo_2']}</td>
                <td>{$row['telefono_2']}</td>
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
