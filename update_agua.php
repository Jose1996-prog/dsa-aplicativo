<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['agua'])) {
    header('Location: login_agua_upd.php');
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

    $item = $_POST['item'];
    $municipio = $_POST['municipio'];
    $fecha_de_visita = $_POST['fecha_de_visita'];
    $razon_social = $_POST['razon_social'];
    $nit_rut_cc = $_POST['nit_rut_cc'];
    $representante_legal = $_POST['representante_legal'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $e_mail = $_POST['e_mail'];
    $irabapp = $_POST['irabapp'];
    $nivel_de_riesgo = $_POST['nivel_de_riesgo'];
    $bpspp = $_POST['bpspp'];
    $nivel_de_riesgo_2 = $_POST['nivel_de_riesgo_2'];
    $quien_realizo_la_visita = $_POST['quien_realizo_la_visita'];
    $autocontrol = $_POST['autocontrol'];

    // Preparar la consulta de actualización
    $update_query = "UPDATE ivc_agua SET 
                                        municipio = ?,
                                        fecha_de_visita = ?,
                                        razon_social = ?,
                                        nit_rut_cc = ?,
                                        representante_legal = ?,
                                        documento = ?,
                                        telefono = ?,
                                        e_mail = ?,
                                        irabapp = ?,
                                        nivel_de_riesgo = ?,
                                        bpspp = ?,
                                        nivel_de_riesgo_2 = ?,
                                        quien_realizo_la_visita = ?,
                                        autocontrol = ?
                                    WHERE item=?";

    if ($stmt = $con->prepare($update_query)) {

        $stmt->bind_param("ssssssssssssssi", 
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
        $autocontrol,
        $item);

        $stmt->execute();
        $stmt->close();
        echo "<p>Registro actualizado correctamente.</p>";
    } else {
        echo "<p>Error al preparar la consulta de actualización: " . $con->error . "</p>";
    }
}

// Mostrar formulario de edición si se ha seleccionado un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $item = $_POST['id'];
    
    $query = "SELECT municipio, 
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
                    autocontrol FROM ivc_agua WHERE item=?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $item);
        $stmt->execute();
        $stmt->bind_result(
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

        if ($stmt->fetch()) {
            echo '<form action="update_agua.php" method="post">';
            echo '<table>';
            
            echo '<tr>';
            echo '<td><label for="item">Item:</label></td>';
            echo '<td><input type="hidden" id="item" name="item" value="' . htmlspecialchars($item) . '"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="municipio">Municipio:</label></td>';
            echo '<td colspan="2"><input type="text" id="municipio" name="municipio" value="' . htmlspecialchars($municipio) . '">';
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="fecha_de_visita">Fecha de la visita:</label></td>';
            echo '<td colspan="2"><input type="date" id="fecha_de_visita" name="fecha_de_visita" value="' . htmlspecialchars($fecha_de_visita) . '" required></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="razon_social">Razón social:</label></td>';
            echo '<td colspan="2"><input type="text" id="razon_social" name="razon_social" value="' . htmlspecialchars($razon_social) . '"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="nit_rut_cc">NIT/RUT/CC:</label></td>';
            echo '<td colspan="2"><input type="text" id="nit_rut_cc" name="nit_rut_cc" value="' . htmlspecialchars($nit_rut_cc) . '" maxlength="30"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="representante_legal">Representante legal:</label></td>';
            echo '<td colspan="2"><input type="text" id="representante_legal" name="representante_legal" value="' . htmlspecialchars($representante_legal) . '" maxlength="30"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="documento">Documento:</label></td>';
            echo '<td colspan="2"><input type="text" id="documento" name="documento" value="' . htmlspecialchars($documento) . '" maxlength="30"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="telefono">Teléfono:</label></td>';
            echo '<td colspan="2"><input type="number" id="telefono" name="telefono" value="' . htmlspecialchars($telefono) . '" maxlength="40"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="e_mail">Correo electrónico:</label></td>';
            echo '<td colspan="2"><input type="text" id="e_mail" name="e_mail" value="' . htmlspecialchars($e_mail) . '" maxlength="40"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="irabapp">IRABApp:</label></td>';
            echo '<td colspan="2"><input type="number" step="0.01" id="irabapp" name="irabapp" value="' . htmlspecialchars($irabapp) . '" maxlength="20" oninput="actualizarNivelDeRiesgo()"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="nivel_de_riesgo">Nivel de riesgo IRABApp:</label></td>';
            echo '<td colspan="2"><input type="text" id="nivel_de_riesgo" name="nivel_de_riesgo" value="' . htmlspecialchars($nivel_de_riesgo) . '" maxlength="20"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="bpspp">BPSpp:</label></td>';
            echo '<td colspan="2"><input type="number" step="0.01" id="bpspp" name="bpspp" value="' . htmlspecialchars($bpspp) . '" maxlength="20" oninput="actualizarNivelDeRiesgo2()"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="nivel_de_riesgo_2">Nivel de riesgo BPSpp:</label></td>';
            echo '<td colspan="2"><input type="text" id="nivel_de_riesgo_2" name="nivel_de_riesgo_2" value="' . htmlspecialchars($nivel_de_riesgo_2) . '" maxlength="20"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="quien_realizo_la_visita">Quién realizó la visita:</label></td>';
            echo '<td colspan="2"><input type="text" id="quien_realizo_la_visita" name="quien_realizo_la_visita" value="' . htmlspecialchars($quien_realizo_la_visita) . '" maxlength="50"></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><label for="autocontrol">Autocontrol:</label></td>';
            echo '<td colspan="2"><input type="text" id="autocontrol" name="autocontrol" value="' . htmlspecialchars($autocontrol) . '" maxlength="50"></td>';
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
$query = "SELECT item, 
                municipio, 
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
                autocontrol FROM ivc_agua";

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result(
        $item,
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
        $autocontrol
    );
    
    echo "<h2>Selecciona un registro para editar:</h2>";
    echo "<table border='1' height='500px'>";
    echo "<tr>

            <th>Accion</th>
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
            <th>Nivel de Riesgo IRABApp</th>
            <th>BPSPP</th>
            <th>Nivel de Riesgo BPSpp</th>
            <th>Quién Realizó la Visita</th>
            <th>Autocontrol</th>

          </tr>";

    while ($stmt->fetch()) {

        echo "<tr>";
        echo "<td>";

        echo "<form action='update_agua.php' method='post'>";
        echo "<input type='hidden' name='id' value='$item'>";
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='submit' value='Editar'>";

        echo "</form>";
        echo "</td>";

        echo   "<td>$item</td>
                <td>$municipio</td>
                <td>$fecha_de_visita</td>
                <td>$razon_social</td>
                <td>$nit_rut_cc</td>
                <td>$representante_legal</td>
                <td>$documento</td>
                <td>$telefono</td>
                <td>$e_mail</td>
                <td>$irabapp</td>
                <td>$nivel_de_riesgo</td>
                <td>$bpspp</td>
                <td>$nivel_de_riesgo_2</td>
                <td>$quien_realizo_la_visita</td>
                <td>$autocontrol</td>";

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
    color: #2c8fff; /* Cambiado a color dominante */
}

label {
    font-weight: bold;
    color: #333; /* Contraste de color */
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
    background-color: #4CAF50; /* Color secundario */
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
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

/* Nuevos estilos */
input[type="text"]:focus,
input[type="number"]:focus,
input[type="date"]:focus,
textarea:focus,
select:focus {
    border: 2px solid #2c8fff; /* Color dominante en foco */
    outline: none;
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
<a href="../amb_1_index/Inicio_calidad_agua.html" class="Index_button">Inicio</a>
<a href="logout_agua_upd.php" class="logout-button">Cerrar sesión</a>
</head>
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
