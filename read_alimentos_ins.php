<?php
$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

// Crear una conexión a la base de datos
$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

// Verificar conexión
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

// Inicializar variable para el número de documento
$numero_de_documento = '';

// Verificar si se ha enviado un número de documento y no está vacío
if (isset($_POST['numero_de_documento']) && !empty($_POST['numero_de_documento'])) {
    $numero_de_documento = $_POST['numero_de_documento'];

    // Preparar la consulta SQL
    $sql = "SELECT * FROM ins_alimentos WHERE numero_de_documento = ?";

    // Preparar y ejecutar la consulta
    $stmt = $con->prepare($sql);

    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $con->error);
    }

    // Enlazar los parámetros
    $stmt->bind_param('i', $numero_de_documento);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró un registro
    if ($result->num_rows > 0) {
        // Mostrar los datos del registro
        while ($row = $result->fetch_assoc()) {
            echo '<h2 style="text-align: center;">Datos del Registro</h2>';
            echo '<div style="display: flex; justify-content: center;">';
            echo '<table border="1" style="border-collapse: collapse; width: 80%; text-align: left;">';
            echo '<tr><th colspan="2" style="background-color: #f2f2f2;">Detalles del Registro</th></tr>';
        
            echo '<tr><td><strong>Fecha:</strong></td><td>' . htmlspecialchars($row['fecha']) . '</td></tr>';
            echo '<tr><td><strong>Número de Inscripción:</strong></td><td>' . htmlspecialchars($row['numero_inscripcion']) . '</td></tr>';
            echo '<tr><td><strong>Razón Social:</strong></td><td>' . htmlspecialchars($row['razon_social']) . '</td></tr>';
            echo '<tr><td><strong>Nombre Comercial:</strong></td><td>' . htmlspecialchars($row['nombre_comercial']) . '</td></tr>';
            echo '<tr><td><strong>Tipo Documento Identificación:</strong></td><td>' . htmlspecialchars($row['tipo_documento_de_identificacion']) . '</td></tr>';
            echo '<tr><td><strong>Número Identificación Tributaria:</strong></td><td>' . htmlspecialchars($row['numero_identificacion_tributaria']) . '</td></tr>';
            echo '<tr><td><strong>Nombre Establecimiento de Comercio:</strong></td><td>' . htmlspecialchars($row['nombre_establecimiento_de_comercio']) . '</td></tr>';
            echo '<tr><td><strong>Nombre Propietario del Establecimiento:</strong></td><td>' . htmlspecialchars($row['nombre_propietario_del_establecimiento']) . '</td></tr>';
            echo '<tr><td><strong>Tipo Documento Persona Natural:</strong></td><td>' . htmlspecialchars($row['tipo_documento_per_natural']) . '</td></tr>';
            echo '<tr><td><strong>Número de Documento:</strong></td><td>' . htmlspecialchars($row['numero_de_documento']) . '</td></tr>';
            echo '<tr><td><strong>Dirección Ubicación del Establecimiento:</strong></td><td>' . htmlspecialchars($row['direccion_ubicacion_del_establecimiento']) . '</td></tr>';
            echo '<tr><td><strong>Zona:</strong></td><td>' . htmlspecialchars($row['zona']) . '</td></tr>';
            echo '<tr><td><strong>Barrio:</strong></td><td>' . htmlspecialchars($row['barrio']) . '</td></tr>';
            echo '<tr><td><strong>Vereda:</strong></td><td>' . htmlspecialchars($row['vereda']) . '</td></tr>';
            echo '<tr><td><strong>Lugar del Establecimiento:</strong></td><td>' . htmlspecialchars($row['lugar_de_establecimiento']) . '</td></tr>';
            echo '<tr><td><strong>Otro:</strong></td><td>' . htmlspecialchars($row['otro']) . '</td></tr>';
            echo '<tr><td><strong>Cual:</strong></td><td>' . htmlspecialchars($row['cual']) . '</td></tr>';
            echo '<tr><td><strong>Teléfono:</strong></td><td>' . htmlspecialchars($row['telefono']) . '</td></tr>';
            echo '<tr><td><strong>Fax:</strong></td><td>' . htmlspecialchars($row['fax']) . '</td></tr>';
            echo '<tr><td><strong>Celular:</strong></td><td>' . htmlspecialchars($row['celular']) . '</td></tr>';
            echo '<tr><td><strong>Correo Electrónico:</strong></td><td>' . htmlspecialchars($row['correo_electronico']) . '</td></tr>';
            echo '<tr><td><strong>Dirección de Notificación Física:</strong></td><td>' . htmlspecialchars($row['direccion_de_notificacion_fisica']) . '</td></tr>';
            echo '<tr><td><strong>Dirección de Notificación Electrónica:</strong></td><td>' . htmlspecialchars($row['direccion_de_notificacion_electronica']) . '</td></tr>';
            echo '<tr><td><strong>Autoriza Notificación Electrónica:</strong></td><td>' . htmlspecialchars($row['autoriza_la_notificacion_electronica']) . '</td></tr>';
            echo '<tr><td><strong>Municipio de Dirección de Notificación:</strong></td><td>' . htmlspecialchars($row['municipio_de_direccion_de_notificacion']) . '</td></tr>';
            echo '<tr><td><strong>Departamento de Dirección de Notificación:</strong></td><td>' . htmlspecialchars($row['departamento_de_direccion_de_notificacion']) . '</td></tr>';
            echo '<tr><td><strong>Preparación de Alimentos:</strong></td><td>' . htmlspecialchars($row['preparacion_alimentos']) . '</td></tr>';
            echo '<tr><td><strong>Comedores:</strong></td><td>' . htmlspecialchars($row['comedores']) . '</td></tr>';
            echo '<tr><td><strong>Expendio de Alimentos:</strong></td><td>' . htmlspecialchars($row['expendio_de_alimentos']) . '</td></tr>';
            echo '<tr><td><strong>Grandes Superficies:</strong></td><td>' . htmlspecialchars($row['grandes_superficies']) . '</td></tr>';
            echo '<tr><td><strong>Ensamble de Alimentos:</strong></td><td>' . htmlspecialchars($row['ensamble_de_alimentos']) . '</td></tr>';
            echo '<tr><td><strong>Almacenamiento:</strong></td><td>' . htmlspecialchars($row['almacenamiento']) . '</td></tr>';
            echo '<tr><td><strong>Venta en Vía Pública:</strong></td><td>' . htmlspecialchars($row['venta_en_via_publica']) . '</td></tr>';
            echo '<tr><td><strong>Expendio de Bebidas Alcohólicas:</strong></td><td>' . htmlspecialchars($row['expendio_de_bebidas_alcoholicas']) . '</td></tr>';
            echo '<tr><td><strong>Plaza de Mercado:</strong></td><td>' . htmlspecialchars($row['plaza_de_mercado']) . '</td></tr>';
            echo '<tr><td><strong>Establecimiento Inspeccionado Entidad Territorial Salud:</strong></td><td>' . htmlspecialchars($row['establecimiento_inspeccionado_entidad_territorial_salud']) . '</td></tr>';
            echo '<tr><td><strong>Fecha de Última Inspección:</strong></td><td>' . htmlspecialchars($row['fecha_de_ultima_inspeccion']) . '</td></tr>';
            echo '<tr><td><strong>Último Concepto Sanitario Emitido:</strong></td><td>' . htmlspecialchars($row['ultimo_concepto_sanitario_emitio']) . '</td></tr>';
            echo '<tr><td><strong>Funcionario que Realiza la Inspección:</strong></td><td>' . htmlspecialchars($row['funcionario_que_realiza_la_inspeccion']) . '</td></tr>';
            echo '<tr><td><strong>Observaciones por Autoridad Sanitaria:</strong></td><td>' . htmlspecialchars($row['observaciones_por_autoridad_sanitaria']) . '</td></tr>';
            echo '<tr><td><strong>Observaciones por Responsable de la Inscripción:</strong></td><td>' . htmlspecialchars($row['observaciones_por_responsable_de_la_inscripcion']) . '</td></tr>';
            echo '<tr><td><strong>Entregado por Nombre Completo:</strong></td><td>' . htmlspecialchars($row['entregado_por_nombre_completo']) . '</td></tr>';
            echo '<tr><td><strong>Entregado por Cédula:</strong></td><td>' . htmlspecialchars($row['entregado_por_cedula']) . '</td></tr>';

            echo '<tr><td><strong>En Calidad de Responsable:</strong></td><td>' . htmlspecialchars($row['en_calidad_de_responsable']) . '</td></tr>';
            echo '<tr><td><strong>Recibido por Nombre Completo:</strong></td><td>' . htmlspecialchars($row['recibido_por_nombre_completo']) . '</td></tr>';
            echo '<tr><td><strong>Recibido por Cédula:</strong></td><td>' . htmlspecialchars($row['recibido_por_cedula']) . '</td></tr>';

            echo '<tr><td><strong>En Calidad de Funcionario:</strong></td><td>' . htmlspecialchars($row['en_calidad_de_funcionario']) . '</td></tr>';
        
            echo '</table>';
            echo '</div>';
        }
    } else {
        echo "<p>No se encontraron registros con el número de documento proporcionado.</p>";
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$con->close();
?>

<!-- Formulario HTML para buscar el registro -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Registro</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="number"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
<body>
    <h1 style="text-align: center;">Buscar Registro por Número de Documento</h1>
    <div style="display: flex; justify-content: center;">
        <form method="post" action="">
            <label for="numero_de_documento">Número de Documento:</label>
            <input type="number" id="numero_de_documento" name="numero_de_documento" required>
            <button type="submit">Buscar</button>
        </form>
    </div>
</body>
</html>
