<?php

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die('Could not connect to the database server' . mysqli_connect_error());

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los valores de los campos de text

        $id = $_POST['id'];
        $nombre_del_tecnico_saneamiento = $_POST['nombre_del_tecnico_saneamiento'];
        $municipio = $_POST['municipio'];
        $nombre_de_establecimiento = $_POST['nombre_de_establecimiento'];
        $nombre_del_representante_legal = $_POST['nombre_del_representante_legal'];
        $identificacion_cedula_y_o_nit = $_POST['identificacion_cedula_y_o_nit'];
        $direccion_del_establecimiento = $_POST['direccion_del_establecimiento'];
        $area = $_POST['area'];
        $telefono = $_POST['telefono'];
        $correo_electronico = $_POST['correo_electronico'];
        $categoria_establecimiento = $_POST['categoria_establecimiento'];
        $seleccione_el_tipo_de_establecimiento = $_POST['seleccione_el_tipo_de_establecimiento'];
        $fecha_de_visita_actual = $_POST['fecha_de_visita_actual'];
        $concepto_sanitario = $_POST['concepto_sanitario'];
        $porcentaje_de_cumplimiento = $_POST['porcentaje_de_cumplimiento'];
        $motivo_de_la_visita = $_POST['motivo_de_la_visita'];
        $verificacion_de_rotulado = $_POST['verificacion_de_rotulado'];
        $numero_de_rotulados_realizados = $_POST['numero_de_rotulados_realizados'];
        $establecimiento_cuenta_con_la_documentacion_si_no = $_POST['establecimiento_cuenta_con_la_documentacion_si_no'];

        // Preparar la consulta de inserción
        $insert_query = "INSERT INTO ivc_alimentos";

        if ($stmt = $con->prepare($insert_query)) {
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

            $stmt->execute();

            
            // Obtener el ID del registro recién insertado
            $last_insert_id = $con->insert_id;

            $stmt->close();

            echo "<p><h1><strong>Registro insertado correctamente.</strong></h1></p>";

            // Imprimir el registro recién insertado en una tabla
            echo "<table border='1'>";
            echo "<tr>
                    <th>ID</th>
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

            echo   "<td>$id</td>
                  <td>$nombre_del_tecnico_saneamiento</td>
                  <td>$municipio</td>
                  <td>$nombre_de_establecimiento</td>
                  <td>$nombre_del_representante_legal</td>
                  <td>$identificacion_cedula_y_o_nit</td>
                  <td>$direccion_del_establecimiento</td>
                  <td>$area</td>
                  <td>$telefono</td>
                  <td>$correo_electronico</td>
                  <td>$categoria_establecimiento</td>
                  <td>$seleccione_el_tipo_de_establecimiento</td>
                  <td>$fecha_de_visita_actual</td>
                  <td>$concepto_sanitario</td>
                  <td>$porcentaje_de_cumplimiento</td>
                  <td>$motivo_de_la_visita</td>
                  <td>$verificacion_de_rotulado</td>
                  <td>$numero_de_rotulados_realizados</td>
                  <td>$establecimiento_cuenta_con_la_documentacion_si_no</td>";

            echo "</tr>";

            echo "</table>";
        } else {
            echo "<p>Error al preparar la consulta de inserción: " . $con->error . "</p>";
        }

        }



// $con->close();

?>