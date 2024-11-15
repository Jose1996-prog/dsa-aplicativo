<?php
// Configuración de la conexión a la base de datos
$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

// Crear conexión
$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

// Verificar la conexión
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

// Recuperar datos del formulario con manejo de campos opcionales
$departamento = $_POST['departamento'] ?? '';
$municipio = $_POST['municipio'] ?? '';
$fecha = $_POST['fecha'] ?? '';
$codigo_divipola_departamento = $_POST['codigo_divipola_departamento'] ?? '';
$codigo_divipola_municipio = $_POST['codigo_divipola_municipio'] ?? '';
$numero_inscripcion = $_POST['numero_inscripcion'] ?? '';
$razon_social = $_POST['razon_social'] ?? '';
$nombre_comercial = $_POST['nombre_comercial'] ?? '';
$tipo_documento_de_identificacion = $_POST['tipo_documento_de_identificacion'] ?? '';
$numero_identificacion_tributaria = $_POST['numero_identificacion_tributaria'] ?? '';
$nombre_establecimiento_de_comercio = $_POST['nombre_establecimiento_de_comercio'] ?? '';
$nombre_propietario_del_establecimiento = $_POST['nombre_propietario_del_establecimiento'] ?? '';
$tipo_documento_per_natural = $_POST['tipo_documento_per_natural'] ?? '';
$numero_de_documento = $_POST['numero_de_documento'] ?? '';
$direccion_ubicacion_del_establecimiento = $_POST['direccion_ubicacion_del_establecimiento'] ?? '';
$zona = $_POST['zona'] ?? '';
$barrio = $_POST['barrio'] ?? '';
$vereda = $_POST['vereda'] ?? '';
$lugar_de_establecimiento = $_POST['lugar_de_establecimiento'] ?? '';
$otro = $_POST['otro'] ?? '';
$cual = $_POST['cual'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$fax = $_POST['fax'] ?? '';
$celular = $_POST['celular'] ?? '';
$correo_electronico = $_POST['correo_electronico'] ?? '';
$direccion_de_notificacion_fisica = $_POST['direccion_de_notificacion_fisica'] ?? '';
$direccion_de_notificacion_electronica = $_POST['direccion_de_notificacion_electronica'] ?? '';
$autoriza_la_notificacion_electronica = $_POST['autoriza_la_notificacion_electronica'] ?? '';
$municipio_de_direccion_de_notificacion = $_POST['municipio_de_direccion_de_notificacion'] ?? '';
$departamento_de_direccion_de_notificacion = $_POST['departamento_de_direccion_de_notificacion'] ?? '';
$preparacion_alimentos = $_POST['preparacion_alimentos'] ?? '';
$comedores = $_POST['comedores'] ?? '';
$expendio_de_alimentos = $_POST['expendio_de_alimentos'] ?? '';
$grandes_superficies = $_POST['grandes_superficies'] ?? '';
$ensamble_de_alimentos = $_POST['ensamble_de_alimentos'] ?? '';
$almacenamiento = $_POST['almacenamiento'] ?? '';
$venta_en_via_publica = $_POST['venta_en_via_publica'] ?? '';
$expendio_de_bebidas_alcoholicas = $_POST['expendio_de_bebidas_alcoholicas'] ?? '';
$plaza_de_mercado = $_POST['plaza_de_mercado'] ?? '';
$establecimiento_inspeccionado_entidad_territorial_salud = $_POST['establecimiento_inspeccionado_entidad_territorial_salud'] ?? '';
$fecha_de_ultima_inspeccion = $_POST['fecha_de_ultima_inspeccion'] ?? '';
$ultimo_concepto_sanitario_emitio = $_POST['ultimo_concepto_sanitario_emitio'] ?? '';
$funcionario_que_realiza_la_inspeccion = $_POST['funcionario_que_realiza_la_inspeccion'] ?? '';
$observaciones_por_autoridad_sanitaria = $_POST['observaciones_por_autoridad_sanitaria'] ?? '';
$observaciones_por_responsable_de_la_inscripcion = $_POST['observaciones_por_responsable_de_la_inscripcion'] ?? '';
$entregado_por_nombre_completo = $_POST['entregado_por_nombre_completo'] ?? '';
$entregado_por_cedula = $_POST['entregado_por_cedula'] ?? '';

$en_calidad_de_responsable = $_POST['en_calidad_de_responsable'] ?? '';
$recibido_por_nombre_completo = $_POST['recibido_por_nombre_completo'] ?? '';
$recibido_por_cedula = $_POST['recibido_por_cedula'] ?? '';

$en_calidad_de_funcionario = $_POST['en_calidad_de_funcionario'] ?? '';

// Preparar la consulta SQL con 53 signos de interrogación
$sql = "INSERT INTO ins_alimentos (
    departamento, municipio, fecha, codigo_divipola_departamento, codigo_divipola_municipio,
    numero_inscripcion, razon_social, nombre_comercial, tipo_documento_de_identificacion, numero_identificacion_tributaria,
    nombre_establecimiento_de_comercio, nombre_propietario_del_establecimiento, tipo_documento_per_natural, numero_de_documento,
    direccion_ubicacion_del_establecimiento, zona, barrio, vereda, lugar_de_establecimiento, otro, cual,
    telefono, fax, celular, correo_electronico, direccion_de_notificacion_fisica, direccion_de_notificacion_electronica,
    autoriza_la_notificacion_electronica, municipio_de_direccion_de_notificacion, departamento_de_direccion_de_notificacion,
    preparacion_alimentos, comedores, expendio_de_alimentos, grandes_superficies, ensamble_de_alimentos, almacenamiento,
    venta_en_via_publica, expendio_de_bebidas_alcoholicas, plaza_de_mercado, establecimiento_inspeccionado_entidad_territorial_salud,
    fecha_de_ultima_inspeccion, ultimo_concepto_sanitario_emitio, funcionario_que_realiza_la_inspeccion,
    observaciones_por_autoridad_sanitaria, observaciones_por_responsable_de_la_inscripcion, entregado_por_nombre_completo,
    entregado_por_cedula, en_calidad_de_responsable, recibido_por_nombre_completo, recibido_por_cedula, en_calidad_de_funcionario
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar la declaración
$stmt = $con->prepare($sql);

// Verificar la preparación de la declaración
if ($stmt === false) {
    die("Error al preparar la consulta: " . $con->error);
}

// Vincular los parámetros (53 parámetros en total)
$stmt->bind_param(
    'sssssssssssssssssssssssssssssssssssssssssssssssssss',
    $departamento, $municipio, $fecha, $codigo_divipola_departamento, $codigo_divipola_municipio,
    $numero_inscripcion, $razon_social, $nombre_comercial, $tipo_documento_de_identificacion, $numero_identificacion_tributaria,
    $nombre_establecimiento_de_comercio, $nombre_propietario_del_establecimiento, $tipo_documento_per_natural, $numero_de_documento,
    $direccion_ubicacion_del_establecimiento, $zona, $barrio, $vereda, $lugar_de_establecimiento, $otro, $cual,
    $telefono, $fax, $celular, $correo_electronico, $direccion_de_notificacion_fisica, $direccion_de_notificacion_electronica,
    $autoriza_la_notificacion_electronica, $municipio_de_direccion_de_notificacion, $departamento_de_direccion_de_notificacion,
    $preparacion_alimentos, $comedores, $expendio_de_alimentos, $grandes_superficies, $ensamble_de_alimentos, $almacenamiento,
    $venta_en_via_publica, $expendio_de_bebidas_alcoholicas, $plaza_de_mercado, $establecimiento_inspeccionado_entidad_territorial_salud,
    $fecha_de_ultima_inspeccion, $ultimo_concepto_sanitario_emitio, $funcionario_que_realiza_la_inspeccion,
    $observaciones_por_autoridad_sanitaria, $observaciones_por_responsable_de_la_inscripcion, $entregado_por_nombre_completo,
    $entregado_por_cedula, $en_calidad_de_responsable, $recibido_por_nombre_completo, $recibido_por_cedula, $en_calidad_de_funcionario
);

// Ejecutar la declaración
if ($stmt->execute()) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar los datos: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$con->close();
?>
