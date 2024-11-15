<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['saneamiento'])) {
    header('Location: login_saneamiento_upd.php');
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
    $nombre_del_tecnico_saneamiento = $_POST['nombre_del_tecnico_saneamiento'];
    $municipio = $_POST['municipio'];
    $categoria_establecimiento = $_POST['categoria_establecimiento'];
    $tipo_de_establecimiento = $_POST['tipo_de_establecimiento'];
    $motivo_de_la_visita = $_POST['motivo_de_la_visita'];
    $fecha_visita_actual = $_POST['fecha_visita_actual'];
    $nombre_del_establecimiento = $_POST['nombre_del_establecimiento'];
    $direccion_del_establecimiento = $_POST['direccion_del_establecimiento'];
    $area = $_POST['area'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $tipo_de_persona = $_POST['tipo_de_persona'];
    $nombre_del_representante_legal = $_POST['nombre_del_representante_legal'];
    $identificacion_cedula = $_POST['identificacion_cedula'];
    $nit_del_establecimiento = $_POST['nit_del_establecimiento'];
    $digite_el_nit = $_POST['digite_el_nit'];
    $porcentaje_de_cumplimiento = $_POST['porcentaje_de_cumplimiento'];
    $concepto_sanitario = $_POST['concepto_sanitario'];
    $numero_de_visita = $_POST['numero_de_visita'];
    $establecimiento_cuenta_con_la_documentacion = $_POST['establecimiento_cuenta_con_la_documentacion'];
    

    // Preparar la consulta de actualización
    $update_query = "UPDATE ivc_saneamiento SET nombre_del_tecnico_saneamiento = ?,
                                            municipio = ?,
                                            categoria_establecimiento = ?,
                                            tipo_de_establecimiento = ?,
                                            motivo_de_la_visita = ?,
                                            fecha_visita_actual = ?,
                                            nombre_del_establecimiento = ?,
                                            direccion_del_establecimiento = ?,
                                            area = ?,
                                            telefono = ?,
                                            correo = ?,
                                            tipo_de_persona = ?,
                                            nombre_del_representante_legal = ?,
                                            identificacion_cedula = ?,
                                            nit_del_establecimiento = ?,
                                            digite_el_nit = ?,
                                            porcentaje_de_cumplimiento = ?,
                                            concepto_sanitario = ?,
                                            numero_de_visita = ?,
                                            establecimiento_cuenta_con_la_documentacion = ?
                                            WHERE id=?";

    if ($stmt = $con->prepare($update_query)) {

        $stmt->bind_param("ssssssssssssssssssssi",
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
        $establecimiento_cuenta_con_la_documentacion,
        $id
    );
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
    
    $query = "SELECT nombre_del_tecnico_saneamiento,
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
                    establecimiento_cuenta_con_la_documentacion FROM ivc_saneamiento WHERE id=?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result(
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

        if ($stmt->fetch()) {
            echo '<form action="update_saneamiento.php" method="post">';
            echo '<table>';

            echo '<tr>';
                echo '<td><label for="id">Item:</label></td>';
                echo '<td><input type="number" id="id" name="id" value="' . htmlspecialchars($id) . '" readonly></td>';
            echo '</tr>';

            echo '<tr>';
                echo '<td><label for="nombre_del_tecnico_saneamiento">Nombre del tecnico:</label></td>';
                echo '<td colspan="2"><input type="text" id="nombre_del_tecnico_saneamiento"
                        name="nombre_del_tecnico_saneamiento" value="' . htmlspecialchars($nombre_del_tecnico_saneamiento) . '" required></td>';
            echo '</tr>';

            echo '<tr>';
                echo '<td><label for="municipio">Municipio:</label></td>';
                echo '<td colspan="2">';
                    echo '<input type="text" id="municipio" name="municipio" value="' . htmlspecialchars($municipio) . '">';
                echo '</td>';
            echo '</tr>';

            echo '<tr>';
                echo '<td><label for="categoria_establecimiento">Categoria del establecimiento:</label></td>';
                echo '<td colspan="2"><input type="text" id="categoria_establecimiento" name="categoria_establecimiento" value="' . htmlspecialchars($categoria_establecimiento) . '">';
                echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="tipo_de_establecimiento">Tipo de establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="tipo_de_establecimiento" name="tipo_de_establecimiento" value="' . htmlspecialchars($tipo_de_establecimiento) . '" maxlength="100"></td>';
            echo '</tr>';            

            echo '<tr>';
                echo '<td><label for="motivo_de_la_visita">Motivo de la visita:</label></td>';
                echo '<td colspan="2"><input type="text" id="motivo_de_la_visita" name="motivo_de_la_visita" value="' . htmlspecialchars($motivo_de_la_visita) . '" maxlength="100">';
                echo '</td>';
            echo '</tr>';

            echo '<tr>';
                echo '<td><label for="fecha_visita_actual">Fecha de la visita actual:</label></td>';
                echo '<td colspan="2"><input type="date" id="fecha_visita_actual" name="fecha_visita_actual" value="' . htmlspecialchars($fecha_visita_actual) . '" required>';
                echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_del_establecimiento">Nombre del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_del_establecimiento" name="nombre_del_establecimiento" value="' . htmlspecialchars($nombre_del_establecimiento) . '" maxlength="100"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="direccion_del_establecimiento">Dirección del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="direccion_del_establecimiento" name="direccion_del_establecimiento" value="' . htmlspecialchars($direccion_del_establecimiento) . '" maxlength="100"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="area">Área:</label></td>';
            echo '<td colspan="2"><input type="text" id="area" name="area" value="' . htmlspecialchars($area) . '" maxlength="25">';
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="telefono">Teléfono:</label></td>';
            echo '<td colspan="2"><input type="number" id="telefono" name="telefono" value="' . htmlspecialchars($telefono) . '" maxlength="40"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="correo">Correo electrónico:</label></td>';
            echo '<td colspan="2"><input type="text" id="correo" name="correo" value="' . htmlspecialchars($correo) . '" maxlength="100"></td>';
            echo '</tr>';
            

            echo '<tr>';
            echo '<td><label for="tipo_de_persona">Tipo de persona:</label></td>';
            echo '<td colspan="2"><input type="text" id="tipo_de_persona" name="tipo_de_persona" value="' . htmlspecialchars($tipo_de_persona) . '" maxlength="25">';
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="nombre_del_representante_legal">Nombre del representante legal:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_del_representante_legal" name="nombre_del_representante_legal" value="' . htmlspecialchars($nombre_del_representante_legal) . '"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="identificacion_cedula">Identificación cédula:</label></td>';
            echo '<td><input type="number" id="identificacion_cedula" name="identificacion_cedula" value="' . htmlspecialchars($identificacion_cedula) . '" maxlength="100"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="nit_del_establecimiento">¿Tiene NIT el establecimiento?</label></td>';
            echo '<td colspan="2"><input type="text" id="nit_del_establecimiento" name="nit_del_establecimiento" value="' . htmlspecialchars($nit_del_establecimiento) . '" maxlength="2">';
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="porcentaje_de_cumplimiento">Porcentaje de cumplimiento:</label></td>';
            echo '<td colspan="2"><input type="number" step="0.01" id="porcentaje_de_cumplimiento" name="porcentaje_de_cumplimiento" value="' . htmlspecialchars($porcentaje_de_cumplimiento) . '" maxlength="5"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="digite_el_nit">Digite el NIT del establecimiento:</label></td>';
            echo '<td><input type="number" id="digite_el_nit" name="digite_el_nit" value="' . htmlspecialchars($digite_el_nit) . '" maxlength="100"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="concepto_sanitario">Concepto sanitario:</label></td>';
            echo '<td colspan="2"><input type="text" id="concepto_sanitario" name="concepto_sanitario" value="' . htmlspecialchars($concepto_sanitario) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="numero_de_visita">Número de visita:</label></td>';
            echo '<td colspan="2"><input type="text" id="numero_de_visita" name="numero_de_visita" value="' . htmlspecialchars($numero_de_visita) . '" maxlength="50">';
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="establecimiento_cuenta_con_la_documentacion">¿El establecimiento cuenta con la documentación?</label></td>';
            echo '<td colspan="2"><input type="text" id="establecimiento_cuenta_con_la_documentacion" name="establecimiento_cuenta_con_la_documentacion" value="' . htmlspecialchars($establecimiento_cuenta_con_la_documentacion) . '" maxlength="2">';
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
$query = "SELECT * FROM ivc_saneamiento";

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result(
        $id,
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
    
    echo "<h2>Selecciona un registro para editar:</h2>";
    echo "<table border='1' height='500px'>";
    echo "<tr>

            <th>Accion</th>
            <th>Id</th>
            <th>Nombre Del Tecnico Saneamiento</th>
            <th>Municipio</th>
            <th>Categoria Establecimiento</th>
            <th>Tipo De Establecimiento</th>
            <th>Motivo De La Visita</th>
            <th>Fecha Visita Actual</th>
            <th>Nombre Del Establecimiento</th>
            <th>Direccion Del Establecimiento</th>
            <th>Area</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Tipo De Persona</th>
            <th>Nombre Del Representante Legal</th>
            <th>Identificacion Cedula</th>
            <th>¿Tiene Nit el Establecimiento?</th>
            <th>Digite El Nit</th>
            <th>Porcentaje De Cumplimiento</th>
            <th>Concepto Sanitario</th>
            <th>Numero De Visita</th>
            <th>Establecimiento Cuenta Con La Documentacion</th>

          </tr>";

    while ($stmt->fetch()) {

        echo "<tr>";
        echo "<td>";

        echo "<form action='update_saneamiento.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='submit' value='Editar'>";

        echo "</form>";
        echo "</td>";

        echo   "<th>$id</th>
                <th>$nombre_del_tecnico_saneamiento</th>
                <th>$municipio</th>
                <th>$categoria_establecimiento</th>
                <th>$tipo_de_establecimiento</th>
                <th>$motivo_de_la_visita</th>
                <th>$fecha_visita_actual</th>
                <th>$nombre_del_establecimiento</th>
                <th>$direccion_del_establecimiento</th>
                <th>$area</th>
                <th>$telefono</th>
                <th>$correo</th>
                <th>$tipo_de_persona</th>
                <th>$nombre_del_representante_legal</th>
                <th>$identificacion_cedula</th>
                <th>$nit_del_establecimiento</th>
                <th>$digite_el_nit</th>
                <th>$porcentaje_de_cumplimiento</th>
                <th>$concepto_sanitario</th>
                <th>$numero_de_visita</th>
                <th>$establecimiento_cuenta_con_la_documentacion</th>
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
            background-color: #ff4d4d; /* Color de fondo rojo */
            color: #fff; /* Color del texto blanco */
            text-align: center;
            text-decoration: none; /* Elimina el subrayado del enlace */
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
<a href="../amb_1_index/Inicio_saneamiento.html" class="Index_button">Inicio</a>
<a href="logout_saneamiento_upd.php" class="logout-button">Cerrar sesión</a>
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