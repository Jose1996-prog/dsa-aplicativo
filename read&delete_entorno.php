<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['entorno'])) {
    header('Location: login_entorno_RD.php');
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
    'nombres_tecnico_de_saneamiento' => 'Nombres tecnico de saneamiento',
    'municipio' => 'Municipio',
    'mes_actividades_a_reportar' => 'Mes actividades a reportar',
    'formato_caracterizacion_a_reportar' => 'Formato caracterizacion a reportar',
    'fecha_de_la_visita_vivienda' => 'Fecha de la visita vivienda',
    'tipo_de_vivienda' => 'Tipo de vivienda',
    'nombre_cabeza_de_hogar' => 'Nombre cabeza de hogar',
    'n_habitantes_por_vivienda' => 'N° habitantes por vivienda',
    'direccion_vivienda' => 'Direccion vivienda',
    'telefono' => 'Telefono',
    'viviendo_construida_lugar_seguro_101' => 'Viviendo construida lugar seguro 101',
    'vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102' => 'Vivienda paredes techos no tienen huecos ni grietas 102',
    'uso_de_combustible_103' => 'Uso de combustible 103',
    'cocina_separada_los_banos_y_habitaciones_104' => 'Cocina separada los banos y habitaciones 104',
    'cuenta_iluminacion_ventilacion_105' => 'Cuenta iluminacion ventilacion 105',
    'cuenta_agua_tratada_201' => 'Cuenta agua tratada 201',
    'vivie_agua_consumir_recipientes_tapados_elevados_piso_202' => 'Vivie agua consumir recipientes tapados elevados piso 202',
    'los_recipientes_almacenar_agua_limpio_203' => 'Los recipientes almacenar agua limpio 203',
    'estado_almacenamiento_agua_204' => 'Estado almacenamiento agua 204',
    'vivienda_cuenta_servicios_bano_301' => 'Vivienda cuenta servicios baño 301',
    'cuenta_con_letrina_302' => 'Cuenta con letrina_302',
    'banos_estan_limpio_303' => 'Banos estan limpio 303',
    'aguas_residuales_drenan_canales_tuberias_305' => 'Aguas residuales drenan canales tuberias 305',
    'recipientes_adecuadamente_ubicados_con_tapa_401' => 'Recipientes_adecuadamente_ubicados_con_tapa_401',
    'vivienda_esta_aseada_402' => 'Vivienda esta aseada 402',
    'separan_los_residuo_403' => 'Separan los residuo 403',
    'basureros_cerca_de_la_vivienda_404' => 'Basureros cerca de la vivienda 404',
    'presencia_plagas_en_vivienda_501' => 'Presencia plagas en vivienda 501',
    'vivienda_realiza_jornada_recojer_inservibles_502' => 'Vivienda realiza jornada recojer inservibles 502',
    'vivienda_construida_materiales_impiden_entrada_plagas_503' => 'Vivienda construida materiales impiden entrada plagas 503',
    'productos_quimicos_almacenados_rotulados_504' => 'Productos_quimicos_almacenados_rotulados_504',
    'cocina_esta_limpia_602' => 'Cocina esta limpia 602',
    'espacios_dialogo_normas_convivencia_conflictos_vivien_701' => 'Espacios dialogo normas convivencia conflictos vivien 701',
    'actividades_comunitarias_proyecto_viviendas_saludables_702' => 'Actividades comunitarias proyecto viviendas saludables 702',
    'utilizan_plan_economia_familiar_703' => 'Utilizan plan economia familiar 703',
    'fecha_de_visita_institucion' => 'Fecha de visita institucion',
    'tipo_de_institucion_educativa' => 'Tipo de institucion educativa',
    'nombre_institucion_educativa' => 'Nombre institucion educativa',
    'nit' => 'Nit',
    'direccion_institucion' => 'Direccion institucion',
    'nombre_del_rector' => 'Nombre del rector',
    'n_de_cedula_de_ciudadania' => 'N de cedula de ciudadania',
    'n_de_estudiantes_en_la_institucion' => 'N de estudiantes en la institucion',
    'institucion_construida_lugar_seguro_101' => 'Institucion construida lugar seguro 101',
    'institcion_paredes_techos_no_tienen_huecos_ni_grietas_102' => 'Institcion paredes techos no tienen huecos ni grietas 102',
    'uso_de_combustible_en_el_comedor_escolar_103' => 'Uso de combustible en el comedor escolar 103',
    'comedor_escolar_esta_separado_de_los_banos_y_salones_104' => 'Comedor escolar esta separado de los banos y salones 104',
    'institucion_cuenta_con_iluminacion_ventilacion_105' => 'Institucion cuenta con iluminacion ventilacion 105',
    'cuenta_con_agua_tratada_201' => 'Cuenta con agua tratada 201',
    'inst_agua_consumir_recipientes_tapados_elevados_piso_202' => 'Inst agua consumir recipientes tapados elevados piso 202',
    'recipientes_para_almacenar_el_agua_estan_limpios_203' => 'Recipientes para almacenar el agua estan limpios 203',
    'estado_del_almacenamiento_del_agua_204' => 'Estado del almacenamiento del agua 204',
    'institucion_cuenta_con_servicios_de_bano_301' => 'Institucion cuenta con servicios de bano 301',
    'banos_estan_limpios_303' => 'Banos estan limpios 303',
    'aguas_residuales_drenan_por_canales_o_tuberias_305' => 'Aguas residuales drenan por canales o tuberias 305',
    'recipientes_residuos_ubicados_recipiente_tapa_401' => 'Recipientes residuos ubicados recipiente tapa 401',
    'institucion_esta_aseada_402' => 'Institucion esta aseada 402',
    'institucion_separa_los_residuos_403' => 'Institucion separa los residuos 403',
    'basureros_cerca_de_la_institucion_404' => 'Basureros cerca de la institucion 404',
    'presencia_de_plagas_en_la_institucion__roedores_insectos_501' => 'Presencia de plagas en la institucion roedores insectos 501',
    'institucion_realiza_jornada_para_recoger_inservibles_502' => 'Institucion realiza jornada para recoger inservibles 502',
    'productos_quimicos_utilizados_bien_almacenados_rotulados_504' => 'Productos quimicos utilizados bien almacenados rotulados 504',
    'alimentos_del_comedor_estan_bien_manipulados_601' => 'Alimentos del comedor estan bien manipulados 601',
    'cocina_del_comedor_esta_limpia_602' => 'Cocina del comedor esta limpia 602',
    'espacios_dialogo_normas_convivencia_conflictos_inst_701' => 'Espacios dialogo normas convivencia conflictos inst 701',
    'actividades_comunitarias_proyecto_escuelas_saludables_702' => 'Actividades comunitarias proyecto escuelas saludables 702',

);

// Eliminar registro si se ha enviado una solicitud de eliminación
if (isset($_POST['eliminar_id'])) {
    $eliminar_id = $_POST['eliminar_id'];
    $delete_sql = "DELETE FROM ivc_entorno WHERE id = ?";
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
$sql = "SELECT * FROM ivc_entorno ORDER BY $orden";
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
<a href="../amb_1_index/Inicio_entorno_saludable.html" class="Index_button">Inicio</a>
<a href="descargar_excel_entorno.php" class="btn_btn-primary">Descargar Lista</a>
<a href="logout_entorno_RD.php" class="logout-button">Cerrar sesión</a>
<body>
</body>
</html>