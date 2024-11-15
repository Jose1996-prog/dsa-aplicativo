<?php

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

// Crear conexión
$con = new mysqli($host, $user, $password, $dbname, $port, $socket) 
    or die ('No se pudo conectar al servidor de base de datos: ' . mysqli_connect_error());

// Obtener datos del formulario

$id = $_POST['id'] ?? '';
$nombre_del_tecnico_saneamiento = $_POST['nombre_del_tecnico_saneamiento'] ?? '';
$municipio = $_POST['municipio'] ?? '';
$categoria_establecimiento = $_POST['categoria_establecimiento'] ?? '';
$tipo_de_establecimiento = $_POST['tipo_de_establecimiento'] ?? '';
$motivo_de_la_visita = $_POST['motivo_de_la_visita'] ?? '';
$fecha_visita_actual = $_POST['fecha_visita_actual'] ?? '';
$nombre_del_establecimiento = $_POST['nombre_del_establecimiento'] ?? '';
$direccion_del_establecimiento = $_POST['direccion_del_establecimiento'] ?? '';
$area = $_POST['area'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo = $_POST['correo'] ?? '';
$tipo_de_persona = $_POST['tipo_de_persona'] ?? '';
$nombre_del_representante_legal = $_POST['nombre_del_representante_legal'] ?? '';
$identificacion_cedula = $_POST['identificacion_cedula'] ?? '';
$nit_del_establecimiento = $_POST['nit_del_establecimiento'] ?? '';
$digite_el_nit = $_POST['digite_el_nit'] ?? '';
$porcentaje_de_cumplimiento = $_POST['porcentaje_de_cumplimiento'] ?? '';
$concepto_sanitario = $_POST['concepto_sanitario'] ?? '';
$numero_de_visita = $_POST['numero_de_visita'] ?? '';
$establecimiento_cuenta_con_la_documentacion = $_POST['establecimiento_cuenta_con_la_documentacion'] ?? '';

$accion = $_POST['accion'] ?? '';

// Función para limpiar los datos de entrada
function limpiar_dato($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

$id = limpiar_dato($_POST['id'] ?? '');
$nombre_del_tecnico_saneamiento = limpiar_dato($_POST['nombre_del_tecnico_saneamiento'] ?? '');
$municipio = limpiar_dato($_POST['municipio'] ?? '');
$categoria_establecimiento = limpiar_dato($_POST['categoria_establecimiento'] ?? '');
$tipo_de_establecimiento = limpiar_dato($_POST['tipo_de_establecimiento'] ?? '');
$motivo_de_la_visita = limpiar_dato($_POST['motivo_de_la_visita'] ?? '');
$fecha_visita_actual = limpiar_dato($_POST['fecha_visita_actual'] ?? '');
$nombre_del_establecimiento = limpiar_dato($_POST['nombre_del_establecimiento'] ?? '');
$direccion_del_establecimiento = limpiar_dato($_POST['direccion_del_establecimiento'] ?? '');
$area = limpiar_dato($_POST['area'] ?? '');
$telefono = limpiar_dato($_POST['telefono'] ?? '');
$correo = limpiar_dato($_POST['correo'] ?? '');
$tipo_de_persona = limpiar_dato($_POST['tipo_de_persona'] ?? '');
$nombre_del_representante_legal = limpiar_dato($_POST['nombre_del_representante_legal'] ?? '');
$identificacion_cedula = limpiar_dato($_POST['identificacion_cedula'] ?? '');
$nit_del_establecimiento = limpiar_dato($_POST['nit_del_establecimiento'] ?? '');
$digite_el_nit = limpiar_dato($_POST['digite_el_nit'] ?? '');
$porcentaje_de_cumplimiento = limpiar_dato($_POST['porcentaje_de_cumplimiento'] ?? '');
$concepto_sanitario = limpiar_dato($_POST['concepto_sanitario'] ?? '');
$numero_de_visita = limpiar_dato($_POST['numero_de_visita'] ?? '');
$establecimiento_cuenta_con_la_documentacion = limpiar_dato($_POST['establecimiento_cuenta_con_la_documentacion'] ?? '');

switch ($accion) {
    case "Registrar":
        $sql = "INSERT INTO ivc_saneamiento (nombre_del_tecnico_saneamiento,
                                            municipio,
                                            categoria_establecimiento,
                                            tipo_de_establecimiento,
                                            motivo_de_la_visita,
                                            fecha_visita_actual,
                                            nombre_del_establecimiento,
                                            direccion_del_establecimiento,
                                            area,
                                            telefono,
                                            correo,
                                            tipo_de_persona,
                                            nombre_del_representante_legal,
                                            identificacion_cedula,
                                            nit_del_establecimiento,
                                            digite_el_nit,
                                            porcentaje_de_cumplimiento,
                                            concepto_sanitario,
                                            numero_de_visita,
                                            establecimiento_cuenta_con_la_documentacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssssssssssss",
        $nombre_del_tecnico_saneamiento,
        $municipio,
        $categoria_establecimiento,
        $tipo_de_establecimiento,
        $motivo_de_la_visita,
        $fecha_visita_actual,
        $nombre_del_establecimiento,
        $direccion_del_establecimiento,
        $area,
        $telefono,
        $correo,
        $tipo_de_persona,
        $nombre_del_representante_legal,
        $identificacion_cedula,
        $nit_del_establecimiento,
        $digite_el_nit,
        $porcentaje_de_cumplimiento,
        $concepto_sanitario,
        $numero_de_visita,
        $establecimiento_cuenta_con_la_documentacion
        );

        if ($stmt->execute()) {
            echo "Nuevo registro ingresado con éxito. ";
            echo '<p>Puedes verificarlo presionando <a href="read&delete_saneamiento.php">aquí</a> y buscar o eliminar el registro.</p>';
            echo 'Presiona <a href="crud_saneamiento.php">aquí</a> si deseas insertar un nuevo registro.';
            echo '<p>O presiona <a href="../amb_1_index/Inicio_saneamiento.html">aquí</a> si deseas ir menú principal del programa.</p>';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $stmt->close();
        break;

        // case "Listado":
        //     $sql = "SELECT * FROM ivc_saneamiento";
        //     $result = $con->query($sql);
        //     if ($result->num_rows > 0) {
        //         echo "<table border='1'>
        //                 <tr>
        //                     <th>Item</th>
        //                     <th>Municipio</th>
        //                     <th>Fecha de Visita</th>
        //                     <th>Razón Social</th>
        //                     <th>NIT/RUT/CC</th>
        //                     <th>Representante Legal</th>
        //                     <th>Documento</th>
        //                     <th>Teléfono</th>
        //                     <th>Email</th>
        //                     <th>IRABAPP</th>
        //                     <th>Nivel de Riesgo</th>
        //                     <th>BPSPP</th>
        //                     <th>Nivel de Riesgo 2</th>
        //                     <th>Quién Realizó la Visita</th>
        //                     <th>Autocontrol</th>
        //                 </tr>";
        //         while($row = $result->fetch_assoc()) {
        //             echo "<tr>
        //                     <td>" . $row["item"] . "</td>
        //                     <td>" . $row["municipio"] . "</td>
        //                     <td>" . $row["fecha_de_visita"] . "</td>
        //                     <td>" . $row["razon_social"] . "</td>
        //                     <td>" . $row["nit_rut_cc"] . "</td>
        //                     <td>" . $row["representante_legal"] . "</td>
        //                     <td>" . $row["documento"] . "</td>
        //                     <td>" . $row["telefono"] . "</td>
        //                     <td>" . $row["e_mail"] . "</td>
        //                     <td>" . $row["irabapp"] . "</td>
        //                     <td>" . $row["nivel_de_riesgo"] . "</td>
        //                     <td>" . $row["bpspp"] . "</td>
        //                     <td>" . $row["nivel_de_riesgo_2"] . "</td>
        //                     <td>" . $row["quien_realizo_la_visita"] . "</td>
        //                     <td>" . $row["autocontrol"] . "</td>
        //                   </tr>";
        //         }
        //         echo "</table>";
        //     } else {
        //         echo "0 resultados";
        //     }
        //     break;
        // default:
        //     echo "Acción no válida.";
        //     break;

    // case "Editar":
    //     if (!empty($item)) {
    //         $sql = "UPDATE ivc_agua SET municipio=?, 
    //                                   fecha_de_visita=?, 
    //                                   razon_social=?, 
    //                                   nit_rut_cc=?, 
    //                                   representante_legal=?, 
    //                                   documento=?, 
    //                                   telefono=?, 
    //                                   e_mail=?, 
    //                                   irabapp=?, 
    //                                   nivel_de_riesgo=?, 
    //                                   bpspp=?, 
    //                                   nivel_de_riesgo_2=?, 
    //                                   quien_realizo_la_visita=?, 
    //                                   autocontrol=? 
    //                                   WHERE item=?";
    //         $stmt = $con->prepare($sql);
    //         $stmt->bind_param("ssssssssssssssi",
    //         $municipio,
    //         $fecha_de_visita,
    //         $razon_social,
    //         $nit_rut_cc,
    //         $representante_legal,
    //         $documento,
    //         $telefono,
    //         $e_mail,
    //         $irabapp,
    //         $nivel_de_riesgo,
    //         $bpspp,
    //         $nivel_de_riesgo_2,
    //         $quien_realizo_la_visita,
    //         $autocontrol,
    //         $item);
    //         if ($stmt->execute()) {
    //             echo "Registro actualizado con éxito";
    //         } else {
    //             echo "Error actualizando el registro: " . $stmt->error;
    //         }
    //         $stmt->close();
    //     } else {
    //         echo "Este registro no existe";
    //     }
    //     break;

    }

$con->close();
?>
