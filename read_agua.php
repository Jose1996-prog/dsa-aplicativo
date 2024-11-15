<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login_agua.php');
    exit;
}

// Conexión a la base de datos
$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());

// Consulta SQL
$sql = "SELECT * FROM ivc_agua";
$result = $con->query($sql);

// Mostrar resultados en una tabla HTML
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
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

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><a href='logout_agua.php' class='logout-button'>Cerrar sesión</a></td>
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

// Cerrar conexión a la base de datos
$con->close();
?>
