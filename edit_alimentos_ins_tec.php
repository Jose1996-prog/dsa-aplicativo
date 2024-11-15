<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['alimentos'])) {
    header('Location: login_alimentos_ins_upd.php');
     exit;
 }

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die('Could not connect to the database server' . mysqli_connect_error());

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

    $id = $_POST['id'];
    $departamento = $_POST['departamento'];
    $municipio = $_POST['municipio'];
    $fecha = $_POST['fecha'];
    $codigo_divipola_departamento = $_POST['codigo_divipola_departamento'];
    $codigo_divipola_municipio = $_POST['codigo_divipola_municipio'];
    $numero_inscripcion = $_POST['numero_inscripcion'];
    $razon_social = $_POST['razon_social'];
    $nombre_comercial = $_POST['nombre_comercial'];
    $tipo_documento_de_identificacion = $_POST['tipo_documento_de_identificacion'];
    $numero_identificacion_tributaria = $_POST['numero_identificacion_tributaria'];
    $nombre_establecimiento_de_comercio = $_POST['nombre_establecimiento_de_comercio'];
    $nombre_propietario_del_establecimiento = $_POST['nombre_propietario_del_establecimiento'];
    $tipo_documento_per_natural = $_POST['tipo_documento_per_natural'];
    $numero_de_documento = $_POST['numero_de_documento'];
    $direccion_ubicacion_del_establecimiento = $_POST['direccion_ubicacion_del_establecimiento'];
    $zona = $_POST['zona'];
    $barrio = $_POST['barrio'];
    $vereda = $_POST['vereda'];
    $lugar_de_establecimiento = $_POST['lugar_de_establecimiento'];
    $otro = $_POST['otro'];
    $cual = $_POST['cual'];
    $telefono = $_POST['telefono'];
    $fax = $_POST['fax'];
    $celular = $_POST['celular'];
    $correo_electronico = $_POST['correo_electronico'];
    $direccion_de_notificacion_fisica = $_POST['direccion_de_notificacion_fisica'];
    $direccion_de_notificacion_electronica = $_POST['direccion_de_notificacion_electronica'];
    $autoriza_la_notificacion_electronica = $_POST['autoriza_la_notificacion_electronica'];
    $municipio_de_direccion_de_notificacion = $_POST['municipio_de_direccion_de_notificacion'];
    $departamento_de_direccion_de_notificacion = $_POST['departamento_de_direccion_de_notificacion'];
    $preparacion_alimentos = $_POST['preparacion_alimentos'];
    $comedores = $_POST['comedores'];
    $expendio_de_alimentos = $_POST['expendio_de_alimentos'];
    $grandes_superficies = $_POST['grandes_superficies'];
    $ensamble_de_alimentos = $_POST['ensamble_de_alimentos'];
    $almacenamiento = $_POST['almacenamiento'];
    $venta_en_via_publica = $_POST['venta_en_via_publica'];
    $expendio_de_bebidas_alcoholicas = $_POST['expendio_de_bebidas_alcoholicas'];
    $plaza_de_mercado = $_POST['plaza_de_mercado'];
    $establecimiento_inspeccionado_entidad_territorial_salud = $_POST['establecimiento_inspeccionado_entidad_territorial_salud'];
    $fecha_de_ultima_inspeccion = $_POST['fecha_de_ultima_inspeccion'];
    $ultimo_concepto_sanitario_emitio = $_POST['ultimo_concepto_sanitario_emitio'];
    $funcionario_que_realiza_la_inspeccion = $_POST['funcionario_que_realiza_la_inspeccion'];
    $observaciones_por_autoridad_sanitaria = $_POST['observaciones_por_autoridad_sanitaria'];
    $observaciones_por_responsable_de_la_inscripcion = $_POST['observaciones_por_responsable_de_la_inscripcion'];
    $entregado_por_nombre_completo = $_POST['entregado_por_nombre_completo'];
    $entregado_por_cedula = $_POST['entregado_por_cedula'];
    $en_calidad_de_responsable = $_POST['en_calidad_de_responsable'];
    $recibido_por_nombre_completo = $_POST['recibido_por_nombre_completo'];
    $recibido_por_cedula = $_POST['recibido_por_cedula'];
    $en_calidad_de_funcionario = $_POST['en_calidad_de_funcionario'];

    // Preparar la consulta de actualización
    $update_query = "UPDATE ins_alimentos SET 
                            departamento = ?,
                            municipio = ?,
                            fecha = ?,
                            codigo_divipola_departamento = ?,
                            codigo_divipola_municipio = ?,
                            numero_inscripcion = ?,
                            razon_social = ?,
                            nombre_comercial = ?,
                            tipo_documento_de_identificacion = ?,
                            numero_identificacion_tributaria = ?,
                            nombre_establecimiento_de_comercio = ?,
                            nombre_propietario_del_establecimiento = ?,
                            tipo_documento_per_natural = ?,
                            numero_de_documento = ?,
                            direccion_ubicacion_del_establecimiento = ?,
                            zona = ?,
                            barrio = ?,
                            vereda = ?,
                            lugar_de_establecimiento = ?,
                            otro = ?,
                            cual = ?,
                            telefono = ?,
                            fax = ?,
                            celular = ?,
                            correo_electronico = ?,
                            direccion_de_notificacion_fisica = ?,
                            direccion_de_notificacion_electronica = ?,
                            autoriza_la_notificacion_electronica = ?,
                            municipio_de_direccion_de_notificacion = ?,
                            departamento_de_direccion_de_notificacion = ?,
                            preparacion_alimentos = ?,
                            comedores = ?,
                            expendio_de_alimentos = ?,
                            grandes_superficies = ?,
                            ensamble_de_alimentos = ?,
                            almacenamiento = ?,
                            venta_en_via_publica = ?,
                            expendio_de_bebidas_alcoholicas = ?,
                            plaza_de_mercado = ?,
                            establecimiento_inspeccionado_entidad_territorial_salud = ?,
                            fecha_de_ultima_inspeccion = ?,
                            ultimo_concepto_sanitario_emitio = ?,
                            funcionario_que_realiza_la_inspeccion = ?,
                            observaciones_por_autoridad_sanitaria = ?,
                            observaciones_por_responsable_de_la_inscripcion = ?,
                            entregado_por_nombre_completo = ?,
                            entregado_por_cedula = ?,
                            en_calidad_de_responsable = ?,
                            recibido_por_nombre_completo = ?,
                            recibido_por_cedula = ?,
                            en_calidad_de_funcionario = ?
                            WHERE id=?";

    if ($stmt = $con->prepare($update_query)) {

        $stmt->bind_param("ssssisssssisssisssssssiiissssssssssssssssssisssisssi", 
        $departamento,
        $municipio,
        $fecha,
        $codigo_divipola_departamento,
        $codigo_divipola_municipio,
        $numero_inscripcion,
        $razon_social,
        $nombre_comercial,
        $tipo_documento_de_identificacion,
        $numero_identificacion_tributaria,
        $nombre_establecimiento_de_comercio,
        $nombre_propietario_del_establecimiento,
        $tipo_documento_per_natural,
        $numero_de_documento,
        $direccion_ubicacion_del_establecimiento,
        $zona,
        $barrio,
        $vereda,
        $lugar_de_establecimiento,
        $otro,
        $cual,
        $telefono,
        $fax,
        $celular,
        $correo_electronico,
        $direccion_de_notificacion_fisica,
        $direccion_de_notificacion_electronica,
        $autoriza_la_notificacion_electronica,
        $municipio_de_direccion_de_notificacion,
        $departamento_de_direccion_de_notificacion,
        $preparacion_alimentos,
        $comedores,
        $expendio_de_alimentos,
        $grandes_superficies,
        $ensamble_de_alimentos,
        $almacenamiento,
        $venta_en_via_publica,
        $expendio_de_bebidas_alcoholicas,
        $plaza_de_mercado,
        $establecimiento_inspeccionado_entidad_territorial_salud,
        $fecha_de_ultima_inspeccion,
        $ultimo_concepto_sanitario_emitio,
        $funcionario_que_realiza_la_inspeccion,
        $observaciones_por_autoridad_sanitaria,
        $observaciones_por_responsable_de_la_inscripcion,
        $entregado_por_nombre_completo,
        $entregado_por_cedula,

        $en_calidad_de_responsable,
        $recibido_por_nombre_completo,
        $recibido_por_cedula,

        $en_calidad_de_funcionario,
        $id);

        $stmt->execute();
        $stmt->close();
        echo "<p>Registro actualizado correctamente.</p>";
    } else {
        echo "<p>Error al preparar la consulta de actualización: " . $con->error . "</p>";
    }
}

// Mostrar formulario de edición si se ha seleccionado un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    
    $query = "SELECT        departamento,
                            municipio,
                            fecha,
                            codigo_divipola_departamento,
                            codigo_divipola_municipio,
                            numero_inscripcion,
                            razon_social,
                            nombre_comercial,
                            tipo_documento_de_identificacion,
                            numero_identificacion_tributaria,
                            nombre_establecimiento_de_comercio,
                            nombre_propietario_del_establecimiento,
                            tipo_documento_per_natural,
                            numero_de_documento,
                            direccion_ubicacion_del_establecimiento,
                            zona,
                            barrio,
                            vereda,
                            lugar_de_establecimiento,
                            otro,
                            cual,
                            telefono,
                            fax,
                            celular,
                            correo_electronico,
                            direccion_de_notificacion_fisica,
                            direccion_de_notificacion_electronica,
                            autoriza_la_notificacion_electronica,
                            municipio_de_direccion_de_notificacion,
                            departamento_de_direccion_de_notificacion,
                            preparacion_alimentos,
                            comedores,
                            expendio_de_alimentos,
                            grandes_superficies,
                            ensamble_de_alimentos,
                            almacenamiento,
                            venta_en_via_publica,
                            expendio_de_bebidas_alcoholicas,
                            plaza_de_mercado,
                            establecimiento_inspeccionado_entidad_territorial_salud,
                            fecha_de_ultima_inspeccion,
                            ultimo_concepto_sanitario_emitio,
                            funcionario_que_realiza_la_inspeccion,
                            observaciones_por_autoridad_sanitaria,
                            observaciones_por_responsable_de_la_inscripcion,
                            entregado_por_nombre_completo,
                            entregado_por_cedula,

                            en_calidad_de_responsable,
                            recibido_por_nombre_completo,
                            recibido_por_cedula,

                            en_calidad_de_funcionario 
              FROM ins_alimentos WHERE id=?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result(
            $departamento,
            $municipio,
            $fecha,
            $codigo_divipola_departamento,
            $codigo_divipola_municipio,
            $numero_inscripcion,
            $razon_social,
            $nombre_comercial,
            $tipo_documento_de_identificacion,
            $numero_identificacion_tributaria,
            $nombre_establecimiento_de_comercio,
            $nombre_propietario_del_establecimiento,
            $tipo_documento_per_natural,
            $numero_de_documento,
            $direccion_ubicacion_del_establecimiento,
            $zona,
            $barrio,
            $vereda,
            $lugar_de_establecimiento,
            $otro,
            $cual,
            $telefono,
            $fax,
            $celular,
            $correo_electronico,
            $direccion_de_notificacion_fisica,
            $direccion_de_notificacion_electronica,
            $autoriza_la_notificacion_electronica,
            $municipio_de_direccion_de_notificacion,
            $departamento_de_direccion_de_notificacion,
            $preparacion_alimentos,
            $comedores,
            $expendio_de_alimentos,
            $grandes_superficies,
            $ensamble_de_alimentos,
            $almacenamiento,
            $venta_en_via_publica,
            $expendio_de_bebidas_alcoholicas,
            $plaza_de_mercado,
            $establecimiento_inspeccionado_entidad_territorial_salud,
            $fecha_de_ultima_inspeccion,
            $ultimo_concepto_sanitario_emitio,
            $funcionario_que_realiza_la_inspeccion,
            $observaciones_por_autoridad_sanitaria,
            $observaciones_por_responsable_de_la_inscripcion,
            $entregado_por_nombre_completo,
            $entregado_por_cedula,

            $en_calidad_de_responsable,
            $recibido_por_nombre_completo,
            $recibido_por_cedula,

            $en_calidad_de_funcionario
        );

        if ($stmt->fetch()) {
            echo '<form action="edit_alimentos_ins_tec.php" method="post">';
            echo '<table>';
            
            echo '<tr>';
            echo '<td><label for="id">Item:</label></td>';
            echo '<td><input type="number" id="id" name="id" value="' . htmlspecialchars($id) . '" readonly></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="departamento">Departamento:</label></td>';
            echo '<td colspan="2"><input type="text" id="departamento" name="departamento" value="' . htmlspecialchars($departamento) . '"  maxlength="20">';
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="municipio">Municipio:</label></td>';
            echo '<td colspan="2"><input type="text" id="municipio" name="municipio" value="' . htmlspecialchars($municipio) . '"  maxlength="40">';
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="fecha">Fecha:</label></td>';
            echo '<td colspan="2"><input type="date" id="fecha" name="fecha" value="' . htmlspecialchars($fecha) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="codigo_divipola_departamento">Código DIVIPOLA Departamento:</label></td>';
            echo '<td colspan="2"><input type="number" id="codigo_divipola_departamento" name="codigo_divipola_departamento" value="' . htmlspecialchars($codigo_divipola_departamento) . '"  maxlength="3">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="codigo_divipola_municipio">Código DIVIPOLA Municipio:</label></td>';
            echo '<td colspan="2"><input type="number" id="codigo_divipola_municipio" name="codigo_divipola_municipio" value="' . htmlspecialchars($codigo_divipola_municipio) . '"  maxlength="5">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="numero_inscripcion">Número de Inscripción:</label></td>';
            echo '<td colspan="2"><input type="number" id="numero_inscripcion" name="numero_inscripcion" value="' . htmlspecialchars($numero_inscripcion) . '"  maxlength="40">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="razon_social">Razón Social:</label></td>';
            echo '<td colspan="2"><input type="text" id="razon_social" name="razon_social" value="' . htmlspecialchars($razon_social) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_comercial">Nombre Comercial:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_comercial" name="nombre_comercial" value="' . htmlspecialchars($nombre_comercial) . '"  maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="tipo_documento_de_identificacion">Tipo de Documento de Identificación:</label></td>';
            echo '<td colspan="2"><input type="text" id="tipo_documento_de_identificacion" name="tipo_documento_de_identificacion" value="' . htmlspecialchars($tipo_documento_de_identificacion) . '" maxlength="3">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="numero_identificacion_tributaria">Número de Identificación Tributaria:</label></td>';
            echo '<td colspan="2"><input type="number" id="numero_identificacion_tributaria" name="numero_identificacion_tributaria" value="' . htmlspecialchars($numero_identificacion_tributaria) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_establecimiento_de_comercio">Nombre del Establecimiento de Comercio:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_establecimiento_de_comercio" name="nombre_establecimiento_de_comercio" value="' . htmlspecialchars($nombre_establecimiento_de_comercio) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_propietario_del_establecimiento">Nombre del Propietario del Establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_propietario_del_establecimiento" name="nombre_propietario_del_establecimiento" value="' . htmlspecialchars($nombre_propietario_del_establecimiento) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="tipo_documento_per_natural">Tipo de Documento Personal:</label></td>';
            echo '<td colspan="2"><input type="text" id="tipo_documento_per_natural" name="tipo_documento_per_natural" value="' . htmlspecialchars($tipo_documento_per_natural) . '" maxlength="3">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="numero_de_documento">Número de Documento:</label></td>';
            echo '<td colspan="2"><input type="number" id="numero_de_documento" name="numero_de_documento" value="' . htmlspecialchars($numero_de_documento) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="direccion_ubicacion_del_establecimiento">Dirección de Ubicación del Establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="direccion_ubicacion_del_establecimiento" name="direccion_ubicacion_del_establecimiento" value="' . htmlspecialchars($direccion_ubicacion_del_establecimiento) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="zona">Zona:</label></td>';
            echo '<td colspan="2"><input type="text" id="zona" name="zona" value="' . htmlspecialchars($zona) . '" maxlength="10">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="barrio">Barrio:</label></td>';
            echo '<td colspan="2"><input type="text" id="barrio" name="barrio" value="' . htmlspecialchars($barrio) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="vereda">Vereda:</label></td>';
            echo '<td colspan="2"><input type="text" id="vereda" name="vereda" value="' . htmlspecialchars($vereda) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="lugar_de_establecimiento">Lugar de Establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="lugar_de_establecimiento" name="lugar_de_establecimiento" value="' . htmlspecialchars($lugar_de_establecimiento) . '" maxlength="40">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="otro">Otro:</label></td>';
            echo '<td colspan="2"><input type="text" id="otro" name="otro" value="' . htmlspecialchars($otro) . '" maxlength="2">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cual">Cuál:</label></td>';
            echo '<td colspan="2"><input type="text" id="cual" name="cual" value="' . htmlspecialchars($cual) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="telefono">Teléfono:</label></td>';
            echo '<td colspan="2"><input type="number" id="telefono" name="telefono" value="' . htmlspecialchars($telefono) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="fax">Fax:</label></td>';
            echo '<td colspan="2"><input type="number" id="fax" name="fax" value="' . htmlspecialchars($fax) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="celular">Celular:</label></td>';
            echo '<td colspan="2"><input type="number" id="celular" name="celular" value="' . htmlspecialchars($celular) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="correo_electronico">Correo Electrónico:</label></td>';
            echo '<td colspan="2"><input type="email" id="correo_electronico" name="correo_electronico" value="' . htmlspecialchars($correo_electronico) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="direccion_de_notificacion_fisica">Dirección de Notificación Física:</label></td>';
            echo '<td colspan="2"><input type="text" id="direccion_de_notificacion_fisica" name="direccion_de_notificacion_fisica" value="' . htmlspecialchars($direccion_de_notificacion_fisica) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="direccion_de_notificacion_electronica">Dirección de Notificación Electrónica:</label></td>';
            echo '<td colspan="2"><input type="text" id="direccion_de_notificacion_electronica" name="direccion_de_notificacion_electronica" value="' . htmlspecialchars($direccion_de_notificacion_electronica) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="autoriza_la_notificacion_electronica">Autoriza la Notificación Electrónica:</label></td>';
            echo '<td colspan="2"><input type="text" id="autoriza_la_notificacion_electronica" name="autoriza_la_notificacion_electronica" value="' . htmlspecialchars($autoriza_la_notificacion_electronica) . '" maxlength="2">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="municipio_de_direccion_de_notificacion">Municipio de Dirección de Notificación:</label></td>';
            echo '<td colspan="2"><input type="text" id="municipio_de_direccion_de_notificacion" name="municipio_de_direccion_de_notificacion" value="' . htmlspecialchars($municipio_de_direccion_de_notificacion) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="departamento_de_direccion_de_notificacion">Departamento de Dirección de Notificación:</label></td>';
            echo '<td colspan="2"><input type="text" id="departamento_de_direccion_de_notificacion" name="departamento_de_direccion_de_notificacion" value="' . htmlspecialchars($departamento_de_direccion_de_notificacion) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';


            echo '<tr>';
            echo '<td><label for="preparacion_alimentos">Preparación de Alimentos:</label></td>';
            echo '<td colspan="2"><input type="text" id="preparacion_alimentos" name="preparacion_alimentos" value="' . htmlspecialchars($preparacion_alimentos) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="comedores">Comedores:</label></td>';
            echo '<td colspan="2"><input type="text" id="comedores" name="comedores" value="' . htmlspecialchars($comedores) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="expendio_de_alimentos">Expedición de Alimentos:</label></td>';
            echo '<td colspan="2"><input type="text" id="expendio_de_alimentos" name="expendio_de_alimentos" value="' . htmlspecialchars($expendio_de_alimentos) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="grandes_superficies">Grandes Superficies:</label></td>';
            echo '<td colspan="2"><input type="text" id="grandes_superficies" name="grandes_superficies" value="' . htmlspecialchars($grandes_superficies) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="ensamble_de_alimentos">Ensamble de Alimentos:</label></td>';
            echo '<td colspan="2"><input type="text" id="ensamble_de_alimentos" name="ensamble_de_alimentos" value="' . htmlspecialchars($ensamble_de_alimentos) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="almacenamiento">Almacenamiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="almacenamiento" name="almacenamiento" value="' . htmlspecialchars($almacenamiento) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="venta_en_via_publica">Venta en Vía Pública:</label></td>';
            echo '<td colspan="2"><input type="text" id="venta_en_via_publica" name="venta_en_via_publica" value="' . htmlspecialchars($venta_en_via_publica) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="expendio_de_bebidas_alcoholicas">Expedición de Bebidas Alcohólicas:</label></td>';
            echo '<td colspan="2"><input type="text" id="expendio_de_bebidas_alcoholicas" name="expendio_de_bebidas_alcoholicas" value="' . htmlspecialchars($expendio_de_bebidas_alcoholicas) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="plaza_de_mercado">Plaza de Mercado:</label></td>';
            echo '<td colspan="2"><input type="text" id="plaza_de_mercado" name="plaza_de_mercado" value="' . htmlspecialchars($plaza_de_mercado) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="establecimiento_inspeccionado_entidad_territorial_salud">Establecimiento Inspeccionado Entidad Territorial Salud:</label></td>';
            echo '<td colspan="2"><input type="text" id="establecimiento_inspeccionado_entidad_territorial_salud" name="establecimiento_inspeccionado_entidad_territorial_salud" value="' . htmlspecialchars($establecimiento_inspeccionado_entidad_territorial_salud) . '" maxlength="2">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="fecha_de_ultima_inspeccion">Fecha de Última Inspección:</label></td>';
            echo '<td colspan="2"><input type="text" id="fecha_de_ultima_inspeccion" name="fecha_de_ultima_inspeccion" value="' . htmlspecialchars($fecha_de_ultima_inspeccion) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="ultimo_concepto_sanitario_emitio">Último Concepto Sanitario Emitido:</label></td>';
            echo '<td colspan="2"><input type="text" id="ultimo_concepto_sanitario_emitio" name="ultimo_concepto_sanitario_emitio" value="' . htmlspecialchars($ultimo_concepto_sanitario_emitio) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="funcionario_que_realiza_la_inspeccion">Funcionario que Realiza la Inspección:</label></td>';
            echo '<td colspan="2"><input type="text" id="funcionario_que_realiza_la_inspeccion" name="funcionario_que_realiza_la_inspeccion" value="' . htmlspecialchars($funcionario_que_realiza_la_inspeccion) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="observaciones_por_autoridad_sanitaria">Observaciones por Autoridad Sanitaria:</label></td>';
            echo '<td colspan="2"><textarea id="observaciones_por_autoridad_sanitaria" name="observaciones_por_autoridad_sanitaria" maxlength="500">' . htmlspecialchars($observaciones_por_autoridad_sanitaria) . '</textarea>';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="observaciones_por_responsable_de_la_inscripcion">Observaciones por Responsable de la Inscripción:</label></td>';
            echo '<td colspan="2"><textarea id="observaciones_por_responsable_de_la_inscripcion" name="observaciones_por_responsable_de_la_inscripcion" maxlength="500">' . htmlspecialchars($observaciones_por_responsable_de_la_inscripcion) . '</textarea>';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="entregado_por_nombre_completo">Entregado por Nombre Completo:</label></td>';
            echo '<td colspan="2"><input type="text" id="entregado_por_nombre_completo" name="entregado_por_nombre_completo" value="' . htmlspecialchars($entregado_por_nombre_completo) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="entregado_por_cedula">Entregado por Cédula:</label></td>';
            echo '<td colspan="2"><input type="number" id="entregado_por_cedula" name="entregado_por_cedula" value="' . htmlspecialchars($entregado_por_cedula) . '">';
            echo '</td>';
            echo '</tr>';


            echo '<tr>';
            echo '<td><label for="en_calidad_de_responsable">En Calidad de Responsable:</label></td>';
            echo '<td colspan="2"><input type="text" id="en_calidad_de_responsable" name="en_calidad_de_responsable" value="' . htmlspecialchars($en_calidad_de_responsable) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="recibido_por_nombre_completo">Recibido por Nombre Completo:</label></td>';
            echo '<td colspan="2"><input type="text" id="recibido_por_nombre_completo" name="recibido_por_nombre_completo" value="' . htmlspecialchars($recibido_por_nombre_completo) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="recibido_por_cedula">Recibido por Cédula:</label></td>';
            echo '<td colspan="2"><input type="number" id="recibido_por_cedula" name="recibido_por_cedula" value="' . htmlspecialchars($recibido_por_cedula) . '">';
            echo '</td>';
            echo '</tr>';


            echo '<tr>';
            echo '<td><label for="en_calidad_de_funcionario">En Calidad de Funcionario:</label></td>';
            echo '<td colspan="2"><input type="text" id="en_calidad_de_funcionario" name="en_calidad_de_funcionario" value="' . htmlspecialchars($en_calidad_de_funcionario) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><input type="submit" name="update" value="Actualizar"></td>';
            echo '</tr>';
            
            echo '</table>';
            echo '</form>';
        }
        $stmt->close();
    }
}

// Mostrar lista de registros para seleccionar y editar
$query = "SELECT * FROM ins_alimentos";

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result(
        $id,
        $departamento,
        $municipio,
        $fecha,
        $codigo_divipola_departamento,
        $codigo_divipola_municipio,
        $numero_inscripcion,
        $razon_social,
        $nombre_comercial,
        $tipo_documento_de_identificacion,
        $numero_identificacion_tributaria,
        $nombre_establecimiento_de_comercio,
        $nombre_propietario_del_establecimiento,
        $tipo_documento_per_natural,
        $numero_de_documento,
        $direccion_ubicacion_del_establecimiento,
        $zona,
        $barrio,
        $vereda,
        $lugar_de_establecimiento,
        $otro,
        $cual,
        $telefono,
        $fax,
        $celular,
        $correo_electronico,
        $direccion_de_notificacion_fisica,
        $direccion_de_notificacion_electronica,
        $autoriza_la_notificacion_electronica,
        $municipio_de_direccion_de_notificacion,
        $departamento_de_direccion_de_notificacion,
        $preparacion_alimentos,
        $comedores,
        $expendio_de_alimentos,
        $grandes_superficies,
        $ensamble_de_alimentos,
        $almacenamiento,
        $venta_en_via_publica,
        $expendio_de_bebidas_alcoholicas,
        $plaza_de_mercado,
        $establecimiento_inspeccionado_entidad_territorial_salud,
        $fecha_de_ultima_inspeccion,
        $ultimo_concepto_sanitario_emitio,
        $funcionario_que_realiza_la_inspeccion,
        $observaciones_por_autoridad_sanitaria,
        $observaciones_por_responsable_de_la_inscripcion,
        $entregado_por_nombre_completo,
        $entregado_por_cedula,

        $en_calidad_de_responsable,
        $recibido_por_nombre_completo,
        $recibido_por_cedula,

        $en_calidad_de_funcionario
    );
    
    echo "<h2>Selecciona un registro para editar:</h2>";
    echo "<table border='1' height='500px'>";
    echo "<tr>

            <th>Accion</th>
            <th>Item</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Fecha</th>
            <th>Código DIVIPOLA Departamento</th>
            <th>Código DIVIPOLA Municipio</th>
            <th>Número Inscripción</th>
            <th>Razón Social</th>
            <th>Nombre Comercial</th>
            <th>Tipo Documento de Identificación</th>
            <th>Número Identificación Tributaria</th>
            <th>Nombre Establecimiento de Comercio</th>
            <th>Nombre Propietario del Establecimiento</th>
            <th>Tipo Documento per Natural</th>
            <th>Número de Documento</th>
            <th>Dirección Ubicación del Establecimiento</th>
            <th>Zona</th>
            <th>Barrio</th>
            <th>Vereda</th>
            <th>Lugar de Establecimiento</th>
            <th>Otro</th>
            <th>Cual</th>
            <th>Teléfono</th>
            <th>Fax</th>
            <th>Celular</th>
            <th>Correo Electrónico</th>
            <th>Dirección de Notificación Física</th>
            <th>Dirección de Notificación Electrónica</th>
            <th>Autoriza la Notificación Electrónica</th>
            <th>Municipio de Dirección de Notificación</th>
            <th>Departamento de Dirección de Notificación</th>
            <th>Preparación de Alimentos</th>
            <th>Comedores</th>
            <th>Expedición de Alimentos</th>
            <th>Grandes Superficies</th>
            <th>Ensamble de Alimentos</th>
            <th>Almacenamiento</th>
            <th>Venta en Vía Pública</th>
            <th>Expedición de Bebidas Alcohólicas</th>
            <th>Plaza de Mercado</th>
            <th>Establecimiento Inspeccionado Entidad Territorial Salud</th>
            <th>Fecha de Última Inspección</th>
            <th>Último Concepto Sanitario Emitido</th>
            <th>Funcionario que Realiza la Inspección</th>
            <th>Observaciones por Autoridad Sanitaria</th>
            <th>Observaciones por Responsable de la Inscripción</th>
            <th>Entregado por Nombre Completo</th>
            <th>Entregado por Cédula</th>

            <th>En Calidad de Responsable</th>
            <th>Recibido por Nombre Completo</th>
            <th>Recibido por Cédula</th>

            <th>En Calidad de Funcionario</th>

          </tr>";

    while ($stmt->fetch()) {

        echo "<tr>";
        echo "<td>";

        echo "<form action='edit_alimentos_ins_tec.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='submit' value='Editar'>";

        echo "</form>";
        echo "</td>";

        echo   "<td>$id</td>
                <td>$departamento</td>
                <td>$municipio</td>
                <td>$fecha</td>
                <td>$codigo_divipola_departamento</td>
                <td>$codigo_divipola_municipio</td>
                <td>$numero_inscripcion</td>
                <td>$razon_social</td>
                <td>$nombre_comercial</td>
                <td>$tipo_documento_de_identificacion</td>
                <td>$numero_identificacion_tributaria</td>
                <td>$nombre_establecimiento_de_comercio</td>
                <td>$nombre_propietario_del_establecimiento</td>
                <td>$tipo_documento_per_natural</td>
                <td>$numero_de_documento</td>
                <td>$direccion_ubicacion_del_establecimiento</td>
                <td>$zona</td>
                <td>$barrio</td>
                <td>$vereda</td>
                <td>$lugar_de_establecimiento</td>
                <td>$otro</td>
                <td>$cual</td>
                <td>$telefono</td>
                <td>$fax</td>
                <td>$celular</td>
                <td>$correo_electronico</td>
                <td>$direccion_de_notificacion_fisica</td>
                <td>$direccion_de_notificacion_electronica</td>
                <td>$autoriza_la_notificacion_electronica</td>
                <td>$municipio_de_direccion_de_notificacion</td>
                <td>$departamento_de_direccion_de_notificacion</td>
                <td>$preparacion_alimentos</td>
                <td>$comedores</td>
                <td>$expendio_de_alimentos</td>
                <td>$grandes_superficies</td>
                <td>$ensamble_de_alimentos</td>
                <td>$almacenamiento</td>
                <td>$venta_en_via_publica</td>
                <td>$expendio_de_bebidas_alcoholicas</td>
                <td>$plaza_de_mercado</td>
                <td>$establecimiento_inspeccionado_entidad_territorial_salud</td>
                <td>$fecha_de_ultima_inspeccion</td>
                <td>$ultimo_concepto_sanitario_emitio</td>
                <td>$funcionario_que_realiza_la_inspeccion</td>
                <td>$observaciones_por_autoridad_sanitaria</td>
                <td>$observaciones_por_responsable_de_la_inscripcion</td>
                <td>$entregado_por_nombre_completo</td>
                <td>$entregado_por_cedula</td>

                <td>$en_calidad_de_responsable</td>
                <td>$recibido_por_nombre_completo</td>
                <td>$recibido_por_cedula</td>

                <td>$en_calidad_de_funcionario</td>
                ";

        echo "</tr>";
        
    }
    echo "</table>";
    $stmt->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario</title>
<style>
/* CSS */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
input[type="date"],
textarea,
select,
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.logout-button {
    display: inline-block;
    padding: 8px 16px;
    background-color: #ff4d4d;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    font-family: Arial, sans-serif;
    cursor: pointer;

    position: absolute;
    top: 10px;
    right: 10px;
}
</style>
<a href="logout_alimentos_ins_upd.php" class="logout-button">Cerrar sesión</a>
</head>
<body>

</body>
</html>

<script>
function confirmUpdate() {
    return confirm("¿Está seguro que desea cambiar estos datos?");
}
</script>


<script>
function confirmUpdate() {
    return confirm("¿Está seguro que desea cambiar estos datos?");
}
</script>
