<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['zoonosis'])) {
    header('Location: login_zoonosis_RD.php');
    exit;
}

// Conexión a la base de datos

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

// Verificar conexión
if ($con->connect_error) {
    die('Error de conexión: ' . $con->connect_error);
}

// Definir el orden por defecto y las opciones de orden
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'id';
$opciones_orden = array(
    'id' => 'ID',
    'codigo' => 'Codigo',
    'municipio' => 'Municipio',
    'numero_de_inscripcion' => 'Numero de inscripcion',
    'nombre_del_establecimiento' => 'Nombre del establecimiento',
    'nombre_del_propietario' => 'Nombre del propietario',
    'direccion' => 'Direccion',
    'tipo_de_establecimiento' => 'Tipo de establecimiento',
    'consultorio_veter' => 'Consultorio veterinario',
    'clinicas_veter' => 'Clinicas veterrinaria',
    'guarderia_veter' => 'Guarderia veterinaria',
    'agropecuarias' => 'Agropecuarias',
    'venta_de_alimentos_concentrado' => 'Venta de alimentos concentrado',

);

// Eliminar registro si se ha enviado una solicitud de eliminación
if (isset($_POST['eliminar_id'])) {
    $eliminar_id = $_POST['eliminar_id'];
    $delete_sql = "DELETE FROM ivc_zoonosis WHERE id = ?";
    $stmt = $con->prepare($delete_sql);
    $stmt->bind_param("i", $eliminar_id);
    if ($stmt->execute()) {
        echo "<script>alert('Registro eliminado correctamente');</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro');</script>";
    }
    $stmt->close();
}

// Consulta SQL con ordenamiento dinámico
$sql = "SELECT * FROM ivc_zoonosis ORDER BY $orden";
$result = $con->query($sql);

// Mostrar formulario para seleccionar el orden

// echo "<form method='GET' style='position:fixed; top:10px; left:10px; background-color:white; padding:10px; border:1px solid black;'>
//         <label for='orden'>Ordenar por:</label>
//         <select name='orden' id='orden'>";
// foreach ($opciones_orden as $clave => $label) {
//     $selected = ($clave == $orden) ? 'selected' : '';
//     echo "<option value='$clave' $selected>$label</option>";
// }
// echo "</select>
//       <input type='submit' value='Ordenar'>
//       </form>";

// Mostrar resultados en una tabla HTML
if ($result->num_rows > 0) {
    echo "<table border='1' style='margin-top:60px;'>
            <tr>
                <th>Acción</th>";
    foreach ($opciones_orden as $clave => $label) {
        echo "<th><a href='?orden=$clave'>$label</a></th>";
    }
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>
                    <form method='POST' onsubmit='return confirm(\"¿Está seguro de que desea eliminar este registro?\");'>
                        <input type='hidden' name='eliminar_id' value='" . $row['id'] . "'>
                        <input type='submit' value='Eliminar'>
                    </form>
                </td>";
        foreach ($row as $campo => $valor) {
            echo "<td>" . htmlspecialchars($valor) . "</td>"; // Evitar inyecciones XSS
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Cerrar conexión a la base de datos
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style>
table {
    width: 100%; /* Ancho completo */
    border-collapse: collapse; /* Colapsar bordes */
    font-family: Arial, sans-serif; /* Fuente de la tabla */
    font-size: 14px; /* Tamaño de la fuente */
}

th {
    font-weight: bold; /* Negrita en encabezados */
    font-size: 16px; /* Tamaño de fuente para encabezados */
    background-color: #72db76; /* Color de fondo para encabezados */
    color: #fff; /* Color de texto blanco en encabezados */
    padding: 10px; /* Espaciado interno */
}

td {
    color: #333; /* Color de texto para las celdas */
    padding: 10px; /* Espaciado interno */
    border: 1px solid #ccc; /* Borde de las celdas */
}

tr:nth-child(even) {
    background-color: #f2f2f2; /* Color de fondo alternativo para filas pares */
}


tr:hover {
    background-color: #ddd;
}

/* Estilo del botón de cierre de sesión */
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

        .btn_btn-primary {
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
            right: 310px;
        }
    </style>
</head>
<a href="../amb_1_index/Inicio_zoonosis.html" class="Index_button">Inicio</a>
<a href="descargar_excel_zoonosis.php" class="btn_btn-primary">Descargar Lista</a>
<a href="logout_zoonosis_RD.php" class="logout-button">Cerrar sesión</a>
<body>
</body>
</html>