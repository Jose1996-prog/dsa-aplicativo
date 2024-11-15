<?php
$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

// Crear una conexión a la base de datos
$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

// Verificar conexión
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

// Recoger datos del formulario con manejo de errores
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$numero_de_inscripcion = isset($_POST['numero_de_inscripcion']) ? $_POST['numero_de_inscripcion'] : '';
$tipo_de_establecimiento = isset($_POST['tipo_de_establecimiento']) ? $_POST['tipo_de_establecimiento'] : '';
$nombre_comercial_del_objeto = isset($_POST['nombre_comercial_del_objeto']) ? $_POST['nombre_comercial_del_objeto'] : '';
$departamento = isset($_POST['departamento']) ? $_POST['departamento'] : '';
$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : '';
$lugar_del_establecimiento = isset($_POST['lugar_del_establecimiento']) ? $_POST['lugar_del_establecimiento'] : '';
$otro = isset($_POST['otro']) ? $_POST['otro'] : '';
$cual = isset($_POST['cual']) ? $_POST['cual'] : '';
$direccion_establecimiento = isset($_POST['direccion_establecimiento']) ? $_POST['direccion_establecimiento'] : '';
$telefono_establecimiento = isset($_POST['telefono_establecimiento']) ? $_POST['telefono_establecimiento'] : '';
$tipo_de_persona = isset($_POST['tipo_de_persona']) ? $_POST['tipo_de_persona'] : '';
$primer_apellido = isset($_POST['primer_apellido']) ? $_POST['primer_apellido'] : '';
$segundo_apellido = isset($_POST['segundo_apellido']) ? $_POST['segundo_apellido'] : '';
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
$documento_de_identificacion = isset($_POST['documento_de_identificacion']) ? $_POST['documento_de_identificacion'] : '';
$numero_de_documento = isset($_POST['numero_de_documento']) ? $_POST['numero_de_documento'] : '';
$direccion_de_notificacion = isset($_POST['direccion_de_notificacion']) ? $_POST['direccion_de_notificacion'] : '';
$telefonos = isset($_POST['telefonos']) ? $_POST['telefonos'] : '';
$correo_electronico_propietario = isset($_POST['correo_electronico_propietario']) ? $_POST['correo_electronico_propietario'] : '';
$el_establecimiento_inspeccionado_por_entidad_salud = isset($_POST['el_establecimiento_inspeccionado_por_entidad_salud']) ? $_POST['el_establecimiento_inspeccionado_por_entidad_salud'] : '';
$fecha_de_ultima_inspeccion = isset($_POST['fecha_de_ultima_inspeccion']) ? $_POST['fecha_de_ultima_inspeccion'] : '';
$ultimo_concepto_sanitario = isset($_POST['ultimo_concepto_sanitario']) ? $_POST['ultimo_concepto_sanitario'] : '';
$establecimiento_inspeccionado_entidad_territorial_salud = isset($_POST['establecimiento_inspeccionado_entidad_territorial_salud']) ? $_POST['establecimiento_inspeccionado_entidad_territorial_salud'] : '';
$fecha_de_ultima_inspeccion_2 = isset($_POST['fecha_de_ultima_inspeccion_2']) ? $_POST['fecha_de_ultima_inspeccion_2'] : '';
$ultimo_concepto_sanitario_emitio =  isset($_POST['ultimo_concepto_sanitario_emitio']) ? $_POST['ultimo_concepto_sanitario_emitio'] : '';


// Recoger las jornadas laborales
$dia_laboral_1 = isset($_POST['dia_laboral_1']) ? $_POST['dia_laboral_1'] : '';
$dia_laboral_2 = isset($_POST['dia_laboral_2']) ? $_POST['dia_laboral_2'] : '';
$hora_laboral_1 = isset($_POST['hora_laboral_1']) ? $_POST['hora_laboral_1'] : '';
$hora_laboral_2 = isset($_POST['hora_laboral_2']) ? $_POST['hora_laboral_2'] : '';
$dia_laboral_3 = isset($_POST['dia_laboral_3']) ? $_POST['dia_laboral_3'] : '';
$dia_laboral_4 = isset($_POST['dia_laboral_4']) ? $_POST['dia_laboral_4'] : '';
$hora_laboral_3 = isset($_POST['hora_laboral_3']) ? $_POST['hora_laboral_3'] : '';
$hora_laboral_4 = isset($_POST['hora_laboral_4']) ? $_POST['hora_laboral_4'] : '';

// Datos de las personas
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : 0;
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$nombre_2 = isset($_POST['nombre_2']) ? $_POST['nombre_2'] : '';
$cedula_2 = isset($_POST['cedula_2']) ? $_POST['cedula_2'] : 0;
$cargo_2 = isset($_POST['cargo_2']) ? $_POST['cargo_2'] : '';
$telefono_2 = isset($_POST['telefono_2']) ? $_POST['telefono_2'] : '';

// Preparar la consulta SQL
$sql = "INSERT INTO ins_saneamiento (
    fecha, numero_de_inscripcion, tipo_de_establecimiento, nombre_comercial_del_objeto, 
    departamento, municipio, lugar_del_establecimiento, otro, cual, direccion_establecimiento, 
    telefono_establecimiento, tipo_de_persona, primer_apellido, segundo_apellido, nombres, 
    documento_de_identificacion, numero_de_documento, direccion_de_notificacion, telefonos, 
    correo_electronico_propietario, el_establecimiento_inspeccionado_por_entidad_salud, 
    fecha_de_ultima_inspeccion, ultimo_concepto_sanitario, dia_laboral_1, dia_laboral_2, hora_laboral_1, hora_laboral_2, 
    dia_laboral_3, dia_laboral_4, hora_laboral_3, hora_laboral_4, establecimiento_inspeccionado_entidad_territorial_salud, 
    fecha_de_ultima_inspeccion_2, ultimo_concepto_sanitario_emitio, nombre, cedula, cargo, telefono, 
    nombre_2, cedula_2, cargo_2, telefono_2
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar y ejecutar la consulta
$stmt = $con->prepare($sql);

if ($stmt === false) {
    die('Error en la preparación de la consulta: ' . $con->error);
}

// Enlazar los parámetros
$stmt->bind_param('ssssssssssssssssssssissssssssssssssisisisi', 
    $fecha, $numero_de_inscripcion, $tipo_de_establecimiento, $nombre_comercial_del_objeto, 
    $departamento, $municipio, $lugar_del_establecimiento, $otro, $cual, $direccion_establecimiento, 
    $telefono_establecimiento, $tipo_de_persona, $primer_apellido, $segundo_apellido, $nombres, 
    $documento_de_identificacion, $numero_de_documento, $direccion_de_notificacion, $telefonos, 
    $correo_electronico_propietario, $el_establecimiento_inspeccionado_por_entidad_salud, 
    $fecha_de_ultima_inspeccion, $ultimo_concepto_sanitario, $dia_laboral_1, $dia_laboral_2, $hora_laboral_1, $hora_laboral_2, 
    $dia_laboral_3, $dia_laboral_4, $hora_laboral_3, $hora_laboral_4, $establecimiento_inspeccionado_entidad_territorial_salud, 
    $fecha_de_ultima_inspeccion_2, $ultimo_concepto_sanitario_emitio, $nombre, $cedula, $cargo, $telefono, 
    $nombre_2, $cedula_2, $cargo_2, $telefono_2
);

if ($stmt->execute()) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar los datos: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$con->close();
?>
