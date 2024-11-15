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

// Verificar si se ha enviado el formulario de actualización
if (isset($_POST['update'])) {
    // Recuperar datos del formulario de actualización
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

    // Preparar la consulta SQL para actualizar el registro
    $sql = "UPDATE ins_alimentos SET
        departamento = ?, municipio = ?, fecha = ?, codigo_divipola_departamento = ?, codigo_divipola_municipio = ?,
        numero_inscripcion = ?, razon_social = ?, nombre_comercial = ?, tipo_documento_de_identificacion = ?, numero_identificacion_tributaria = ?,
        nombre_establecimiento_de_comercio = ?, nombre_propietario_del_establecimiento = ?, tipo_documento_per_natural = ?, numero_de_documento = ?,
        direccion_ubicacion_del_establecimiento = ?, zona = ?, barrio = ?, vereda = ?, lugar_de_establecimiento = ?, otro = ?, cual = ?,
        telefono = ?, fax = ?, celular = ?, correo_electronico = ?, direccion_de_notificacion_fisica = ?, direccion_de_notificacion_electronica = ?,
        autoriza_la_notificacion_electronica = ?, municipio_de_direccion_de_notificacion = ?, departamento_de_direccion_de_notificacion = ?,
        preparacion_alimentos = ?, comedores = ?, expendio_de_alimentos = ?, grandes_superficies = ?, ensamble_de_alimentos = ?, almacenamiento = ?,
        venta_en_via_publica = ?, expendio_de_bebidas_alcoholicas = ?, plaza_de_mercado = ?, establecimiento_inspeccionado_entidad_territorial_salud = ?,
        fecha_de_ultima_inspeccion = ?, ultimo_concepto_sanitario_emitio = ?, funcionario_que_realiza_la_inspeccion = ?,
        observaciones_por_autoridad_sanitaria = ?, observaciones_por_responsable_de_la_inscripcion = ?, entregado_por_nombre_completo = ?,
        entregado_por_cedula = ?, en_calidad_de_responsable = ?, recibido_por_nombre_completo = ?, recibido_por_cedula = ?,
        en_calidad_de_funcionario = ?
        WHERE numero_de_documento = ?";

    // Preparar la declaración
    $stmt = $con->prepare($sql);

    // Verificar la preparación de la declaración
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $con->error);
    }

    // Vincular los parámetros
    $stmt->bind_param(
        'sssisssssisssssssssssiiissssssssssssssssssssisssissi',
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
        $entregado_por_cedula, $en_calidad_de_responsable, $recibido_por_nombre_completo, $recibido_por_cedula,
        $en_calidad_de_funcionario, $numero_de_documento
    );

    // Ejecutar la declaración
    if ($stmt->execute()) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Verificar si se ha enviado el formulario de búsqueda
$show_form = false;
if (isset($_POST['search'])) {
    $numero_de_documento = $_POST['numero_de_documento'];

    // Preparar la consulta SQL para buscar el registro
    $sql = "SELECT * FROM ins_alimentos WHERE numero_de_documento = ?";
    $stmt = $con->prepare($sql);

    // Verificar la preparación de la declaración
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $con->error);
    }

    // Vincular el parámetro
    $stmt->bind_param('i', $numero_de_documento);

    // Ejecutar la declaración
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $show_form = true;
    } else {
        echo "No se encontraron registros con ese número de documento.";
    }

    // Cerrar la declaración
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Registro</title>
    <style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            /* Combina los bordes de las celdas */
            border: 1px solid #ddd;
            /* Borde delgadp alrededor de la tabla */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Estilos para el formulario */
        form {
            max-width: 1000px;
            /* Ancho máximo del formulario */
            margin: 20px auto;
            /* Centrar el formulario */
            padding: 20px;
            border: 1px solid #ddd;
            /* Borde alrededor del formulario */
            border-radius: 5px;
        }

        /* Tooltip container */
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
            /* If you want dots under the hoverable text */
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 5px;
            border-radius: 6px;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        /* Estilo del botón de cierre de sesión */
        .logout-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #ff4d4d;
            /* Color de fondo rojo */
            color: #fff;
            /* Color del texto blanco */
            text-align: center;
            text-decoration: none;
            /* Elimina el subrayado del enlace */
            border-radius: 4px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;

            position: absolute;
            top: 10px;
            right: 10px;
        }

        .razonS {
            width: 600px;
        }

        .cual {
            width: 300px;
        }

        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <center><h1>Buscar y Actualizar Registro</h1></center>
    <form method="post" action="">
        <label for="numero_de_documento">Número de Documento:</label>
        <input type="text" name="numero_de_documento" id="numero_de_documento" required>
        <input type="submit" name="search" value="Buscar">
    </form>

    <?php if ($show_form): ?>
    <center><h2>Actualizar Registro</h2></center>
    <form method="post" action="">
        <!-- Aquí van los campos del formulario, rellenados con los datos del registro -->
        <input type="hidden" name="numero_de_documento" value="<?php echo htmlspecialchars($data['numero_de_documento']); ?>">

        <table>
    <tbody>
        <tr>
            <td>Departamento</td>
            <td colspan="2"><input type="text" id="departamento" name="departamento" value="<?php echo htmlspecialchars($data['departamento']); ?>" readonly></td>
            <td><label for="municipio">Municipio</label></td>
            <td colspan="2"><input type="text" id="municipio" name="municipio" value="<?php echo htmlspecialchars($data['municipio']); ?>" readonly></td>
            <td><label for="fecha">Fecha:</label></td>
            <td colspan="2"><input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($data['fecha']); ?>" readonly></td>
        </tr>
        <tr>
            <td>Codigo divipola departamento</td>
            <td colspan="2"><input type="number" id="codigo_divipola_departamento" name="codigo_divipola_departamento" value="<?php echo htmlspecialchars($data['codigo_divipola_departamento']); ?>" maxlength="50" readonly></td>
            <td>Codigo divipola municipio</td>
            <td colspan="2"><input type="text" id="codigo_divipola_municipio" name="codigo_divipola_municipio" value="<?php echo htmlspecialchars($data['codigo_divipola_municipio']); ?>" readonly></td>
            <td>Numero de inscripcion</td>
            <td colspan="2"><input type="text" id="numero_inscripcion" name="numero_inscripcion" value="<?php echo htmlspecialchars($data['numero_inscripcion']); ?>" maxlength="50" readonly></td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <tbody>
        <tr>
            <td>Razón social</td>
            <td colspan="2"><input class="razonS" type="text" id="razon_social" name="razon_social" value="<?php echo htmlspecialchars($data['razon_social']); ?>"></td>
        </tr>
        <tr>
            <td>Nombre comercial</td>
            <td colspan="2"><input class="razonS" type="text" id="nombre_comercial" name="nombre_comercial" value="<?php echo htmlspecialchars($data['nombre_comercial']); ?>"></td>
        </tr>
    </tbody>
</table>

<table>
    <tr>
        <td>Tipo documento de identificacion</td>
        <td colspan="2">
            <input type="text" id="tipo_documento_de_identificacion" name="tipo_documento_de_identificacion" value="<?php echo htmlspecialchars($data['tipo_documento_de_identificacion']); ?>">
            <label for="tipo_documento_de_identificacion">NIT</label>
        </td>
        <td>Numero de informacion tributaria</td>
        <td colspan="2"><input type="number" id="numero_identificacion_tributaria" name="numero_identificacion_tributaria" value="<?php echo htmlspecialchars($data['numero_identificacion_tributaria']); ?>"></td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td>Nombre del establecimiento de comercio</td>
        <td colspan="2"><input class="razonS" type="text" id="nombre_establecimiento_de_comercio" name="nombre_establecimiento_de_comercio" value="<?php echo htmlspecialchars($data['nombre_establecimiento_de_comercio']); ?>"></td>
    </tr>
    <tr>
        <td>Nombre del propietario del establecimiento</td>
        <td colspan="2"><input class="razonS" type="text" id="nombre_propietario_del_establecimiento" name="nombre_propietario_del_establecimiento" value="<?php echo htmlspecialchars($data['nombre_propietario_del_establecimiento']); ?>"></td>
    </tr>
</table>

<table>
    <tr>
        <td>Tipo documento de identificacion</td>
        <td colspan="2"><input type="text" id="tipo_documento_per_natural" name="tipo_documento_per_natural" value="<?php echo htmlspecialchars($data['tipo_documento_per_natural']); ?>"></td>
        <td>Numero de documento</td>
        <td colspan="2"><input type="number" id="numero_de_documento" name="numero_de_documento" value="<?php echo htmlspecialchars($data['numero_de_documento']); ?>" readonly ></td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td><label for="direccion_ubicacion_del_establecimiento">Direccion/Ubicación del establecimiento</label></td>
        <td colspan="2"><input class="razonS" type="text" id="direccion_ubicacion_del_establecimiento" name="direccion_ubicacion_del_establecimiento" value="<?php echo htmlspecialchars($data['direccion_ubicacion_del_establecimiento']); ?>" maxlength="100" required></td>
    </tr>
    <tr>
        <td><label for="zona">Zona</label></td>
        <td colspan="2"><input type="text" id="zona" name="zona" value="<?php echo htmlspecialchars($data['zona']); ?>"></td>
    </tr>
    <tr>
        <td><label for="barrio">Barrio</label></td>
        <td colspan="2"><input type="text" id="barrio" name="barrio" value="<?php echo htmlspecialchars($data['barrio']); ?>" maxlength="50"></td>
    </tr>
    <tr>
        <td><label for="vereda">Vereda</label></td>
        <td colspan="2"><input type="text" id="vereda" name="vereda" value="<?php echo htmlspecialchars($data['vereda']); ?>" maxlength="50"></td>
    </tr>
</table>

<table>
    <tbody>
        <tr>
            <td><label for="lugar_de_establecimiento">Lugar geografico</label></td>
            <td colspan="2"><input type="text" id="lugar_de_establecimiento" name="lugar_de_establecimiento" value="<?php echo htmlspecialchars($data['lugar_de_establecimiento']); ?>"></td>
            <td><label for="otro">Otro</label>
                <input type="text" id="otro" name="otro" value="<?php echo htmlspecialchars($data['otro']); ?>" />
            </td>
            <td><label for="cual">¿Cual?</label></td>
            <td colspan="2"><input class="cual" type="text" id="cual" name="cual" value="<?php echo htmlspecialchars($data['cual']); ?>" maxlength="50"></td>
        </tr>
    </tbody>
</table>

<table>
    <tbody>
        <tr>
            <td><label for="telefono">Telefono</label></td>
            <td colspan="2"><input type="number" id="telefono" name="telefono" value="<?php echo htmlspecialchars($data['telefono']); ?>" maxlength="50"></td>
            <td><label for="fax">Fax</label></td>
            <td colspan="2"><input type="number" id="fax" name="fax" value="<?php echo htmlspecialchars($data['fax']); ?>" maxlength="50"></td>
            <td><label for="celular">Celular</label></td>
            <td colspan="2"><input type="number" id="celular" name="celular" value="<?php echo htmlspecialchars($data['celular']); ?>" maxlength="50"></td>
        </tr>
    </tbody>
</table>

<table>
    <tr>
        <td><label for="correo_electronico">Correo electronico</label></td>
        <td colspan="2"><input class="razonS" type="text" id="correo_electronico" name="correo_electronico" value="<?php echo htmlspecialchars($data['correo_electronico']); ?>" maxlength="50"></td>
    </tr>
    <tr>
        <td><label for="direccion_de_notificacion_fisica">Direccion de notificación fisica</label></td>
        <td colspan="2"><input class="razonS" type="text" id="direccion_de_notificacion_fisica" name="direccion_de_notificacion_fisica" value="<?php echo htmlspecialchars($data['direccion_de_notificacion_fisica']); ?>" maxlength="50" required></td>
    </tr>
</table>

<table>
    <tbody>
        <tr>
            <td><label for="direccion_de_notificacion_electronica">Direccion de notificacion electronica</label></td>
            <td colspan="2"><input class="razonS" type="text" id="direccion_de_notificacion_electronica" name="direccion_de_notificacion_electronica" value="<?php echo htmlspecialchars($data['direccion_de_notificacion_electronica']); ?>" maxlength="50"></td>
            <td><label for="autoriza_la_notificacion_electronica">¿Autoriza la notificación electronica?</label></td>
            <td><input type="text" id="autoriza_la_notificacion_electronica" name="autoriza_la_notificacion_electronica" value="<?php echo htmlspecialchars($data['autoriza_la_notificacion_electronica']); ?>"></td>
        </tr>
    </tbody>
</table>

<table>
    <tbody>
        <tr>
            <td><label for="municipio_de_direccion_de_notificacion">Municipio de dirección de notificación</label></td>
            <td><input type="text" id="municipio_de_direccion_de_notificacion" name="municipio_de_direccion_de_notificacion" value="<?php echo htmlspecialchars($data['municipio_de_direccion_de_notificacion']); ?>"></td>
            <td><label for="departamento_de_direccion_de_notificacion">Departamento de dirección de notificación</label></td>
            <td colspan="2"><input type="text" id="departamento_de_direccion_de_notificacion" name="departamento_de_direccion_de_notificacion" value="<?php echo htmlspecialchars($data['departamento_de_direccion_de_notificacion']); ?>" maxlength="50" readonly></td>
        </tr>
    </tbody>
</table>

<table>
    <tbody>
        <tr>
            <td>Preparación alimentos</td>
            <td colspan="2"><input type="text" id="preparacion_alimentos" name="preparacion_alimentos" value="<?php echo htmlspecialchars($data['preparacion_alimentos']); ?>"></td>
            <td>Ensamble de alimentos</td>
            <td colspan="2"><input type="text" id="ensamble_de_alimentos" name="ensamble_de_alimentos" value="<?php echo htmlspecialchars($data['ensamble_de_alimentos']); ?>"></td>
        </tr>
        <tr>
            <td>Comedores</td>
            <td colspan="2"><input type="text" id="comedores" name="comedores" value="<?php echo htmlspecialchars($data['comedores']); ?>"></td>
            <td>Almacenamiento</td>
            <td colspan="2"><input type="text" id="almacenamiento" name="almacenamiento" value="<?php echo htmlspecialchars($data['almacenamiento']); ?>"></td>
        </tr>
        <tr>
            <td>Expendio de alimentos</td>
            <td colspan="2"><input type="text" id="expendio_de_alimentos" name="expendio_de_alimentos" value="<?php echo htmlspecialchars($data['expendio_de_alimentos']); ?>"></td>
            <td>Venta en via pública</td>
            <td colspan="2"><input type="text" id="venta_en_via_publica" name="venta_en_via_publica" value="<?php echo htmlspecialchars($data['venta_en_via_publica']); ?>"></td>
        </tr>
        <tr>
            <td>Grandes superficies</td>
            <td colspan="2"><input type="text" id="grandes_superficies" name="grandes_superficies" value="<?php echo htmlspecialchars($data['grandes_superficies']); ?>"></td>
            <td>Expendio de bebidas alcohólicas</td>
            <td colspan="2"><input type="text" id="expendio_de_bebidas_alcoholicas" name="expendio_de_bebidas_alcoholicas" value="<?php echo htmlspecialchars($data['expendio_de_bebidas_alcoholicas']); ?>"></td>
        </tr>
    </tbody>
</table>

<table>
    <tbody>
        <tr>
            <td>Plazas de mercado</td>
            <td colspan="2"><input type="text" id="plaza_de_mercado" name="plaza_de_mercado" value="<?php echo htmlspecialchars($data['plaza_de_mercado']); ?>"></td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <tbody>
        <tr>
            <td><label for="establecimiento_inspeccionado_entidad_territorial_salud">¿El establecimiento ha sido inspeccionado por la entidad territorial de salud?</label></td>
            <td colspan="2"><input type="text" id="establecimiento_inspeccionado_entidad_territorial_salud" name="establecimiento_inspeccionado_entidad_territorial_salud" value="<?php echo htmlspecialchars($data['establecimiento_inspeccionado_entidad_territorial_salud']); ?>"></td>
        </tr>
    </tbody>
</table>

<table>
    <tbody>
        <tr>
            <td><label for="fecha_de_ultima_inspeccion">Fecha de la ultima inspección (dd-mm-aa)</label></td>
            <td colspan="2"><input type="text" id="fecha_de_ultima_inspeccion" name="fecha_de_ultima_inspeccion" value="<?php echo htmlspecialchars($data['fecha_de_ultima_inspeccion']); ?>"></td>
            <td><label for="ultimo_concepto_sanitario_emitio">Ultimo concepto sanitario emitido</label></td>
            <td colspan="2"><input type="text" id="ultimo_concepto_sanitario_emitio" name="ultimo_concepto_sanitario_emitio" value="<?php echo htmlspecialchars($data['ultimo_concepto_sanitario_emitio']); ?>"></td>
        </tr>
    </tbody>
</table>

<table>
    <tbody>
        <tr>
            <td><label for="funcionario_que_realiza_la_inspeccion">Funcionario que realiza la inspección</label></td>
            <td colspan="2"><input class="razonS" type="text" id="funcionario_que_realiza_la_inspeccion" name="funcionario_que_realiza_la_inspeccion" value="<?php echo htmlspecialchars($data['funcionario_que_realiza_la_inspeccion']); ?>"></td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <tbody>
        <tr>
            <td><label for="observaciones_por_autoridad_sanitaria">Observaciones por parte de la autoridad sanitaria cuando se recibe el formulario</label></td>
        </tr>
        <tr>
            <td><textarea id="observaciones_por_autoridad_sanitaria" name="observaciones_por_autoridad_sanitaria" value="<?php echo htmlspecialchars($data['observaciones_por_autoridad_sanitaria']); ?>" rows="6" cols="100" maxlength="500"></textarea></td>
        </tr>
    </tbody>
</table>

<table>
    <tbody>
        <tr>
            <td><label for="observaciones_por_responsable_de_la_inscripcion">Observaciones por parte del responsable de la inscripcion del sujeto o establecimiento</label></td>
        </tr>
        <tr>
            <td><textarea id="observaciones_por_responsable_de_la_inscripcion" name="observaciones_por_responsable_de_la_inscripcion" value="<?php echo htmlspecialchars($data['observaciones_por_responsable_de_la_inscripcion']); ?>" rows="6" cols="100" maxlength="500"></textarea></td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <tbody>
        <tr>
            <td><label for="entregado_por_nombre_completo">Nombre completo</label></td>
            <td colspan="2"><input type="text" id="entregado_por_nombre_completo" name="entregado_por_nombre_completo" value="<?php echo htmlspecialchars($data['entregado_por_nombre_completo']); ?>"></td>

        </tr>
        <tr>
            <td><label for="entregado_por_cedula">Cedula</label></td>
            <td colspan="2"><input type="number" id="entregado_por_cedula" name="entregado_por_cedula" value="<?php echo htmlspecialchars($data['entregado_por_cedula']); ?>"></td>
            <td><label for="en_calidad_de_responsable">En calidad de</label></td>
            <td colspan="2"><input class="cual" type="text" id="en_calidad_de_responsable" name="en_calidad_de_responsable" value="<?php echo htmlspecialchars($data['en_calidad_de_responsable']); ?>"></td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <tbody>
        <tr>
            <td><label for="recibido_por_nombre_completo">Nombre completo</label></td>
            <td colspan="2"><input type="text" id="recibido_por_nombre_completo" name="recibido_por_nombre_completo" value="<?php echo htmlspecialchars($data['recibido_por_nombre_completo']); ?>"></td>

        </tr>
        <tr>
            <td><label for="recibido_por_cedula">Cedula</label></td>
            <td colspan="2"><input type="number" id="recibido_por_cedula" name="recibido_por_cedula" value="<?php echo htmlspecialchars($data['recibido_por_cedula']); ?>"></td>
            <td><label for="en_calidad_de_funcionario">En calidad de</label></td>
            <td colspan="2"><input class="cual" type="text" id="en_calidad_de_funcionario" name="en_calidad_de_funcionario" value="<?php echo htmlspecialchars($data['en_calidad_de_funcionario']); ?>"></td>
        </tr>
    </tbody>
</table>
<br>
        <table>
            <tr>
        <td><input type="submit" name="update" value="Actualizar"></td>
    </tr>
    </table>
    </form>
    <?php endif; ?>
</body>
</html>

<?php
// Cerrar la conexión
$con->close();
?>
