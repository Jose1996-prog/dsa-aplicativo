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
$sql = "SELECT * FROM ins_alimentos"; // Cambia 'ivc_agua' por el nombre de tu tabla
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"inscripciones_alimentos_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Departamento</th>
        <th>Municipio</th>
        <th>Fecha</th>
        <th>Codigo Divipola Departamento</th>
        <th>Codigo Divipola Municipio</th>
        <th>Numero Inscripcion</th>
        <th>Razon Social</th>
        <th>Nombre Comercial</th>
        <th>Tipo Documento De Identificacion</th>
        <th>Numero Identificacion Tributaria</th>
        <th>Nombre Establecimiento De Comercio</th>
        <th>Nombre Propietario Del Establecimiento</th>
        <th>Tipo Documento Per Natural</th>
        <th>Numero De Documento</th>
        <th>Direccion Ubicacion Del Establecimiento</th>
        <th>Zona</th>
        <th>Barrio</th>
        <th>Vereda</th>
        <th>Lugar De Establecimiento</th>
        <th>Otro</th>
        <th>Cual</th>
        <th>Telefono</th>
        <th>Fax</th>
        <th>Celular</th>
        <th>Correo Electronico</th>
        <th>Direccion De Notificacion Fisica</th>
        <th>Direccion De Notificacion Electronica</th>
        <th>Autoriza La Notificacion Electronica</th>
        <th>Municipio De Direccion De Notificacion</th>
        <th>Departamento De Direccion De Notificacion</th>
        <th>Preparacion Alimentos</th>
        <th>Comedores</th>
        <th>Expendio De Alimentos</th>
        <th>Grandes Superficies</th>
        <th>Ensamble De Alimentos</th>
        <th>Almacenamiento</th>
        <th>Venta En Via Publica</th>
        <th>Expendio De Bebidas Alcoholicas</th>
        <th>Plaza De Mercado</th>
        <th>Establecimiento Inspeccionado Entidad Territorial Salud</th>
        <th>Fecha De Ultima Inspeccion</th>
        <th>Ultimo Concepto Sanitario Emitido</th>
        <th>Funcionario Que Realiza La Inspeccion</th>
        <th>Observaciones Por Autoridad Sanitaria</th>
        <th>Observaciones Por Responsable De La Inscripcion</th>
        <th>Entregado Por Nombre Completo</th>
        <th>Entregado Por Cedula</th>
        <th>En Calidad De Responsable</th>
        <th>Recibido Por Nombre Completo</th>
        <th>Recibido Por Cedula</th>
        <th>En Calidad De Funcionario</th>

      </tr>";

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['departamento']}</td>
                <td>{$row['municipio']}</td>
                <td>{$row['fecha']}</td>
                <td>{$row['codigo_divipola_departamento']}</td>
                <td>{$row['codigo_divipola_municipio']}</td>
                <td>{$row['numero_inscripcion']}</td>
                <td>{$row['razon_social']}</td>
                <td>{$row['nombre_comercial']}</td>
                <td>{$row['tipo_documento_de_identificacion']}</td>
                <td>{$row['numero_identificacion_tributaria']}</td>
                <td>{$row['nombre_establecimiento_de_comercio']}</td>
                <td>{$row['nombre_propietario_del_establecimiento']}</td>
                <td>{$row['tipo_documento_per_natural']}</td>
                <td>{$row['numero_de_documento']}</td>
                <td>{$row['direccion_ubicacion_del_establecimiento']}</td>
                <td>{$row['zona']}</td>
                <td>{$row['barrio']}</td>
                <td>{$row['vereda']}</td>
                <td>{$row['lugar_de_establecimiento']}</td>
                <td>{$row['otro']}</td>
                <td>{$row['cual']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['fax']}</td>
                <td>{$row['celular']}</td>
                <td>{$row['correo_electronico']}</td>
                <td>{$row['direccion_de_notificacion_fisica']}</td>
                <td>{$row['direccion_de_notificacion_electronica']}</td>
                <td>{$row['autoriza_la_notificacion_electronica']}</td>
                <td>{$row['municipio_de_direccion_de_notificacion']}</td>
                <td>{$row['departamento_de_direccion_de_notificacion']}</td>
                <td>{$row['preparacion_alimentos']}</td>
                <td>{$row['comedores']}</td>
                <td>{$row['expendio_de_alimentos']}</td>
                <td>{$row['grandes_superficies']}</td>
                <td>{$row['ensamble_de_alimentos']}</td>
                <td>{$row['almacenamiento']}</td>
                <td>{$row['venta_en_via_publica']}</td>
                <td>{$row['expendio_de_bebidas_alcoholicas']}</td>
                <td>{$row['plaza_de_mercado']}</td>
                <td>{$row['establecimiento_inspeccionado_entidad_territorial_salud']}</td>
                <td>{$row['fecha_de_ultima_inspeccion']}</td>
                <td>{$row['ultimo_concepto_sanitario_emitio']}</td>
                <td>{$row['funcionario_que_realiza_la_inspeccion']}</td>
                <td>{$row['observaciones_por_autoridad_sanitaria']}</td>
                <td>{$row['observaciones_por_responsable_de_la_inscripcion']}</td>
                <td>{$row['entregado_por_nombre_completo']}</td>
                <td>{$row['entregado_por_cedula']}</td>
                <td>{$row['en_calidad_de_responsable']}</td>
                <td>{$row['recibido_por_nombre_completo']}</td>
                <td>{$row['recibido_por_cedula']}</td>
                <td>{$row['en_calidad_de_funcionario']}</td>

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
