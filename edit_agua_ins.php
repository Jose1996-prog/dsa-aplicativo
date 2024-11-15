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

// Función para verificar si existe un registro
function verificarRegistro($con, $numero_de_documento) {
    $sql = "SELECT * FROM ins_agua WHERE numero_de_documento = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $numero_de_documento);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Verificar si se envió el formulario de verificación
if (isset($_POST['verificar'])) {
    $numero_de_documento = $_POST['numero_de_documento'];
    $registro = verificarRegistro($con, $numero_de_documento);

    if ($registro) {
        echo "Registro encontrado, puede proceder a modificarlo.";
    } else {
        echo "No se encontró ningún registro con ese número de documento.";
    }
}

// Si el formulario de actualización ha sido enviado
if (isset($_POST['actualizar'])) {
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

    // Preparar la consulta SQL para actualizar
    $sql = "UPDATE ins_agua SET
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
        direccion_de_notificacion = ?, 
        telefonos = ?, 
        correo_electronico_propietario = ?, 
        el_establecimiento_inspeccionado_por_entidad_salud = ?, 
        fecha_de_ultima_inspeccion = ?, 
        ultimo_concepto_sanitario = ?, 
        dia_laboral_1 = ?, 
        dia_laboral_2 = ?, 
        hora_laboral_1 = ?, 
        hora_laboral_2 = ?, 
        dia_laboral_3 = ?, 
        dia_laboral_4 = ?, 
        hora_laboral_3 = ?, 
        hora_laboral_4 = ?,  
        establecimiento_inspeccionado_entidad_territorial_salud = ?, 
        fecha_de_ultima_inspeccion_2 = ?, 
        ultimo_concepto_sanitario_emitio = ?, 
        nombre = ?, 
        cedula = ?, 
        cargo = ?, 
        telefono = ?, 
        nombre_2 = ?, 
        cedula_2 = ?, 
        cargo_2 = ?, 
        telefono_2 = ?
        WHERE numero_de_documento = ?";

    // Preparar y ejecutar la consulta
    $stmt = $con->prepare($sql);

    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $con->error);
    }

    // Enlazar los parámetros
    $stmt->bind_param('sssssssssssssssssissssssssssssssssisisisis', 
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
    $direccion_de_notificacion, 
    $telefonos, 
    $correo_electronico_propietario, 
    $el_establecimiento_inspeccionado_por_entidad_salud, 
    $fecha_de_ultima_inspeccion, 
    $ultimo_concepto_sanitario, 
    $dia_laboral_1, 
    $dia_laboral_2, 
    $hora_laboral_1, 
    $hora_laboral_2, 
    $dia_laboral_3, 
    $dia_laboral_4, 
    $hora_laboral_3, 
    $hora_laboral_4, 
    $establecimiento_inspeccionado_entidad_territorial_salud, 
    $fecha_de_ultima_inspeccion_2, 
    $ultimo_concepto_sanitario_emitio, 
    $nombre, 
    $cedula, 
    $cargo, 
    $telefono, 
    $nombre_2, 
    $cedula_2, 
    $cargo_2, 
    $telefono_2,
    $numero_de_documento 
    );

    if ($stmt->execute()) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
}
$con->close();
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
            max-width: 800px;
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
            width: 400px;
        }

        .dir_est {
            width: 400px;
        }

        .obj_comer {
            width: 400px;
        }
    </style>

</head>
<body>
    <center><h2>Verificar y Actualizar Registro</h2></center>
    <form method="post" action="">
        <label for="numero_de_documento">Número de Documento:</label>
        <input type="text" name="numero_de_documento" required>
        <input type="submit" name="verificar" value="Verificar">
    </form>

    <?php if (isset($registro) && $registro) : ?>
        <!-- Formulario de actualización -->
        <form method="post" action="">

    <table>
        <tr>
            <td><label for="fecha">Fecha:</label></td>
            <td colspan="2"><input type="date" id="fecha" name="fecha" value="<?php echo $registro['fecha']; ?>" readonly></td>
        </tr>

    </table>

    <br>
        <!-- IDENTIFICACION DE OBJETO -->
        <table>
        <tr>
            <td><label for="tipo_de_establecimiento">Tipo de establecimiento:</label></td>
            <td colspan="2"><input type="text" id="tipo_de_establecimiento" name="tipo_de_establecimiento" value="<?php echo $registro['tipo_de_establecimiento']; ?>"></td>
        </tr>

        <tr>
            <td><label for="nombre_comercial_del_objeto">Nombre del objeto comercial:</label></td>
            <td colspan="2"><input class="obj_comer" type="text" id="nombre_comercial_del_objeto"
                    name="nombre_comercial_del_objeto" value="<?php echo $registro['nombre_comercial_del_objeto']; ?>" maxlength="100"></td>
        </tr>

        <tr>
            <td><label for="departamento">Departamento:</label></td>
            <td colspan="2"><input type="text" id="departamento" name="departamento" value="<?php echo $registro['departamento']; ?>" value="Sucre" readonly></td>
        </tr>

        <tr>
            <td><label for="municipio">Municipio:</label></td>
            <td colspan="2"><input type="text" id="municipio" name="municipio" value="<?php echo $registro['municipio']; ?>"></td>
        </tr>

        <tr>
            <td><label for="lugar_del_establecimiento">Lugar del establecimiento:</label></td>
            <td colspan="2"><input type="text" id="lugar_del_establecimiento" name="lugar_del_establecimiento" value="<?php echo $registro['lugar_del_establecimiento']; ?>"></td>
        </tr>

        <tr>
            <td><label for="otro">Otro lugar del establecimiento</label></td>
            <td><input type="text" id="otro" name="otro" value="<?php echo $registro['otro']; ?>" maxlength="2"></td>
        </tr>

        <tr>
            <td><label for="cual">¿Cuál?</label></td>
            <td colspan="2"><input class="cual" type="text" id="cual" name="cual" value="<?php echo $registro['cual']; ?>" maxlength="100"></td>
        </tr>

        <tr>
            <td><label for="direccion_establecimiento">Dirección de establecimiento:</label></td>
            <td colspan="2"><input class="dir_est" type="text" id="direccion_establecimiento"
                    name="direccion_establecimiento" value="<?php echo $registro['direccion_establecimiento']; ?>" maxlength="100"></td>
        </tr>

        <tr>
            <td><label for="telefono_establecimiento">Teléfono de establecimiento:</label></td>
            <td colspan="2"><input type="number" id="telefono_establecimiento" name="telefono_establecimiento" value="<?php echo $registro['telefono_establecimiento']; ?>"
                    maxlength="50"></td>
        </tr>
    </table>
    <br>
    <!-- NUMERO DE INSCRIPCION -->
    <table>
    <tr>
            <td><label for="numero_de_inscripcion">Número de inscripción:</label></td>
            <td colspan="2"><input type="number" id="numero_de_inscripcion" name="numero_de_inscripcion" value="<?php echo $registro['numero_de_inscripcion']; ?>" readonly></td>
        </tr>
    </table>    
        
    <br>
    <!-- DATOS DEL REPRESENTANTE LEGAL Y/O PROPIETARIO -->
    <table>
        <tr>
            <td><label for="tipo_de_persona">Tipo de persona:</label></td>
            <td colspan="2"><input type="text" id="tipo_de_persona" name="tipo_de_persona" value="<?php echo $registro['tipo_de_persona']; ?>"></td>
        </tr>

        <tr>
            <td><label for="primer_apellido">Primer apellido:</label></td>
            <td colspan="2"><input type="text" id="primer_apellido" name="primer_apellido" value="<?php echo $registro['primer_apellido']; ?>" maxlength="50"></td>
        </tr>

        <tr>
            <td><label for="segundo_apellido">Segundo apellido:</label></td>
            <td colspan="2"><input type="text" id="segundo_apellido" name="segundo_apellido" value="<?php echo $registro['segundo_apellido']; ?>" maxlength="50"></td>
        </tr>

        <tr>
            <td><label for="nombres">Nombres:</label></td>
            <td colspan="2"><input type="text" id="nombres" name="nombres" value="<?php echo $registro['nombres']; ?>" maxlength="50"></td>
        </tr>

        <tr>
            <td><label for="documento_de_identificacion">Documento de identificación:</label></td>
            <td colspan="2"><input type="text" id="documento_de_identificacion" name="documento_de_identificacion" value="<?php echo $registro['documento_de_identificacion']; ?>" maxlength="3"></td>
        </tr>

        <tr>
            <td><label for="numero_de_documento">Número del documento:</label></td>
            <td colspan="2"><input type="number" id="numero_de_documento" name="numero_de_documento" value="<?php echo $registro['numero_de_documento']; ?>" maxlength="50"
                    required readonly></td>
        </tr>

        <tr>
            <td><label for="direccion_de_notificacion">Dirección de notificación:</label></td>
            <td colspan="2"><input type="text" id="direccion_de_notificacion" name="direccion_de_notificacion" value="<?php echo $registro['direccion_de_notificacion']; ?>"
                    maxlength="100"></td>
        </tr>

        <tr>
            <td><label for="telefonos">Teléfonos:</label></td>
            <td colspan="2"><input type="number" id="telefonos" name="telefonos" value="<?php echo $registro['telefonos']; ?>" maxlength="50"></td>
        </tr>

        <tr>
            <td><label for="correo_electronico_propietario">Correo electrónico:</label></td>
            <td colspan="2"><input type="text" id="correo_electronico_propietario"
                    name="correo_electronico_propietario" value="<?php echo $registro['correo_electronico_propietario']; ?>" maxlength="100"></td>
        </tr>
    </table>
    <br>
        <!-- EXCLUSIVO PARA LA ENTIDAD TERRITORIAL DE SALUD -->
        <table>
        <tr>
            <td><label for="el_establecimiento_inspeccionado_por_entidad_salud">¿El establecimiento ha sido
                    inspeccionado por la entidad territorial de salud?</label></td>
            <td colspan="2"><input type="text" id="el_establecimiento_inspeccionado_por_entidad_salud"
                    name="el_establecimiento_inspeccionado_por_entidad_salud" value="<?php echo $registro['el_establecimiento_inspeccionado_por_entidad_salud']; ?>" maxlength="2"></td>
        </tr>

        <tr>
            <td><label for="fecha_de_ultima_inspeccion">Fecha de última inspección (dd-mm-aaaa):</label></td>
            <td colspan="2"><input type="text" id="fecha_de_ultima_inspeccion" name="fecha_de_ultima_inspeccion" value="<?php echo $registro['fecha_de_ultima_inspeccion']; ?>" maxlength="10"></td>
        </tr>

        <tr>
            <td><label for="ultimo_concepto_sanitario">Último concepto sanitario:</label></td>
            <td colspan="2"><input type="text" id="ultimo_concepto_sanitario" name="ultimo_concepto_sanitario" value="<?php echo $registro['ultimo_concepto_sanitario']; ?>"
                    maxlength="100"></td>
        </tr>
    </table>
    <br>
        <!-- DURACIÓN Y TIEMPO DESTINADO PARA LA EJECUCIÓN DE ACTIVIDADES -->
        <table>
            <tr>
                <td>Jornada laboral</td>
            </tr>
        </table>

        <table>
            <tbody>
                <tr>
                    <td colspan="2">Dias laborales</td>
                    <td colspan="2">Horario laboral</td>
                </tr>
                <tr>
                <td colspan="2"><input type="text" id="dia_laboral_1" name="dia_laboral_1" value="<?php echo $registro['dia_laboral_1']; ?>"></td>

                <td colspan="2"><input type="text" id="dia_laboral_2" name="dia_laboral_2" value="<?php echo $registro['dia_laboral_2']; ?>"></td>

                    <td colspan="2"><input type="time" id="hora_laboral_1" name="hora_laboral_1" value="<?php echo $registro['hora_laboral_1']; ?>"></td>
                    <td colspan="2"><input type="time" id="hora_laboral_2" name="hora_laboral_2" value="<?php echo $registro['hora_laboral_2']; ?>"></td>
                </tr>
            </tbody>
        </table>

        <br>

        <table>
            <tr>
                <td>Jornada laboral 2</td>
            </tr>
        </table>

        <table>
            <tbody>
                <tr>
                    <td colspan="2">Dias laborales</td>
                    <td colspan="2">Horario laboral</td>
                </tr>
                <tr>
                <td colspan="2"><input type="text" id="dia_laboral_3" name="dia_laboral_3" value="<?php echo $registro['dia_laboral_3']; ?>"></td>

                <td colspan="2"><input type="text" id="dia_laboral_4" name="dia_laboral_4" value="<?php echo $registro['dia_laboral_4']; ?>"></td>

                    <td colspan="2"><input type="time" id="hora_laboral_3" name="hora_laboral_3" value="<?php echo $registro['hora_laboral_3']; ?>"></td>
                    <td colspan="2"><input type="time" id="hora_laboral_4" name="hora_laboral_4" value="<?php echo $registro['hora_laboral_4']; ?>"></td>
                </tr>
            </tbody>
        </table>
    <br>
        <!-- EXCLUSIVO PARA LA ENTIDAD TERRITORIAL DE SALUD -->
        <table>
        <tr>
            <td><label for="establecimiento_inspeccionado_entidad_territorial_salud">¿El establecimiento ha sido
                    inspeccionado por la entidad territorial de salud?</label></td>
            <td colspan="2"><input type="text" id="establecimiento_inspeccionado_entidad_territorial_salud"
                    name="establecimiento_inspeccionado_entidad_territorial_salud" value="<?php echo $registro['establecimiento_inspeccionado_entidad_territorial_salud']; ?>" maxlength="2"></td>
        </tr>

        <tr>
            <td><label for="fecha_de_ultima_inspeccion_2">Fecha de la última inspección (dd-mm-aaaa)</label></td>
            <td colspan="2"><input type="text" id="fecha_de_ultima_inspeccion_2"
                    name="fecha_de_ultima_inspeccion_2" value="<?php echo $registro['fecha_de_ultima_inspeccion_2']; ?>" maxlength="10"></td>

            <td><label for="ultimo_concepto_sanitario_emitio">Último concepto sanitario emitido</label></td>
            <td colspan="2"><input type="text" id="ultimo_concepto_sanitario_emitio"
                    name="ultimo_concepto_sanitario_emitio" value="<?php echo $registro['ultimo_concepto_sanitario_emitio']; ?>"></td>
        </tr>
    </table>
    <br>
        <!-- RESPONSABLE DEL DILIGENCIAMIENTO DE LA INFORMACION -->
        <table>
        <tr>
            <td><label for="nombre">Nombre</label></td>
            <td colspan="2"><input type="text" id="nombre" name="nombre" value="<?php echo $registro['nombre']; ?>"></td>

            <td><label for="nombre_2">Nombre</label></td>
            <td colspan="2"><input type="text" id="nombre_2" name="nombre_2" value="<?php echo $registro['nombre_2']; ?>"></td>
        </tr>
        <tr>
            <td><label for="cedula">Cédula</label></td>
            <td colspan="2"><input type="text" id="cedula" name="cedula" value="<?php echo $registro['cedula']; ?>"></td>

            <td><label for="cedula_2">Cédula</label></td>
            <td colspan="2"><input type="text" id="cedula_2" name="cedula_2" value="<?php echo $registro['cedula_2']; ?>"></td>
        </tr>
        <tr>
            <td><label for="cargo">Cargo</label></td>
            <td colspan="2"><input type="text" id="cargo" name="cargo" value="<?php echo $registro['cargo']; ?>"></td>

            <td><label for="cargo_2">Cargo</label></td>
            <td colspan="2"><input type="text" id="cargo_2" name="cargo_2" value="<?php echo $registro['cargo_2']; ?>"></td>
        </tr>
        <tr>
            <td><label for="telefono">Teléfono</label></td>
            <td colspan="2"><input type="number" id="telefono" name="telefono" value="<?php echo $registro['telefono']; ?>"></td>

            <td><label for="telefono_2">Teléfono</label></td>
            <td colspan="2"><input type="number" id="telefono_2" name="telefono_2" value="<?php echo $registro['telefono_2']; ?>"></td>
        </tr>
    </table>
        <br>
    <table>
        <tr>
            <td><input type="submit" name="actualizar" value="Actualizar"></td>
        </tr>
    </table>
        </form>

        <script>


        </script>
    <?php endif; ?>
</body>
</html>
