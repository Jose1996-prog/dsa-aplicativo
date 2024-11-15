<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['zoonosis'])) {
    header('Location: login_zoonosis_upd.php');
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
    $codigo = $_POST['codigo'];
    $municipio = $_POST['municipio'];
    $numero_de_inscripcion = $_POST['numero_de_inscripcion'];
    $nombre_del_establecimiento = $_POST['nombre_del_establecimiento'];
    $nombre_del_propietario = $_POST['nombre_del_propietario'];
    $direccion = $_POST['direccion'];
    $tipo_de_establecimiento = $_POST['tipo_de_establecimiento'];
    $consultorio_veter = $_POST['consultorio_veter'];
    $clinicas_veter = $_POST['clinicas_veter'];
    $guarderia_veter = $_POST['guarderia_veter'];
    $agropecuarias = $_POST['agropecuarias'];
    $venta_de_alimentos_concentrado = $_POST['venta_de_alimentos_concentrado'];
    

    // Preparar la consulta de actualización
    $update_query = "UPDATE ivc_zoonosis SET codigo = ?,
                                        municipio = ?,
                                        numero_de_inscripcion = ?,
                                        nombre_del_establecimiento = ?,
                                        nombre_del_propietario = ?,
                                        direccion = ?,
                                        tipo_de_establecimiento = ?,
                                        consultorio_veter = ?,
                                        clinicas_veter = ?,
                                        guarderia_veter = ?,
                                        agropecuarias = ?,
                                        venta_de_alimentos_concentrado = ?
                                        WHERE id=?";

    if ($stmt = $con->prepare($update_query)) {

        $stmt->bind_param("ssssssssssssi",
        $codigo,
        $municipio,
        $numero_de_inscripcion,
        $nombre_del_establecimiento,
        $nombre_del_propietario,
        $direccion,
        $tipo_de_establecimiento,
        $consultorio_veter,
        $clinicas_veter,
        $guarderia_veter,
        $agropecuarias,
        $venta_de_alimentos_concentrado,
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
    
    $query = "SELECT codigo,
                    municipio,
                    numero_de_inscripcion,
                    nombre_del_establecimiento,
                    nombre_del_propietario,
                    direccion,
                    tipo_de_establecimiento,
                    consultorio_veter,
                    clinicas_veter,
                    guarderia_veter,
                    agropecuarias,
                    venta_de_alimentos_concentrado FROM ivc_zoonosis WHERE id=?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result(
            $codigo,
            $municipio,
            $numero_de_inscripcion,
            $nombre_del_establecimiento,
            $nombre_del_propietario,
            $direccion,
            $tipo_de_establecimiento,
            $consultorio_veter,
            $clinicas_veter,
            $guarderia_veter,
            $agropecuarias,
            $venta_de_alimentos_concentrado            
    );

        if ($stmt->fetch()) {
            echo '<form action="update_zoonosis.php" method="post">';
            echo '<table>';

            echo '<tr>';
            echo '<td><label for="id">Numero:</label></td>';
            echo '<td><input type="number" id="id" name="id" value="' . htmlspecialchars($id) . '" maxlength="30" readonly></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="codigo">Codigo:</label></td>';
            echo '<td><input type="number" id="codigo" name="codigo" value="' . htmlspecialchars($codigo) . '"></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="municipio">Municipio:</label></td>';
            echo '<td colspan="2"><input type="text" id="municipio" name="municipio" value="' . htmlspecialchars($municipio) . '" maxlength="30">';
            echo '</td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="numero_de_inscripcion">Numero de inscripcion:</label></td>';
            echo '<td><input type="number" id="numero_de_inscripcion" name="numero_de_inscripcion" value="' . htmlspecialchars($numero_de_inscripcion) . '" maxlength="30"></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="nombre_del_establecimiento">Nombre del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_del_establecimiento" name="nombre_del_establecimiento" value="' . htmlspecialchars($nombre_del_establecimiento) . '"
                    maxlength="100"></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="nombre_del_propietario">Nombre del propietario:</label></td>';
            echo '<td colspan="2"><input type="text" id="nombre_del_propietario" name="nombre_del_propietario" value="' . htmlspecialchars($nombre_del_propietario) . '"
                    maxlength="100"></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="direccion">Direccion:</label></td>';
            echo '<td colspan="2"><input type="text" id="direccion" name="direccion" value="' . htmlspecialchars($direccion) . '" maxlength="100">';
            echo '</td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="tipo_de_establecimiento">Tipo del establecimiento:</label></td>';
            echo '<td colspan="2"><input type="text" id="tipo_de_establecimiento" name="tipo_de_establecimiento" value="' . htmlspecialchars($tipo_de_establecimiento) . '" maxlength="50"></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="consultorio_veter">Consultorio veterinario</label></td>';
            echo '<td colspan="2"><input type="text" id="consultorio_veter" name="consultorio_veter" value="' . htmlspecialchars($consultorio_veter) . '" maxlength="1"></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="clinicas_veter">Clinica veterinaria</label></td>';
            echo '<td colspan="2"><input type="text" id="clinicas_veter" name="clinicas_veter" value="' . htmlspecialchars($clinicas_veter) . '" maxlength="1"></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="guarderia_veter">Guarderia veterinaria</label></td>';
            echo '<td colspan="2"><input type="text" id="guarderia_veter" name="guarderia_veter" value="' . htmlspecialchars($guarderia_veter) . '" maxlength="1"></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="agropecuarias">Agropecuaria</label></td>';
            echo '<td colspan="2"><input type="text" id="agropecuarias" name="agropecuarias" value="' . htmlspecialchars($agropecuarias) . '" maxlength="1"></td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td><label for="venta_de_alimentos_concentrado">Venta de alimentos concentrados</label></td>';
            echo '<td colspan="2"><input type="text" id="venta_de_alimentos_concentrado" name="venta_de_alimentos_concentrado" value="' . htmlspecialchars($venta_de_alimentos_concentrado) . '" maxlength="1"></td>';
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
$query = "SELECT * FROM ivc_zoonosis";

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result(
            $id,
            $codigo,
            $municipio,
            $numero_de_inscripcion,
            $nombre_del_establecimiento,
            $nombre_del_propietario,
            $direccion,
            $tipo_de_establecimiento,
            $consultorio_veter,
            $clinicas_veter,
            $guarderia_veter,
            $agropecuarias,
            $venta_de_alimentos_concentrado 
    );
    
    echo "<h2>Selecciona un registro para editar:</h2>";
    echo "<table border='1' height='500px'>";
    echo "<tr>

            <th>Accion</th>
            <th>Id</th>
            <th>Codigo</th>
            <th>Municipio</th>
            <th>Numero de Inscripcion</th>
            <th>Nombre del Establecimiento</th>
            <th>Nombre del Propietario</th>
            <th>Direccion</th>
            <th>Tipo de Establecimiento</th>
            <th>Consultorio Veterinario</th>
            <th>Clinicas Veterinarias</th>
            <th>Guarderias Veterinarias</th>
            <th>Agropecuarias</th>
            <th>Venta de Alimentos Concentrados</th>

          </tr>";

    while ($stmt->fetch()) {

        echo "<tr>";
        echo "<td>";

        echo "<form action='update_zoonosis.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='submit' value='Editar'>";

        echo "</form>";
        echo "</td>";

        echo   "<th>$id</th>
                <th>$codigo</th>
                <th>$municipio</th>
                <th>$numero_de_inscripcion</th>
                <th>$nombre_del_establecimiento</th>
                <th>$nombre_del_propietario</th>
                <th>$direccion</th>
                <th>$tipo_de_establecimiento</th>
                <th>$consultorio_veter</th>
                <th>$clinicas_veter</th>
                <th>$guarderia_veter</th>
                <th>$agropecuarias</th>
                <th>$venta_de_alimentos_concentrado</th>";

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
<a href="../amb_1_index/Inicio_zoonosis.html" class="Index_button">Inicio</a>
<a href="logout_zoonosis_upd.php" class="logout-button">Cerrar sesión</a>
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
