<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

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

$item = $_POST['item'] ?? '';
$municipio = $_POST['municipio'] ?? '';
$fecha_de_visita = $_POST['fecha_de_visita'] ?? '';
$razon_social = $_POST['razon_social'] ?? '';
$nit_rut_cc = $_POST['nit_rut_cc'] ?? '';
$representante_legal = $_POST['representante_legal'] ?? '';
$documento = $_POST['documento'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$e_mail = $_POST['e_mail'] ?? '';
$irabapp = $_POST['irabapp'] ?? '';
$nivel_de_riesgo = $_POST['nivel_de_riesgo'] ?? '';
$bpspp = $_POST['bpspp'] ?? '';
$nivel_de_riesgo_2 = $_POST['nivel_de_riesgo_2'] ?? '';
$quien_realizo_la_visita = $_POST['quien_realizo_la_visita'] ?? '';
$autocontrol = $_POST['autocontrol'] ?? '';
$accion = $_POST['accion'] ?? '';

// Función para limpiar los datos de entrada
function limpiar_dato($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

$item = limpiar_dato($item);
$municipio = limpiar_dato($municipio);
$fecha_de_visita = limpiar_dato($fecha_de_visita);
$razon_social = limpiar_dato($razon_social);
$nit_rut_cc = limpiar_dato($nit_rut_cc);
$representante_legal = limpiar_dato($representante_legal);
$documento = limpiar_dato($documento);
$telefono = limpiar_dato($telefono);
$e_mail = limpiar_dato($e_mail);
$irabapp = limpiar_dato($irabapp);
$nivel_de_riesgo = limpiar_dato($nivel_de_riesgo);
$bpspp = limpiar_dato($bpspp);
$nivel_de_riesgo_2 = limpiar_dato($nivel_de_riesgo_2);
$quien_realizo_la_visita = limpiar_dato($quien_realizo_la_visita);
$autocontrol = limpiar_dato($autocontrol);

switch ($accion) {
    case "Registrar":
        $sql = "INSERT INTO ivc_agua (municipio, 
                                      fecha_de_visita, 
                                      razon_social, 
                                      nit_rut_cc, 
                                      representante_legal, 
                                      documento, 
                                      telefono, 
                                      e_mail, 
                                      irabapp, 
                                      nivel_de_riesgo, 
                                      bpspp, 
                                      nivel_de_riesgo_2, 
                                      quien_realizo_la_visita, 
                                      autocontrol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssssss",
        $municipio,
        $fecha_de_visita,
        $razon_social,
        $nit_rut_cc,
        $representante_legal,
        $documento,
        $telefono,
        $e_mail,
        $irabapp,
        $nivel_de_riesgo,
        $bpspp,
        $nivel_de_riesgo_2,
        $quien_realizo_la_visita,
        $autocontrol);

        if ($stmt->execute()) {
            echo "Nuevo registro ingresado con éxito. ";
            echo '<p>Puedes verificarlo presionando <a href="read&delete_agua.php">aquí</a> y buscar o eliminar el registro.</p>';
            echo 'Presiona <a href="add_agua.php">aquí</a> si deseas insertar un nuevo registro.';
            echo '<p>O presiona <a href="../amb_1_index/Inicio_calidad_agua.html">aquí</a> si deseas ir menú principal del programa.</p>';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $stmt->close();
        break;

        case "Listado":
            $sql = "SELECT * FROM ivc_agua";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Item</th>
                            <th>Municipio</th>
                            <th>Fecha de Visita</th>
                            <th>Razón Social</th>
                            <th>NIT/RUT/CC</th>
                            <th>Representante Legal</th>
                            <th>Documento</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>IRABAPP</th>
                            <th>Nivel de Riesgo</th>
                            <th>BPSPP</th>
                            <th>Nivel de Riesgo 2</th>
                            <th>Quién Realizó la Visita</th>
                            <th>Autocontrol</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["item"] . "</td>
                            <td>" . $row["municipio"] . "</td>
                            <td>" . $row["fecha_de_visita"] . "</td>
                            <td>" . $row["razon_social"] . "</td>
                            <td>" . $row["nit_rut_cc"] . "</td>
                            <td>" . $row["representante_legal"] . "</td>
                            <td>" . $row["documento"] . "</td>
                            <td>" . $row["telefono"] . "</td>
                            <td>" . $row["e_mail"] . "</td>
                            <td>" . $row["irabapp"] . "</td>
                            <td>" . $row["nivel_de_riesgo"] . "</td>
                            <td>" . $row["bpspp"] . "</td>
                            <td>" . $row["nivel_de_riesgo_2"] . "</td>
                            <td>" . $row["quien_realizo_la_visita"] . "</td>
                            <td>" . $row["autocontrol"] . "</td>
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
