
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['alimentos'])) {
    header('Location: login_alimentos_RD.php');
    exit;
}

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
    'nombre_del_tecnico_saneamiento' => 'Nombre del tecnico saneamiento',
    'municipio' => 'Municipio',
    'nombre_de_establecimiento' => 'Nombre de establecimiento',
    'nombre_del_representante_legal' => 'Nombre del representante legal',
    'identificacion_cedula_y_o_nit' => 'Identificacion cedula y o nit',
    'direccion_del_establecimiento' => 'Direccion del establecimiento',
    'area' => 'Area',
    'telefono' => 'Telefono',
    'correo_electronico' => 'Correo electronico',
    'categoria_establecimiento' => 'Categoria establecimiento',
    'seleccione_el_tipo_de_establecimiento' => 'Seleccione el tipo de establecimiento',
    'fecha_de_visita_actual' => 'Fecha de visita actual',
    'concepto_sanitario' => 'Concepto sanitario',
    'porcentaje_de_cumplimiento' => 'Porcentaje de cumplimiento',
    'motivo_de_la_visita' => 'Motivo de la visita',
    'verificacion_de_rotulado' => 'Verificacion de rotulado',
    'numero_de_rotulados_realizados' => 'Numero de rotulados realizados',
    'establecimiento_cuenta_con_la_documentacion_si_no' => 'Establecimiento cuenta con la documentacion si no',

);

// Eliminar registro si se ha enviado una solicitud de eliminación
if (isset($_POST['eliminar_id'])) {
    $eliminar_id = $_POST['eliminar_id'];
    $delete_sql = "DELETE FROM ivc_alimentos WHERE id = ?";
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
$sql = "SELECT * FROM ivc_alimentos ORDER BY $orden";
$result = $con->query($sql);



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
<a href="../amb_1_index/Inicio_alimentos_y_bebidas.html" class="Index_button">Inicio</a>
<a href="descargar_excel_alimentos.php" class="btn_btn-primary">Descargar lista</a>
<a href="logout_alimentos_RD.php" class="logout-button">Cerrar sesión</a>
<body>
</body>
</html>
