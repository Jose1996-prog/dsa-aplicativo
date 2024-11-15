<?php
session_start();  // Iniciar sesión para manejar el estado del registro

$host = "localhost";
$port = 3306;
$socket = "";
$user = "root";
$password = "1996";
$dbname = "base_de_prueba";

// Crear conexión a la base de datos
$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

if ($con->connect_error) {
    die('Error de conexión: ' . $con->connect_error);
}

// Inicializar variables
$mensaje = '';
$numero_de_registro = '';
$nuevos_nombres = '';
$nuevos_apellidos = '';
$nueva_fecha_nacimiento = '';
$registro_existe = false;

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['verificar'])) {
        // Obtener el número de registro del formulario de verificación
        $numero_de_registro = $_POST['numero_de_registro'];

        // Verificar si el número de registro existe
        $sql = "SELECT nombres, apellidos, fecha_nacimiento FROM datos WHERE numero_de_registro = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $numero_de_registro);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // El número de registro existe, obtener los datos del registro
            $stmt->bind_result($nuevos_nombres, $nuevos_apellidos, $nueva_fecha_nacimiento);
            $stmt->fetch();
            $registro_existe = true;
            $_SESSION['registro_existe'] = true;  // Guardar estado en sesión
        } else {
            // El número de registro no existe
            $mensaje = "Número de registro no encontrado.";
            $_SESSION['registro_existe'] = false;
        }

        $stmt->close();
    }

    if (isset($_POST['actualizar']) && (isset($_SESSION['registro_existe']) && $_SESSION['registro_existe'])) {
        // Obtener los datos del formulario de actualización
        $numero_de_registro = $_POST['numero_de_registro'];
        $nuevos_nombres = $_POST['nombres'];
        $nuevos_apellidos = $_POST['apellidos'];
        $nueva_fecha_nacimiento = $_POST['fecha_nacimiento'];

        // Actualizar el registro
        $sql_update = "UPDATE datos SET nombres = ?, apellidos = ?, fecha_nacimiento = ? WHERE numero_de_registro = ?";
        $stmt_update = $con->prepare($sql_update);
        $stmt_update->bind_param("sssi", $nuevos_nombres, $nuevos_apellidos, $nueva_fecha_nacimiento, $numero_de_registro);

        if ($stmt_update->execute()) {
            $mensaje = "Registro actualizado exitosamente.";
            $_SESSION['registro_existe'] = false;  // Reiniciar el estado después de la actualización
        } else {
            $mensaje = "Error al actualizar el registro: " . $con->error;
        }

        $stmt_update->close();
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Registro</title>
</head>
<body>
    <h1>Actualizar Registro</h1>

    <!-- Formulario para verificar el número de registro -->
    <form action="editar.php" method="post">
        <label for="numero_de_registro">Número de Registro:</label>
        <input type="number" id="numero_de_registro" name="numero_de_registro" value="<?php echo htmlspecialchars($numero_de_registro); ?>" required>
        <input type="submit" name="verificar" value="Verificar Registro">
    </form>

    <!-- Mostrar el formulario de edición solo si el registro existe -->
    <?php if (isset($_SESSION['registro_existe']) && $_SESSION['registro_existe']): ?>
        <h2>Editar Registro</h2>
        <form action="editar.php" method="post">
            <input type="hidden" name="numero_de_registro" value="<?php echo htmlspecialchars($numero_de_registro); ?>">
            
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo htmlspecialchars($nuevos_nombres); ?>" required><br><br>
            
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($nuevos_apellidos); ?>" required><br><br>
            
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($nueva_fecha_nacimiento); ?>" required><br><br>
            
            <input type="submit" name="actualizar" value="Actualizar Registro">
        </form>
    <?php endif; ?>

    <!-- Mostrar mensajes de estado -->
    <?php if ($mensaje): ?>
        <p><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>
</body>
</html>
