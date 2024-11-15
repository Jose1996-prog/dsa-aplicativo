<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['sustancias'])) {
    header('Location: login_sustancias_upd.php');
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
    $tecnico_saneamiento = $_POST['tecnico_saneamiento'];
    $fecha_visita = $_POST['fecha_visita'];
    $municipio = $_POST['municipio'];
    $categoria = $_POST['categoria'];
    $tipo_de_establecimiento = $_POST['tipo_de_establecimiento'];
    $nombre_del_establecimiento = $_POST['nombre_del_establecimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $area = $_POST['area'];
    $nombre_del_representante_legal = $_POST['nombre_del_representante_legal'];
    $cedula = $_POST['cedula'];
    $nit = $_POST['nit'];
    $tipo_de_persona = $_POST['tipo_de_persona'];
    $documentacion = $_POST['documentacion'];
    $motivo_de_la_visita = $_POST['motivo_de_la_visita'];
    $cumplimiento_porcentaje = $_POST['cumplimiento_porcentaje'];
    $concepto_sanitario = $_POST['concepto_sanitario'];
    $numero_visitas = $_POST['numero_visitas'];    

    // Preparar la consulta de actualización
    $update_query = "UPDATE ivc_sustancias_quimicas SET 
                            tecnico_saneamiento = ?,
                            fecha_visita = ?,
                            municipio = ?,
                            categoria = ?,
                            tipo_de_establecimiento = ?,
                            nombre_del_establecimiento = ?,
                            direccion = ?,
                            telefono = ?,
                            correo = ?,
                            area = ?,
                            nombre_del_representante_legal = ?,
                            cedula = ?,
                            nit = ?,
                            tipo_de_persona = ?,
                            documentacion = ?,
                            motivo_de_la_visita = ?,
                            cumplimiento_porcentaje = ?,
                            concepto_sanitario = ?,
                            numero_visitas = ?
                            WHERE id=?";

    if ($stmt = $con->prepare($update_query)) {

        $stmt->bind_param("sssssssssssssssssssi",
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
        $nit,
        $tipo_de_persona,
        $documentacion,
        $motivo_de_la_visita,
        $cumplimiento_porcentaje,
        $concepto_sanitario,
        $numero_visitas,
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
    
    $query = "SELECT tecnico_saneamiento,
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
                    nit,
                    tipo_de_persona,
                    documentacion,
                    motivo_de_la_visita,
                    cumplimiento_porcentaje,
                    concepto_sanitario,
                    numero_visitas 
                    FROM ivc_sustancias_quimicas WHERE id=?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result(
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
            $nit,
            $tipo_de_persona,
            $documentacion,
            $motivo_de_la_visita,
            $cumplimiento_porcentaje,
            $concepto_sanitario,
            $numero_visitas
        );

        if ($stmt->fetch()) {
            echo '<form action="update_sustancias.php" method="post">';
            echo '<table>';

            echo '<tr>';
            echo '<td><label for="id">Item:</label></td>';
            echo '<td><input type="number" id="id" name="id" value="' . htmlspecialchars($id) . '" readonly></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="tecnico_saneamiento">Nombre del tecnico:</label></td>';
            echo '<td colspan="2"><input type="text" id="tecnico_saneamiento" name="tecnico_saneamiento" value="' . htmlspecialchars($tecnico_saneamiento) . '" required></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="fecha_visita">Fecha de la visita:</label></td>';
            echo '<td colspan="2"><input type="date" id="fecha_visita" name="fecha_visita" value="' . htmlspecialchars($fecha_visita) . '" required></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="municipio">Municipio:</label></td>';
            echo '<td colspan="2"><input type="text" id="municipio" name="municipio" value="' . htmlspecialchars($municipio) . '"';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="categoria">Categoria del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="categoria" name="categoria" value="' . htmlspecialchars($categoria) . '"';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="tipo_de_establecimiento">Tipo del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="tipo_de_establecimiento" name="tipo_de_establecimiento" value="' . htmlspecialchars($tipo_de_establecimiento) . '"
                    maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_del_establecimiento">Nombre del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_del_establecimiento" name="nombre_del_establecimiento" value="' . htmlspecialchars($nombre_del_establecimiento) . '"
                maxlength="100"></td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td><label for="direccion">Direccion del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="direccion" name="direccion" value="' . htmlspecialchars($direccion) . '" maxlength="100">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="telefono">Telefono:</label></td>';
            echo '<td colspan="2"><input type="number" id="telefono" name="telefono" value="' . htmlspecialchars($telefono) . '" maxlength="20"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="correo">Correo electronico:</label></td>';
            echo '<td colspan="2"><input type="text" id="correo" name="correo" value="' . htmlspecialchars($correo) . '" maxlength="80">';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="area">Area:</label></td>';
            echo '<td colspan="2"><input type="text" id="area" name="area" value="' . htmlspecialchars($area) . '" maxlength="50"';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_del_representante_legal">Nombre del representante legal:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_del_representante_legal"
                name="nombre_del_representante_legal" value="' . htmlspecialchars($nombre_del_representante_legal) . '"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cedula">Identificacion cedula:</label></td>';
            echo '<td><input type="number" id="cedula" name="cedula" value="' . htmlspecialchars($cedula) . '" maxlength="50"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nit">NIT:</label></td>';
            echo '<td><input type="number" id="nit" name="nit" value="' . htmlspecialchars($nit) . '" maxlength="50"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="tipo_de_persona">Tipo de persona:</label></td>';
            echo '<td colspan="2"><input type="text" id="tipo_de_persona" name="tipo_de_persona" value="' . htmlspecialchars($tipo_de_persona) . '" maxlength="100"';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="documentacion">¿El establecimiento cuenta con la
                documentacion?</label></td>';
            echo '<td colspan="2"><input type="text" id="documentacion" name="documentacion" value="' . htmlspecialchars($documentacion) . '" maxlength="100"';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="motivo_de_la_visita">Motivo de la visita:</label></td>';
            echo '<td colspan="2"><input type="text" id="motivo_de_la_visita" name="motivo_de_la_visita" value="' . htmlspecialchars($motivo_de_la_visita) . '" maxlength="100"';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cumplimiento_porcentaje">Porcentaje de cumplimiento:</label></td>';
            echo '<td colspan="2"><input type="number" step="0.01" id="cumplimiento_porcentaje" name="cumplimiento_porcentaje" value="' . htmlspecialchars($cumplimiento_porcentaje) . '"
                maxlength="5"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="concepto_sanitario">Concepto sanitario:</label></td>';
            echo '<td colspan="2"><input type="text" id="concepto_sanitario" name="concepto_sanitario" value="' . htmlspecialchars($concepto_sanitario) . '" maxlength="100"';
            echo '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="numero_visitas">Numero de visita:</label></td>';
            echo '<td colspan="2"><input type="text" id="numero_visitas" name="numero_visitas" value="' . htmlspecialchars($numero_visitas) . '" maxlength="100"';
            echo '</td>';
            echo '</tr>';

            echo "<tr><td colspan='2'><input type='submit' name='update' value='Actualizar'></td></tr>";

            echo "</form>";
            echo "</table>";
        }
        $stmt->close();
    }
}

// Mostrar lista de registros para seleccionar y editar
$query = "SELECT * FROM ivc_sustancias_quimicas";

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result(
        $id,
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
        $nit,
        $tipo_de_persona,
        $documentacion,
        $motivo_de_la_visita,
        $cumplimiento_porcentaje,
        $concepto_sanitario,
        $numero_visitas
    );
    
    echo "<h2>Selecciona un registro para editar:</h2>";
    echo "<table border='1' height='500px'>";
    echo "<tr>

            <th>Accion</th>
            <th>Item</th>
            <th>Tecnico Saneamiento</th>
            <th>Fecha Visita</th>
            <th>Municipio</th>
            <th>Categoria</th>
            <th>Tipo De Establecimiento</th>
            <th>Nombre Del Establecimiento</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Area</th>
            <th>Nombre Del Representante Legal</th>
            <th>Cedula</th>
            <th>Nit</th>
            <th>Tipo De Persona</th>
            <th>Documentacion</th>
            <th>Motivo De La Visita</th>
            <th>Cumplimiento Porcentaje</th>
            <th>Concepto Sanitario</th>
            <th>Numero Visitas</th>

          </tr>";

    while ($stmt->fetch()) {

        echo "<tr>";
        echo "<td>";

        echo "<form action='update_sustancias.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='submit' value='Editar'>";

        echo "</form>";
        echo "</td>";

        echo "<td>$id</td>
            <td>$tecnico_saneamiento</td>
            <td>$fecha_visita</td>
            <td>$municipio</td>
            <td>$categoria</td>
            <td>$tipo_de_establecimiento</td>
            <td>$nombre_del_establecimiento</td>
            <td>$direccion</td>
            <td>$telefono</td>
            <td>$correo</td>
            <td>$area</td>
            <td>$nombre_del_representante_legal</td>
            <td>$cedula</td>
            <td>$nit</td>
            <td>$tipo_de_persona</td>
            <td>$documentacion</td>
            <td>$motivo_de_la_visita</td>
            <td>$cumplimiento_porcentaje</td>
            <td>$concepto_sanitario</td>
            <td>$numero_visitas</td>";

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
<a href="../amb_1_index/Inicio_sustancias_quimicas.html" class="Index_button">Inicio</a>
<a href="logout_sustancias_upd.php" class="logout-button">Cerrar sesión</a>
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
