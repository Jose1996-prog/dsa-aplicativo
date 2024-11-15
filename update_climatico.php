<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['climatico'])) {
    header('Location: login_climatico_upd.php');
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
    $fecha = $_POST['fecha'];
    $encargado_visita = $_POST['encargado_visita'];
    $cargo = $_POST['cargo'];
    $dimension = $_POST['dimension'];
    $componente = $_POST['componente'];
    $municipio = $_POST['municipio'];
    $institucion = $_POST['institucion'];
    $rep_institucional = $_POST['rep_institucional'];
    $direccion = $_POST['direccion'];
    $correo_elec = $_POST['correo_elec'];
    $telefono = $_POST['telefono'];
    $persona_entrevistada = $_POST['persona_entrevistada'];
    $cargo_del_entrevistado = $_POST['cargo_del_entrevistado'];
    $telefono_del_entrevistado = $_POST['telefono_del_entrevistado'];
    $correo_elec_entrevistado = $_POST['correo_elec_entrevistado'];
    $objetivo_de_la_visita = $_POST['objetivo_de_la_visita'];
    $desarrollo = $_POST['desarrollo'];
    $compromisos = $_POST['compromisos'];
    $nombre_funcionario_entidad = $_POST['nombre_funcionario_entidad'];
    $cargo_funcionario_entidad = $_POST['cargo_funcionario_entidad'];
    $nombre_funcionario_departamento = $_POST['nombre_funcionario_departamento'];
    $cargo_funcionario_departamento = $_POST['cargo_funcionario_departamento'];
    
    
    // Preparar la consulta de actualización
    $update_query = "UPDATE asistencia_cambio_climatico SET 
            fecha = ?,
            encargado_visita = ?,
            cargo = ?,
            dimension = ?,
            componente = ?,
            municipio = ?,
            institucion = ?,
            rep_institucional = ?,
            direccion = ?,
            correo_elec = ?,
            telefono = ?,
            persona_entrevistada = ?,
            cargo_del_entrevistado = ?,
            telefono_del_entrevistado = ?,
            correo_elec_entrevistado = ?,
            objetivo_de_la_visita = ?,
            desarrollo = ?,
            compromisos = ?,
            nombre_funcionario_entidad = ?,
            cargo_funcionario_entidad = ?,
            nombre_funcionario_departamento = ?,
            cargo_funcionario_departamento = ?
                                        WHERE id=?";

    if ($stmt = $con->prepare($update_query)) {

        $stmt->bind_param("ssssssssssssssssssssssi",
        $fecha,
        $encargado_visita,
        $cargo,
        $dimension,
        $componente,
        $municipio,
        $institucion,
        $rep_institucional,
        $direccion,
        $correo_elec,
        $telefono,
        $persona_entrevistada,
        $cargo_del_entrevistado,
        $telefono_del_entrevistado,
        $correo_elec_entrevistado,
        $objetivo_de_la_visita,
        $desarrollo,
        $compromisos,
        $nombre_funcionario_entidad,
        $cargo_funcionario_entidad,
        $nombre_funcionario_departamento,
        $cargo_funcionario_departamento,
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
    
    $query = "SELECT fecha,
            encargado_visita,
            cargo,
            dimension,
            componente,
            municipio,
            institucion,
            rep_institucional,
            direccion,
            correo_elec,
            telefono,
            persona_entrevistada,
            cargo_del_entrevistado,
            telefono_del_entrevistado,
            correo_elec_entrevistado,
            objetivo_de_la_visita,
            desarrollo,
            compromisos,
            nombre_funcionario_entidad,
            cargo_funcionario_entidad,
            nombre_funcionario_departamento,
            cargo_funcionario_departamento FROM asistencia_cambio_climatico WHERE id=?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result(
            $fecha,
            $encargado_visita,
            $cargo,
            $dimension,
            $componente,
            $municipio,
            $institucion,
            $rep_institucional,
            $direccion,
            $correo_elec,
            $telefono,
            $persona_entrevistada,
            $cargo_del_entrevistado,
            $telefono_del_entrevistado,
            $correo_elec_entrevistado,
            $objetivo_de_la_visita,
            $desarrollo,
            $compromisos,
            $nombre_funcionario_entidad,
            $cargo_funcionario_entidad,
            $nombre_funcionario_departamento,
            $cargo_funcionario_departamento            
    );

        if ($stmt->fetch()) {
            echo '<form action="update_climatico.php" method="post">';
            echo '<table>';

            echo '<tr>';
            echo '<td><label for="id">Item:</label></td>';
            echo '<td><input type="number" id="id" name="id" value="' . htmlspecialchars($id) . '" readonly></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="fecha">Fecha:</label></td>';
            echo '<td><input type="date" id="fecha" name="fecha" value="' . htmlspecialchars($fecha) . '" required></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="encargado_visita">Encargado de la visita:</label></td>';
            echo '<td><input type="text" id="encargado_visita" name="encargado_visita" value="' . htmlspecialchars($encargado_visita) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cargo">Cargo:</label></td>';
            echo '<td><input type="text" id="cargo" name="cargo" value="' . htmlspecialchars($cargo) . '" maxlength="50"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="dimension">Dimension:</label></td>';
            echo '<td><input type="text" id="dimension" name="dimension" value="' . htmlspecialchars($dimension) . '" maxlength="50"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="componente">Componente:</label></td>';
            echo '<td><input type="text" id="componente" name="componente" value="' . htmlspecialchars($componente) . '" maxlength="50"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="municipio">Municipio:</label></td>';
            echo '<td colspan="2"><input type="text" id="municipio" name="municipio" value="' . htmlspecialchars($municipio) . '" maxlength="50"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="institucion">Institucion:</label></td>';
            echo '<td><input type="text" id="institucion" name="institucion" value="' . htmlspecialchars($institucion) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="rep_institucional">Representante institucional:</label></td>';
            echo '<td><input type="text" id="rep_institucional" name="rep_institucional" value="' . htmlspecialchars($rep_institucional) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="direccion">Direccion:</label></td>';
            echo '<td><input type="text" id="direccion" name="direccion" value="' . htmlspecialchars($direccion) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="correo_elec">Correo electronico:</label></td>';
            echo '<td><input type="text" id="correo_elec" name="correo_elec" value="' . htmlspecialchars($correo_elec) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="telefono">Telefono:</label></td>';
            echo '<td><input type="number" id="telefono" name="telefono" value="' . htmlspecialchars($telefono) . '" maxlength="20"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="persona_entrevistada">Persona entrevistada:</label></td>';
            echo '<td><input type="text" id="persona_entrevistada" name="persona_entrevistada" value="' . htmlspecialchars($persona_entrevistada) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cargo_del_entrevistado">Cargo del entrevistado:</label></td>';
            echo '<td><input type="text" id="cargo_del_entrevistado" name="cargo_del_entrevistado" value="' . htmlspecialchars($cargo_del_entrevistado) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="telefono_del_entrevistado">Telefono del entrevisado:</label></td>';
            echo '<td><input type="number" id="telefono_del_entrevistado" name="telefono_del_entrevistado" value="' . htmlspecialchars($telefono_del_entrevistado) . '" maxlength="20"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="correo_elec_entrevistado">Correo electronico del entrevisado:</label></td>';
            echo '<td><input type="text" id="correo_elec_entrevistado" name="correo_elec_entrevistado" value="' . htmlspecialchars($correo_elec_entrevistado) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="objetivo_de_la_visita">Objetivo de la visita:</label></td>';
            echo '<td><input type="text" id="objetivo_de_la_visita" name="objetivo_de_la_visita" value="' . htmlspecialchars($objetivo_de_la_visita) . '" maxlength="200"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="desarrollo">Desarollo:</label></td>';
            echo '<td><input type="text" id="desarrollo" name="desarrollo" value="' . htmlspecialchars($desarrollo) . '" size="50" maxlength="1000"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="compromisos">Compromiso:</label></td>';
            echo '<td><input type="text" id="compromisos" name="compromisos" value="' . htmlspecialchars($compromisos) . '" size="50" maxlength="1000"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_funcionario_entidad">Nombre del funcionario de la entidad:</label></td>';
            echo '<td><input type="text" id="nombre_funcionario_entidad" name="nombre_funcionario_entidad" value="' . htmlspecialchars($nombre_funcionario_entidad) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cargo_funcionario_entidad">Cargo del funcionario de la entidad:</label></td>';
            echo '<td><input type="text" id="cargo_funcionario_entidad"
                    name="cargo_funcionario_entidad" value="' . htmlspecialchars($cargo_funcionario_entidad) . '" maxlength="50"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="nombre_funcionario_departamento">Nombre del funcionario departamental:</label></td>';
            echo '<td><input type="text" id="nombre_funcionario_departamento" name="nombre_funcionario_departamento" value="' . htmlspecialchars($nombre_funcionario_departamento) . '" maxlength="100"></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><label for="cargo_funcionario_departamento">Cargo del funcionario departamental:</label></td>';
            echo '<td><input type="text" id="cargo_funcionario_departamento" name="cargo_funcionario_departamento" value="' . htmlspecialchars($cargo_funcionario_departamento) . '" maxlength="50"></td>';
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
$query = "SELECT * FROM asistencia_cambio_climatico";

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result(
            $id,
            $fecha,
            $encargado_visita,
            $cargo,
            $dimension,
            $componente,
            $municipio,
            $institucion,
            $rep_institucional,
            $direccion,
            $correo_elec,
            $telefono,
            $persona_entrevistada,
            $cargo_del_entrevistado,
            $telefono_del_entrevistado,
            $correo_elec_entrevistado,
            $objetivo_de_la_visita,
            $desarrollo,
            $compromisos,
            $nombre_funcionario_entidad,
            $cargo_funcionario_entidad,
            $nombre_funcionario_departamento,
            $cargo_funcionario_departamento 
    );
    
    echo "<h2>Selecciona un registro para editar:</h2>";
    echo "<table border='1' height='500px'>";
    echo "<tr>

            <th>Accion</th>
            <th>ID</th>
            <th>Fecha</th>
            <th>Encargado visita</th>
            <th>Cargo</th>
            <th>Dimensión</th>
            <th>Componente</th>
            <th>Municipio</th>
            <th>Institución</th>
            <th>Representante Institucional</th>
            <th>Dirección</th>
            <th>Correo Electrónico</th>
            <th>Teléfono</th>
            <th>Persona Entrevistada</th>
            <th>Cargo del Entrevistado</th>
            <th>Teléfono del Entrevistado</th>
            <th>Correo Electrónico del Entrevistado</th>
            <th>Objetivo de la Visita</th>
            <th>Desarrollo</th>
            <th>Compromisos</th>
            <th>Nombre Funcionario Entidad</th>
            <th>Cargo Funcionario Entidad</th>
            <th>Nombre Funcionario Departamento</th>
            <th>Cargo Funcionario Departamento</th>

          </tr>";

    while ($stmt->fetch()) {

        echo "<tr>";
        echo "<td>";

        echo "<form action='update_climatico.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='submit' value='Editar'>";

        echo "</form>";
        echo "</td>";

        echo   "<th>$id</th>
                <th>$fecha</th>
                <th>$encargado_visita</th>
                <th>$cargo</th>
                <th>$dimension</th>
                <th>$componente</th>
                <th>$municipio</th>
                <th>$institucion</th>
                <th>$rep_institucional</th>
                <th>$direccion</th>
                <th>$correo_elec</th>
                <th>$telefono</th>
                <th>$persona_entrevistada</th>
                <th>$cargo_del_entrevistado</th>
                <th>$telefono_del_entrevistado</th>
                <th>$correo_elec_entrevistado</th>
                <th>$objetivo_de_la_visita</th>
                <th>$desarrollo</th>
                <th>$compromisos</th>
                <th>$nombre_funcionario_entidad</th>
                <th>$cargo_funcionario_entidad</th>
                <th>$nombre_funcionario_departamento</th>
                <th>$cargo_funcionario_departamento</th>";

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
<a href="../amb_1_index/Inicio_cambio_climatico.html" class="Index_button">Inicio</a>
<a href="logout_climatico_upd.php" class="logout-button">Cerrar sesión</a>
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