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
$nombre_de_establecimiento = $_POST['nombre_de_establecimiento'] ?? '';
$nombre_del_representante_legal = $_POST['nombre_del_representante_legal'] ?? '';
$identificacion_cedula_y_o_nit = $_POST['identificacion_cedula_y_o_nit'] ?? '';
$direccion_del_establecimiento = $_POST['direccion_del_establecimiento'] ?? '';
$area = $_POST['area'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo_electronico = $_POST['correo_electronico'] ?? '';
$categoria_establecimiento = $_POST['categoria_establecimiento'] ?? '';
$seleccione_el_tipo_de_establecimiento = $_POST['seleccione_el_tipo_de_establecimiento'] ?? '';
$fecha_de_visita_actual = $_POST['fecha_de_visita_actual'] ?? '';
$concepto_sanitario = $_POST['concepto_sanitario'] ?? '';
$porcentaje_de_cumplimiento = $_POST['porcentaje_de_cumplimiento'] ?? '';
$motivo_de_la_visita = $_POST['motivo_de_la_visita'] ?? '';
$verificacion_de_rotulado = $_POST['verificacion_de_rotulado'] ?? '';
$numero_de_rotulados_realizados = $_POST['numero_de_rotulados_realizados'] ?? '';
$establecimiento_cuenta_con_la_documentacion_si_no = $_POST['establecimiento_cuenta_con_la_documentacion_si_no'] ?? '';


// Función para limpiar los datos de entrada
function limpiar_dato($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

$id = limpiar_dato($_POST['id'] ?? '');
$nombre_del_tecnico_saneamiento = limpiar_dato($_POST['nombre_del_tecnico_saneamiento'] ?? '');
$municipio = limpiar_dato($_POST['municipio'] ?? '');
$nombre_de_establecimiento = limpiar_dato($_POST['nombre_de_establecimiento'] ?? '');
$nombre_del_representante_legal = limpiar_dato($_POST['nombre_del_representante_legal'] ?? '');
$identificacion_cedula_y_o_nit = limpiar_dato($_POST['identificacion_cedula_y_o_nit'] ?? '');
$direccion_del_establecimiento = limpiar_dato($_POST['direccion_del_establecimiento'] ?? '');
$area = limpiar_dato($_POST['area'] ?? '');
$telefono = limpiar_dato($_POST['telefono'] ?? '');
$correo_electronico = limpiar_dato($_POST['correo_electronico'] ?? '');
$categoria_establecimiento = limpiar_dato($_POST['categoria_establecimiento'] ?? '');
$seleccione_el_tipo_de_establecimiento = limpiar_dato($_POST['seleccione_el_tipo_de_establecimiento'] ?? '');
$fecha_de_visita_actual = limpiar_dato($_POST['fecha_de_visita_actual'] ?? '');
$concepto_sanitario = limpiar_dato($_POST['concepto_sanitario'] ?? '');
$porcentaje_de_cumplimiento = limpiar_dato($_POST['porcentaje_de_cumplimiento'] ?? '');
$motivo_de_la_visita = limpiar_dato($_POST['motivo_de_la_visita'] ?? '');
$verificacion_de_rotulado = limpiar_dato($_POST['verificacion_de_rotulado'] ?? '');
$numero_de_rotulados_realizados = limpiar_dato($_POST['numero_de_rotulados_realizados'] ?? '');
$establecimiento_cuenta_con_la_documentacion_si_no = limpiar_dato($_POST['establecimiento_cuenta_con_la_documentacion_si_no'] ?? '');
$accion = $_POST['accion'] ?? '';

switch ($accion) {
    case "Registrar":
        $sql = "INSERT INTO ivc_alimentos (
                            nombre_del_tecnico_saneamiento,
                            municipio,
                            nombre_de_establecimiento,
                            nombre_del_representante_legal,
                            identificacion_cedula_y_o_nit,
                            direccion_del_establecimiento,
                            area,
                            telefono,
                            correo_electronico,
                            categoria_establecimiento,
                            seleccione_el_tipo_de_establecimiento,
                            fecha_de_visita_actual,
                            concepto_sanitario,
                            porcentaje_de_cumplimiento,
                            motivo_de_la_visita,
                            verificacion_de_rotulado,
                            numero_de_rotulados_realizados,
                            establecimiento_cuenta_con_la_documentacion_si_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssssssssss",
        $nombre_del_tecnico_saneamiento,
        $municipio,
        $nombre_de_establecimiento,
        $nombre_del_representante_legal,
        $identificacion_cedula_y_o_nit,
        $direccion_del_establecimiento,
        $area,
        $telefono,
        $correo_electronico,
        $categoria_establecimiento,
        $seleccione_el_tipo_de_establecimiento,
        $fecha_de_visita_actual,
        $concepto_sanitario,
        $porcentaje_de_cumplimiento,
        $motivo_de_la_visita,
        $verificacion_de_rotulado,
        $numero_de_rotulados_realizados,
        $establecimiento_cuenta_con_la_documentacion_si_no,
        );

        if ($stmt->execute()) {
            echo "Nuevo registro ingresado con éxito. ";
            echo '<p>Puedes verificarlo presionando <a href="read&delete_alimentos.php">aquí</a> y buscar o eliminar el registro.</p>';
            echo 'Presiona <a href="add_alimentos_.php">aquí</a> si deseas insertar un nuevo registro.';
            echo '<p>O presiona <a href="../amb_1_index/Inicio_alimentos_y_bebidas.html">aquí</a> si deseas ir menú principal del programa.</p>';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $stmt->close();
        break;

        case "Listado":
            $sql = "SELECT * FROM ivc_alimentos";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>id</th>
                            <th>nombre_del_tecnico_saneamiento</th>
                            <th>municipio</th>
                            <th>nombre_de_establecimiento</th>
                            <th>nombre_del_representante_legal</th>
                            <th>identificacion_cedula_y_o_nit</th>
                            <th>direccion_del_establecimiento</th>
                            <th>area</th>
                            <th>telefono</th>
                            <th>correo_electronico</th>
                            <th>categoria_establecimiento</th>
                            <th>seleccione_el_tipo_de_establecimiento</th>
                            <th>fecha_de_visita_actual</th>
                            <th>concepto_sanitario</th>
                            <th>porcentaje_de_cumplimiento</th>
                            <th>motivo_de_la_visita</th>
                            <th>verificacion_de_rotulado</th>
                            <th>numero_de_rotulados_realizados</th>
                            <th>establecimiento_cuenta_con_la_documentacion_si_no</th>
                        </tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $id . "</td>
                    <td>" . $nombre_del_tecnico_saneamiento . "</td>
                    <td>" . $municipio . "</td>
                    <td>" . $nombre_de_establecimiento . "</td>
                    <td>" . $nombre_del_representante_legal . "</td>
                    <td>" . $identificacion_cedula_y_o_nit . "</td>
                    <td>" . $direccion_del_establecimiento . "</td>
                    <td>" . $area . "</td>
                    <td>" . $telefono . "</td>
                    <td>" . $correo_electronico . "</td>
                    <td>" . $categoria_establecimiento . "</td>
                    <td>" . $seleccione_el_tipo_de_establecimiento . "</td>
                    <td>" . $fecha_de_visita_actual . "</td>
                    <td>" . $concepto_sanitario . "</td>
                    <td>" . $porcentaje_de_cumplimiento . "</td>
                    <td>" . $motivo_de_la_visita . "</td>
                    <td>" . $verificacion_de_rotulado . "</td>
                    <td>" . $numero_de_rotulados_realizados . "</td>
                    <td>" . $establecimiento_cuenta_con_la_documentacion_si_no . "</td>
                  </tr>";
                }
                echo "</table>";
            } else {
                echo "0 resultados";
            }
            break;
        default:
            echo "Acción no válida.";
            break;

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
