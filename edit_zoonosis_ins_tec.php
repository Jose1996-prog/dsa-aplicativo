<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['zoonosis'])) {
    header('Location: login_zoonosis_ins_upd.php');
    exit;
}

$host = "localhost";
$port = 3306;
$socket = "";
$user = "root";
$password = "1996";
$dbname = "zoonosis";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die('Could not connect to the database server' . mysqli_connect_error());

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $numero_de_inscripcion = $_POST['numero_de_inscripcion'];
        $tipo_de_establecimiento = $_POST['tipo_de_establecimiento'];
        $nombre_comercial_del_objeto = $_POST['nombre_comercial_del_objeto'];
        $departamento = $_POST['departamento'];
        $municipio = $_POST['municipio'];
        $lugar_del_establecimiento = $_POST['lugar_del_establecimiento'];
        $otro = $_POST['otro'];
        $cual = $_POST['cual'];
        $direccion_establecimiento = $_POST['direccion_establecimiento'];
        $telefono_establecimiento = $_POST['telefono_establecimiento'];
        $tipo_de_persona = $_POST['tipo_de_persona'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $nombres = $_POST['nombres'];
        $documento_de_identificacion = $_POST['documento_de_identificacion'];
        $numero_de_documento = $_POST['numero_de_documento'];
        $direccion_de_notificacion = $_POST['direccion_de_notificacion'];
        $telefonos = $_POST['telefonos'];
        $correo_electronico_propietario = $_POST['correo_electronico_propietario'];
        $el_establecimiento_inspeccionado_por_entidad_salud = $_POST['el_establecimiento_inspeccionado_por_entidad_salud'];
        $fecha_de_ultima_inspeccion = $_POST['fecha_de_ultima_inspeccion'];
        $ultimo_concepto_sanitario = $_POST['ultimo_concepto_sanitario'];
        $establecimiento_inspeccionado_entidad_territorial_salud = $_POST['establecimiento_inspeccionado_entidad_territorial_salud'];
        $fecha_de_ultima_inspeccion_2 = $_POST['fecha_de_ultima_inspeccion_2'];
        $ultimo_concepto_sanitario_emitio = $_POST['ultimo_concepto_sanitario_emitio'];
        $dia_laboral_1 = $_POST['dia_laboral_1'];
        $dia_laboral_2 = $_POST['dia_laboral_2'];
        $hora_laboral_1 = $_POST['hora_laboral_1'];
        $hora_laboral_2 = $_POST['hora_laboral_2'];
        $dia_laboral_3 = $_POST['dia_laboral_3'];
        $dia_laboral_4 = $_POST['dia_laboral_4'];
        $hora_laboral_3 = $_POST['hora_laboral_3'];
        $hora_laboral_4 = $_POST['hora_laboral_4'];
        $nombre = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $cargo = $_POST['cargo'];
        $telefono = $_POST['telefono'];
        $nombre_2 = $_POST['nombre_2'];
        $cedula_2 = $_POST['cedula_2'];
        $cargo_2 = $_POST['cargo_2'];
        $telefono_2 = $_POST['telefono_2'];
    

    // Preparar la consulta de actualización
    $update_query = "UPDATE ins_zoonosis
                        SET
                            fecha = ?,
                            numero_de_inscripcion = ?,
                            tipo_de_establecimiento = ?,
                            nombre_comercial_del_objeto = ?,
                            departamento = ?,
                            municipio = ?,
                            lugar_del_establecimiento = ?,
                            otro = ?,
                            cual = ?,
                            direccion_establecimiento = ?,
                            telefono_establecimiento = ?,
                            tipo_de_persona = ?,
                            primer_apellido = ?,
                            segundo_apellido = ?,
                            nombres = ?,
                            documento_de_identificacion = ?,
                            numero_de_documento = ?,
                            direccion_de_notificacion = ?,
                            telefonos = ?,
                            correo_electronico_propietario = ?,
                            el_establecimiento_inspeccionado_por_entidad_salud = ?,
                            fecha_de_ultima_inspeccion = ?,
                            ultimo_concepto_sanitario = ?,
                            establecimiento_inspeccionado_entidad_territorial_salud = ?,
                            fecha_de_ultima_inspeccion_2 = ?,
                            ultimo_concepto_sanitario_emitio = ?,
                            dia_laboral_1 = ?,
                            dia_laboral_2 = ?,
                            hora_laboral_1 = ?,
                            hora_laboral_2 = ?,
                            dia_laboral_3 = ?,
                            dia_laboral_4 = ?,
                            hora_laboral_3 = ?,
                            hora_laboral_4 = ?,
                            nombre = ?,
                            cedula = ?,
                            cargo = ?,
                            telefono = ?,
                            nombre_2 = ?,
                            cedula_2 = ?,
                            cargo_2 = ?,
                            telefono_2 = ?
                        WHERE
                            id = ?";

    if ($stmt = $con->prepare($update_query)) {

        $stmt->bind_param("ssssssssssisssssssissssssssssssssssisisisii", 
        $fecha,
        $numero_de_inscripcion,
        $tipo_de_establecimiento,
        $nombre_comercial_del_objeto,
        $departamento,
        $municipio,
        $lugar_del_establecimiento,
        $otro,
        $cual,
        $direccion_establecimiento,
        $telefono_establecimiento,
        $tipo_de_persona,
        $primer_apellido,
        $segundo_apellido,
        $nombres,
        $documento_de_identificacion,
        $numero_de_documento,
        $direccion_de_notificacion,
        $telefonos,
        $correo_electronico_propietario,
        $el_establecimiento_inspeccionado_por_entidad_salud,
        $fecha_de_ultima_inspeccion,
        $ultimo_concepto_sanitario,
        $establecimiento_inspeccionado_entidad_territorial_salud,
        $fecha_de_ultima_inspeccion_2,
        $ultimo_concepto_sanitario_emitio,
        $dia_laboral_1,
        $dia_laboral_2,
        $hora_laboral_1,
        $hora_laboral_2,
        $dia_laboral_3,
        $dia_laboral_4,
        $hora_laboral_3,
        $hora_laboral_4,
        $nombre,
        $cedula,
        $cargo,
        $telefono,
        $nombre_2,
        $cedula_2,
        $cargo_2,
        $telefono_2,
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
    
    $query = "SELECT
                fecha,
                numero_de_inscripcion,
                tipo_de_establecimiento,
                nombre_comercial_del_objeto,
                departamento,
                municipio,
                lugar_del_establecimiento,
                otro,
                cual,
                direccion_establecimiento,
                telefono_establecimiento,
                tipo_de_persona,
                primer_apellido,
                segundo_apellido,
                nombres,
                documento_de_identificacion,
                numero_de_documento,
                direccion_de_notificacion,
                telefonos,
                correo_electronico_propietario,
                el_establecimiento_inspeccionado_por_entidad_salud,
                fecha_de_ultima_inspeccion,
                ultimo_concepto_sanitario,
                establecimiento_inspeccionado_entidad_territorial_salud,
                fecha_de_ultima_inspeccion_2,
                ultimo_concepto_sanitario_emitio,
                dia_laboral_1,
                dia_laboral_2,
                hora_laboral_1,
                hora_laboral_2,
                dia_laboral_3,
                dia_laboral_4,
                hora_laboral_3,
                hora_laboral_4,
                nombre,
                cedula,
                cargo,
                telefono,
                nombre_2,
                cedula_2,
                cargo_2,
                telefono_2
            FROM
                ins_zoonosis
            WHERE
                id = ?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result(
            $fecha,
            $numero_de_inscripcion,
            $tipo_de_establecimiento,
            $nombre_comercial_del_objeto,
            $departamento,
            $municipio,
            $lugar_del_establecimiento,
            $otro,
            $cual,
            $direccion_establecimiento,
            $telefono_establecimiento,
            $tipo_de_persona,
            $primer_apellido,
            $segundo_apellido,
            $nombres,
            $documento_de_identificacion,
            $numero_de_documento,
            $direccion_de_notificacion,
            $telefonos,
            $correo_electronico_propietario,
            $el_establecimiento_inspeccionado_por_entidad_salud,
            $fecha_de_ultima_inspeccion,
            $ultimo_concepto_sanitario,
            $establecimiento_inspeccionado_entidad_territorial_salud,
            $fecha_de_ultima_inspeccion_2,
            $ultimo_concepto_sanitario_emitio,
            $dia_laboral_1,
            $dia_laboral_2,
            $hora_laboral_1,
            $hora_laboral_2,
            $dia_laboral_3,
            $dia_laboral_4,
            $hora_laboral_3,
            $hora_laboral_4,
            $nombre,
            $cedula,
            $cargo,
            $telefono,
            $nombre_2,
            $cedula_2,
            $cargo_2,
            $telefono_2
        );

        if ($stmt->fetch()) {
            echo '<form action="edit_zoonosis_ins_tec.php" method="post">';
            echo '<table>';
            
            echo '<tr>';
            echo '<td><label for="id">ID:</label></td>';
            echo '<td><input type="number" id="id" name="id" value="' . htmlspecialchars($id) . '" readonly></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="fecha">Fecha:</label></td>';
            echo '<td colspan="2"><input type="date" id="fecha" name="fecha" value="' . htmlspecialchars($fecha) . '">';
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="numero_de_inscripcion">Numero de inscripcion:</label></td>';
            echo '<td colspan="2"><input type="number" id="numero_de_inscripcion" name="numero_de_inscripcion" value="' . htmlspecialchars($numero_de_inscripcion) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="tipo_de_establecimiento">Tipo de establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="tipo_de_establecimiento" name="tipo_de_establecimiento" value="' . htmlspecialchars($tipo_de_establecimiento) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_comercial_del_objeto">Nombre comercial del objeto:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_comercial_del_objeto" name="nombre_comercial_del_objeto" value="' . htmlspecialchars($tipo_de_establecimiento) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="departamento">Departamento:</label></td>';
            echo '<td colspan="2"><input type="text" id="departamento" name="departamento" value="' . htmlspecialchars($departamento) . '" maxlength="40">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="municipio">Municipio:</label></td>';
            echo '<td colspan="2"><input type="text" id="municipio" name="municipio" value="' . htmlspecialchars($municipio) . '" maxlength="30">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="lugar_del_establecimiento">Lugar del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="lugar_del_establecimiento" name="lugar_del_establecimiento" value="' . htmlspecialchars($lugar_del_establecimiento) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="otro">Otro:</label></td>';
            echo '<td colspan="2"><input type="text" id="otro" name="otro" value="' . htmlspecialchars($otro) . '" maxlength="2">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cual">Cual:</label></td>';
            echo '<td colspan="2"><input type="text" id="cual" name="cual" value="' . htmlspecialchars($cual) . '"  maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="direccion_establecimiento">Direccion del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="direccion_establecimiento" name="direccion_establecimiento" value="' . htmlspecialchars($direccion_establecimiento) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="telefono_establecimiento">Telefono del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="number" id="telefono_establecimiento" name="telefono_establecimiento" value="' . htmlspecialchars($telefono_establecimiento) . '" maxlength="10">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="tipo_de_persona">Tipo de persona:</label></td>';
            echo '<td colspan="2"><input type="text" id="tipo_de_persona" name="tipo_de_persona" value="' . htmlspecialchars($tipo_de_persona) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="primer_apellido">Primer apellido:</label></td>';
            echo '<td colspan="2"><input type="text" id="primer_apellido" name="primer_apellido" value="' . htmlspecialchars($primer_apellido) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="segundo_apellido">Segundo apellido:</label></td>';
            echo '<td colspan="2"><input type="text" id="segundo_apellido" name="segundo_apellido" value="' . htmlspecialchars($segundo_apellido) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombres">Nombres:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombres" name="nombres" value="' . htmlspecialchars($nombres) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="documento_de_identificacion">Documento de identificacion:</label></td>';
            echo '<td colspan="2"><input type="text" id="documento_de_identificacion" name="documento_de_identificacion" value="' . htmlspecialchars($documento_de_identificacion) . '" maxlength="3">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="numero_de_documento">Numero del documento:</label></td>';
            echo '<td colspan="2"><input type="number" id="numero_de_documento" name="numero_de_documento" value="' . htmlspecialchars($numero_de_documento) . '" maxlength="30">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="direccion_de_notificacion">direccion_de_notificacion:</label></td>';
            echo '<td colspan="2"><input type="text" id="direccion_de_notificacion" name="direccion_de_notificacion" value="' . htmlspecialchars($direccion_de_notificacion) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="telefonos">Telefonos:</label></td>';
            echo '<td colspan="2"><input type="number" id="telefonos" name="telefonos" value="' . htmlspecialchars($telefonos) . '"  maxlength="10">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="correo_electronico_propietario">Correo electronico del propietario:</label></td>';
            echo '<td colspan="2"><input type="text" id="correo_electronico_propietario" name="correo_electronico_propietario" value="' . htmlspecialchars($correo_electronico_propietario) . '"  maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="el_establecimiento_inspeccionado_por_entidad_salud">¿El establecimiento ha sido inspeccionado por la entidad territorial de salud?</label></td>';
            echo '<td colspan="2"><input type="text" id="el_establecimiento_inspeccionado_por_entidad_salud" name="el_establecimiento_inspeccionado_por_entidad_salud" value="' . htmlspecialchars($el_establecimiento_inspeccionado_por_entidad_salud) . '" maxlength="2">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="fecha_de_ultima_inspeccion">Fecha de ultima inspeccion (dd-mm-aaaa):</label></td>';
            echo '<td colspan="2"><input type="text" id="fecha_de_ultima_inspeccion" name="fecha_de_ultima_inspeccion" value="' . htmlspecialchars($fecha_de_ultima_inspeccion) . '"  maxlength="10">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="ultimo_concepto_sanitario">Ultimo concepto sanitario:</label></td>';
            echo '<td colspan="2"><input type="text" id="ultimo_concepto_sanitario" name="ultimo_concepto_sanitario" value="' . htmlspecialchars($ultimo_concepto_sanitario) . '"  maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="establecimiento_inspeccionado_entidad_territorial_salud">¿El establecimiento ha sido
                    inspeccionado por la entidad territorial de salud?</label></td>';
            echo '<td colspan="2"><input type="text" id="establecimiento_inspeccionado_entidad_territorial_salud" name="establecimiento_inspeccionado_entidad_territorial_salud" value="' . htmlspecialchars($establecimiento_inspeccionado_entidad_territorial_salud) . '" maxlength="2">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="fecha_de_ultima_inspeccion_2">Fecha de ultima inspeccion (dd-mm-aaaa):</label></td>';
            echo '<td colspan="2"><input type="text" id="fecha_de_ultima_inspeccion_2" name="fecha_de_ultima_inspeccion_2" value="' . htmlspecialchars($fecha_de_ultima_inspeccion_2) . '" maxlength="10">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="ultimo_concepto_sanitario_emitio">Ultimo concepto sanitario emitido:</label></td>';
            echo '<td colspan="2"><input type="text" id="ultimo_concepto_sanitario_emitio" name="ultimo_concepto_sanitario_emitio" value="' . htmlspecialchars($ultimo_concepto_sanitario_emitio) . '"  maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="dia_laboral_1">Dia laboral incio:</label></td>';
            echo '<td colspan="2"><input type="text" id="dia_laboral_1" name="dia_laboral_1" value="' . htmlspecialchars($dia_laboral_1) . '" maxlength="9">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="dia_laboral_2">Dia laboral fin:</label></td>';
            echo '<td colspan="2"><input type="text" id="dia_laboral_2" name="dia_laboral_2" value="' . htmlspecialchars($dia_laboral_2) . '" maxlength="9">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="hora_laboral_1">Hora de entrada:</label></td>';
            echo '<td colspan="2"><input type="time" id="hora_laboral_1" name="hora_laboral_1" value="' . htmlspecialchars($hora_laboral_1) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="hora_laboral_2">Hora de salida:</label></td>';
            echo '<td colspan="2"><input type="time" id="hora_laboral_2" name="hora_laboral_2" value="' . htmlspecialchars($hora_laboral_2) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="dia_laboral_3">Dia laboral incio:</label></td>';
            echo '<td colspan="2"><input type="text" id="dia_laboral_3" name="dia_laboral_3" value="' . htmlspecialchars($dia_laboral_3) . '" maxlength="9">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="dia_laboral_4">Dia laboral fin:</label></td>';
            echo '<td colspan="2"><input type="text" id="dia_laboral_4" name="dia_laboral_4" value="' . htmlspecialchars($dia_laboral_4) . '" maxlength="9">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="hora_laboral_3">Hora de entrada:</label></td>';
            echo '<td colspan="2"><input type="time" id="hora_laboral_3" name="hora_laboral_3" value="' . htmlspecialchars($hora_laboral_3) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="hora_laboral_4">Hora de salida:</label></td>';
            echo '<td colspan="2"><input type="time" id="hora_laboral_4" name="hora_laboral_4" value="' . htmlspecialchars($hora_laboral_4) . '">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre">Nombre:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre" name="nombre" value="' . htmlspecialchars($nombre) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cedula">Cedula:</label></td>';
            echo '<td colspan="2"><input type="number" id="cedula" name="cedula" value="' . htmlspecialchars($cedula) . '" maxlength="15">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cargo">Cargo:</label></td>';
            echo '<td colspan="2"><input type="text" id="cargo" name="cargo" value="' . htmlspecialchars($cargo) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="telefono">Telefono:</label></td>';
            echo '<td colspan="2"><input type="number" id="telefono" name="telefono" value="' . htmlspecialchars($telefono) . '" maxlength="10">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_2">Nombre:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_2" name="nombre_2" value="' . htmlspecialchars($nombre_2) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cedula_2">Cedula:</label></td>';
            echo '<td colspan="2"><input type="number" id="cedula_2" name="cedula_2" value="' . htmlspecialchars($cedula_2) . '" maxlength="15">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cargo_2">Cargo:</label></td>';
            echo '<td colspan="2"><input type="text" id="cargo_2" name="cargo_2" value="' . htmlspecialchars($cargo_2) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="telefono_2">Telefono:</label></td>';
            echo '<td colspan="2"><input type="number" id="telefono_2" name="telefono_2" value="' . htmlspecialchars($telefono_2) . '" maxlength="10">';
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
$query = "SELECT * FROM ins_zoonosis";

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result(
        $id,
        $fecha,
        $numero_de_inscripcion,
        $tipo_de_establecimiento,
        $nombre_comercial_del_objeto,
        $departamento,
        $municipio,
        $lugar_del_establecimiento,
        $otro,
        $cual,
        $direccion_establecimiento,
        $telefono_establecimiento,
        $tipo_de_persona,
        $primer_apellido,
        $segundo_apellido,
        $nombres,
        $documento_de_identificacion,
        $numero_de_documento,
        $direccion_de_notificacion,
        $telefonos,
        $correo_electronico_propietario,
        $el_establecimiento_inspeccionado_por_entidad_salud,
        $fecha_de_ultima_inspeccion,
        $ultimo_concepto_sanitario,
        $establecimiento_inspeccionado_entidad_territorial_salud,
        $fecha_de_ultima_inspeccion_2,
        $ultimo_concepto_sanitario_emitio,
        $dia_laboral_1,
        $dia_laboral_2,
        $hora_laboral_1,
        $hora_laboral_2,
        $dia_laboral_3,
        $dia_laboral_4,
        $hora_laboral_3,
        $hora_laboral_4,
        $nombre,
        $cedula,
        $cargo,
        $telefono,
        $nombre_2,
        $cedula_2,
        $cargo_2,
        $telefono_2
    );
    
    echo "<h2>Selecciona un registro para editar:</h2>";
    echo "<table border='1' height='500px'>";
    echo "<tr>

        <th>Accion</th>
        <th>id</th>
        <th>fecha</th>
        <th>numero de inscripcion</th>
        <th>tipo de establecimiento</th>
        <th>nombre comercial del objeto</th>
        <th>departamento</th>
        <th>municipio</th>
        <th>lugar del establecimiento</th>
        <th>otro</th>
        <th>cual</th>
        <th>direccion establecimiento</th>
        <th>telefono establecimiento</th>
        <th>tipo de persona</th>
        <th>primer apellido</th>
        <th>segundo apellido</th>
        <th>nombres</th>
        <th>documento de identificacion</th>
        <th>numero de documento</th>
        <th>direccion de notificacion</th>
        <th>telefonos</th>
        <th>correo electronico propietario</th>
        <th>el establecimiento inspeccionado por entidad salud</th>
        <th>fecha de ultima inspeccion</th>
        <th>ultimo concepto sanitario</th>
        <th>establecimiento inspeccionado entidad territorial salud</th>
        <th>fecha de ultima inspeccion 2</th>
        <th>ultimo concepto sanitario emitio</th>
        <th>dia laboral inicio</th>
        <th>dia laboral fin</th>
        <th>hora laboral entrada</th>
        <th>hora laboral salida</th>
        <th>dia laboral inicio</th>
        <th>dia laboral fin</th>
        <th>hora laboral entrada</th>
        <th>hora laboral salida</th>
        <th>nombre</th>
        <th>cedula</th>
        <th>cargo</th>
        <th>telefono</th>
        <th>nombre 2</th>
        <th>cedula 2</th>
        <th>cargo 2</th>
        <th>telefono 2</th>

          </tr>";

    while ($stmt->fetch()) {

        echo "<tr>";
        echo "<td>";

        echo "<form action='edit_zoonosis_ins_tec.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='submit' value='Editar'>";

        echo "</form>";
        echo "</td>";

        echo   "
                <td>$id</td>
                <td>$fecha</td>
                <td>$numero_de_inscripcion</td>
                <td>$tipo_de_establecimiento</td>
                <td>$nombre_comercial_del_objeto</td>
                <td>$departamento</td>
                <td>$municipio</td>
                <td>$lugar_del_establecimiento</td>
                <td>$otro</td>
                <td>$cual</td>
                <td>$direccion_establecimiento</td>
                <td>$telefono_establecimiento</td>
                <td>$tipo_de_persona</td>
                <td>$primer_apellido</td>
                <td>$segundo_apellido</td>
                <td>$nombres</td>
                <td>$documento_de_identificacion</td>
                <td>$numero_de_documento</td>
                <td>$direccion_de_notificacion</td>
                <td>$telefonos</td>
                <td>$correo_electronico_propietario</td>
                <td>$el_establecimiento_inspeccionado_por_entidad_salud</td>
                <td>$fecha_de_ultima_inspeccion</td>
                <td>$ultimo_concepto_sanitario</td>
                <td>$establecimiento_inspeccionado_entidad_territorial_salud</td>
                <td>$fecha_de_ultima_inspeccion_2</td>
                <td>$ultimo_concepto_sanitario_emitio</td>
                <td>$dia_laboral_1</td>
                <td>$dia_laboral_2</td>
                <td>$hora_laboral_1</td>
                <td>$hora_laboral_2</td>
                <td>$dia_laboral_3</td>
                <td>$dia_laboral_4</td>
                <td>$hora_laboral_3</td>
                <td>$hora_laboral_4</td>
                <td>$nombre</td>
                <td>$cedula</td>
                <td>$cargo</td>
                <td>$telefono</td>
                <td>$nombre_2</td>
                <td>$cedula_2</td>
                <td>$cargo_2</td>
                <td>$telefono_2</td>
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
<a href="logout_zoonosis_ins_upd.php" class="logout-button">Cerrar sesión</a>
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
