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
$tecnico_saneamiento = $_POST['tecnico_saneamiento'] ?? '';
$fecha_visita = $_POST['fecha_visita'] ?? '';
$municipio = $_POST['municipio'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$tipo_de_establecimiento = $_POST['tipo_de_establecimiento'] ?? '';
$nombre_del_establecimiento = $_POST['nombre_del_establecimiento'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo = $_POST['correo'] ?? '';
$area = $_POST['area'] ?? '';
$nombre_del_representante_legal = $_POST['nombre_del_representante_legal'] ?? '';
$cedula = $_POST['cedula'] ?? '';
$tipo_de_persona = $_POST['tipo_de_persona'] ?? '';
$documentacion = $_POST['documentacion'] ?? '';
$motivo_de_la_visita = $_POST['motivo_de_la_visita'] ?? '';
$cumplimiento_porcentaje = $_POST['cumplimiento_porcentaje'] ?? '';
$concepto_sanitario = $_POST['concepto_sanitario'] ?? '';
$numero_visitas = $_POST['numero_visitas'] ?? '';

$accion = $_POST['accion'] ?? '';

// Función para limpiar los datos de entrada
function limpiar_dato($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

$id = limpiar_dato($_POST['id'] ?? '');
$tecnico_saneamiento = limpiar_dato($_POST['tecnico_saneamiento'] ?? '');
$fecha_visita = limpiar_dato($_POST['fecha_visita'] ?? '');
$municipio = limpiar_dato($_POST['municipio'] ?? '');
$categoria = limpiar_dato($_POST['categoria'] ?? '');
$tipo_de_establecimiento = limpiar_dato($_POST['tipo_de_establecimiento'] ?? '');
$nombre_del_establecimiento = limpiar_dato($_POST['nombre_del_establecimiento'] ?? '');
$direccion = limpiar_dato($_POST['direccion'] ?? '');
$telefono = limpiar_dato($_POST['telefono'] ?? '');
$correo = limpiar_dato($_POST['correo'] ?? '');
$area = limpiar_dato($_POST['area'] ?? '');
$nombre_del_representante_legal = limpiar_dato($_POST['nombre_del_representante_legal'] ?? '');
$cedula = limpiar_dato($_POST['cedula'] ?? '');
$tipo_de_persona = limpiar_dato($_POST['tipo_de_persona'] ?? '');
$documentacion = limpiar_dato($_POST['documentacion'] ?? '');
$motivo_de_la_visita = limpiar_dato($_POST['motivo_de_la_visita'] ?? '');
$cumplimiento_porcentaje = limpiar_dato($_POST['cumplimiento_porcentaje'] ?? '');
$concepto_sanitario = limpiar_dato($_POST['concepto_sanitario'] ?? '');
$numero_visitas = limpiar_dato($_POST['numero_visitas'] ?? '');

switch ($accion) {
    case "Registrar":
        $sql = "INSERT INTO ivc_sustancias_quimicas (tecnico_saneamiento, 
                                            fecha_visita, 
                                            municipio, 
                                            categoria, 
                                            tipo_de_establecimiento, 
                                            nombre_del_establecimiento, 
                                            direccion, 
                                            telefono, 
                                            correo, 
                                            area, 
                                            nombre_del_representante_legal, 
                                            cedula, 
                                            tipo_de_persona, 
                                            documentacion, 
                                            motivo_de_la_visita, 
                                            cumplimiento_porcentaje, 
                                            concepto_sanitario, 
                                            numero_visitas
                                            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssssssssss",
        $tecnico_saneamiento,
        $fecha_visita,
        $municipio,
        $categoria,
        $tipo_de_establecimiento,
        $nombre_del_establecimiento,
        $direccion,
        $telefono,
        $correo,
        $area,
        $nombre_del_representante_legal,
        $cedula,
        $tipo_de_persona,
        $documentacion,
        $motivo_de_la_visita,
        $cumplimiento_porcentaje,
        $concepto_sanitario,
        $numero_visitas,
        );

        if ($stmt->execute()) {
            echo "Nuevo registro ingresado con éxito. ";
            echo '<p>Puedes verificarlo presionando <a href="read&delete_sustancias.php">aquí</a> y buscar o eliminar el registro.</p>';
            echo 'Presiona <a href="add_sustancias.php">aquí</a> si deseas insertar un nuevo registro.';
            echo '<p>O presiona <a href="../amb_1_index/Inicio_sustancias_quimicas.html">aquí</a> si deseas ir menú principal del programa.</p>';
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
