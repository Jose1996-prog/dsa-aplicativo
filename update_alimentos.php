<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['alimentos'])) {
    header('Location: login_alimentos_upd.php');
    exit;
}

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

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

            // Preparar la consulta de actualización
        $update_query = "UPDATE ivc_alimentos SET 
                                            nombre_del_tecnico_saneamiento = ?,
                                            municipio = ?,
                                            nombre_de_establecimiento = ?,
                                            nombre_del_representante_legal = ?,
                                            identificacion_cedula_y_o_nit = ?,
                                            direccion_del_establecimiento = ?,
                                            area = ?,
                                            telefono = ?,
                                            correo_electronico = ?,
                                            categoria_establecimiento = ?,
                                            seleccione_el_tipo_de_establecimiento = ?,
                                            fecha_de_visita_actual = ?,
                                            concepto_sanitario = ?,
                                            porcentaje_de_cumplimiento = ?,
                                            motivo_de_la_visita = ?,
                                            verificacion_de_rotulado = ?,
                                            numero_de_rotulados_realizados = ?,
                                            establecimiento_cuenta_con_la_documentacion_si_no = ?
                                        WHERE id=?";

        if ($stmt = $con->prepare($update_query)) {

            $stmt->bind_param("ssssssssssssssssssi", 
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
                        establecimiento_cuenta_con_la_documentacion_si_no
                  FROM ivc_alimentos WHERE id=?";

        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result(
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
            $establecimiento_cuenta_con_la_documentacion_si_no);

            if ($stmt->fetch()) {

                echo '<form action="update_alimentos.php" method="post">';
                echo '<table>';

                echo '<td><label for="id">Item:</label></td>';
                echo '<td><input type="number" id="id" name="id" value="' . htmlspecialchars($id) . '" readonly></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="nombre_del_tecnico_saneamiento">Nombre del técnico:</label></td>';
                echo '<td colspan="2"><input type="text" id="nombre_del_tecnico_saneamiento" name="nombre_del_tecnico_saneamiento" value="' . htmlspecialchars($nombre_del_tecnico_saneamiento) . '" maxlength="100" required></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="municipio">Municipio:</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="municipio" name="municipio" value="' . htmlspecialchars($municipio) . '" maxlength="40">';
                echo '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="nombre_de_establecimiento">Nombre del establecimiento:</label></td>';
                echo '<td colspan="2"><input type="text" id="nombre_de_establecimiento" name="nombre_de_establecimiento" value="' . htmlspecialchars($nombre_de_establecimiento) . '" maxlength="50" required></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="nombre_del_representante_legal">Nombre del representante legal:</label></td>';
                echo '<td colspan="2"><input type="text" id="nombre_del_representante_legal" name="nombre_del_representante_legal" value="' . htmlspecialchars($nombre_del_representante_legal) . '" maxlength="100"></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="identificacion_cedula_y_o_nit">Cedula y/o NIT:</label></td>';
                echo '<td colspan="2"><input type="number" id="identificacion_cedula_y_o_nit" name="identificacion_cedula_y_o_nit" value="' . htmlspecialchars($identificacion_cedula_y_o_nit) . '" maxlength="30"></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="direccion_del_establecimiento">Dirección del establecimiento:</label></td>';
                echo '<td colspan="2"><input type="text" id="direccion_del_establecimiento" name="direccion_del_establecimiento" value="' . htmlspecialchars($direccion_del_establecimiento) . '" maxlength="100"></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="area">Area:</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="area" name="area" value="' . htmlspecialchars($area) . '" maxlength="10">';
                echo '</td>';
                echo '</tr>';                

                echo '<tr>';
                echo '<td><label for="telefono">Teléfono:</label></td>';
                echo '<td colspan="2"><input type="number" id="telefono" name="telefono" value="' . htmlspecialchars($telefono) . '" maxlength="20"></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="correo_electronico">Correo electrónico:</label></td>';
                echo '<td colspan="2"><input type="text" id="correo_electronico" name="correo_electronico" value="' . htmlspecialchars($correo_electronico) . '" maxlength="100"></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="categoria_establecimiento">Categoria del estableccimiento:</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="categoria_establecimiento" name="categoria_establecimiento" value="' . htmlspecialchars($categoria_establecimiento) . '" maxlength="60">';
                echo '</td>';
                echo '</tr>';                

                echo '<tr>';
                echo '<td><label for="seleccione_el_tipo_de_establecimiento">Tipo de establecimiento:</label></td>';
                echo '<td colspan="2"><input type="text" id="seleccione_el_tipo_de_establecimiento" name="seleccione_el_tipo_de_establecimiento" value="' . htmlspecialchars($seleccione_el_tipo_de_establecimiento) . '" maxlength="100"></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="fecha_de_visita_actual">Fecha de la visita actual:</label></td>';
                echo '<td colspan="2"><input type="date" id="fecha_de_visita_actual" name="fecha_de_visita_actual" value="' . htmlspecialchars($fecha_de_visita_actual) . '"></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="conce">Concepto sanitario:</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="concepto_sanitario" name="concepto_sanitario" value="' . htmlspecialchars($concepto_sanitario) . '" maxlength="100">';
                echo '</td>';
                echo '</tr>';                

                echo '<tr>';
                echo '<td><label for="porcentaje_de_cumplimiento">Porcentaje de cumplimiento:</label></td>';
                echo '<td colspan="2"><input type="number" step="0.01" id="porcentaje_de_cumplimiento" name="porcentaje_de_cumplimiento" value="' . htmlspecialchars($porcentaje_de_cumplimiento) . '" maxlength="5"></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="motivo_de_la_visita">Motivo de la visita:</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="motivo_de_la_visita" name="motivo_de_la_visita" value="' . htmlspecialchars($motivo_de_la_visita) . '" maxlength="100">';
                echo '</td>';
                echo '</tr>'; 

                echo '<tr>';
                echo '<td><label for="verificacion_de_rotulado">Verificacion de rotulado:</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="verificacion_de_rotulado" name="verificacion_de_rotulado" value="' . htmlspecialchars($verificacion_de_rotulado) . '" maxlength="2">';
                echo '</td>';
                echo '</tr>'; 

                echo '<tr>';
                echo '<td><label for="numero_de_rotulados_realizados">Número de rotulados realizados:</label></td>';
                echo '<td colspan="2"><input type="number" id="numero_de_rotulados_realizados" name="numero_de_rotulados_realizados" value="' . htmlspecialchars($numero_de_rotulados_realizados) . '" maxlength="30"></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td><label for="establecimiento_cuenta_con_la_documentacion_si_no">¿Establecimiento cuenta con la documentacion?:</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="establecimiento_cuenta_con_la_documentacion_si_no" name="establecimiento_cuenta_con_la_documentacion_si_no" value="' . htmlspecialchars($establecimiento_cuenta_con_la_documentacion_si_no) . '" maxlength="2">';
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
        $query = "SELECT * FROM ivc_alimentos";

        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result(
                $id,
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
                $establecimiento_cuenta_con_la_documentacion_si_no
            );
            
            echo "<h2>Selecciona un registro para editar:</h2>";
            echo "<table border='1' height='500px'>";
            echo "<tr>
        
                    <th>Accion</th>
                    <th>id</th>
                    <th>nombre del tecnico saneamiento</th>
                    <th>municipio</th>
                    <th>nombre de establecimiento</th>
                    <th>nombre del representante legal</th>
                    <th>identificacion cedula y/o nit</th>
                    <th>direccion del establecimiento</th>
                    <th>area</th>
                    <th>telefono</th>
                    <th>correo electronico</th>
                    <th>categoria establecimiento</th>
                    <th>seleccione el tipo de establecimiento</th>
                    <th>feha de visita actual</th>
                    <th>concepto sanitario</th>
                    <th>porcentaje de cumplimiento</th>
                    <th>motivo de la visita</th>
                    <th>verificacion de rotulado</th>
                    <th>numero de rotulados realizados</th>
                    <th>establecimiento cuenta con la documentacion si no</th>
        
                  </tr>";
        
            while ($stmt->fetch()) {
        
                echo "<tr>";
                echo "<td>";
        
                echo "<form action='update_alimentos.php' method='post'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<input type='hidden' name='action' value='edit'>";
                echo "<input type='submit' value='Editar'>";
        
                echo "</form>";
                echo "</td>";
        
                echo "<td>$id</td>
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

.Index_button{
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
            right: 150px;
        }
    </style>
</head>
<a href="../amb_1_index/Inicio_alimentos_y_bebidas.html" class="Index_button">Inicio</a>
<a href="logout_alimentos_upd.php" class="logout-button">Cerrar sesión</a>
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