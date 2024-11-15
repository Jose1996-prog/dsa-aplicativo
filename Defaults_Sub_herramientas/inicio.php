<?php
// Configuración de la base de datos
$host = 'localhost';
$port = 3306;
$socket = '';
$user = 'root';
$password = '1996';
$dbname = 'mi_base_datos';

// Conexión a la base de datos
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die('Could not connect to the database server: ' . mysqli_connect_error());

// Crear
if (isset($_POST['create'])) {
    $nombre = $_POST['nombre'];
    $stmt = $con->prepare("INSERT INTO datos (nombre) VALUES (?)");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->close();
}

// Leer
$result = $con->query("SELECT * FROM datos");

// Eliminar
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $con->prepare("DELETE FROM datos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Cierre de conexión
$con->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD con PHP</title>
</head>
<body>
    <h1>CRUD con PHP</h1>

    <!-- Formulario para Crear -->
    <h2>Registrar Nuevo Dato</h2>
    <form action="index.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit" name="create">Registrar</button>
    </form>

    <!-- Lista de Datos -->
    <h2>Lista de Datos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                    <td>
                        <!-- Formulario para Editar -->
                        <form action="editar.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <input type="text" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>
                            <button type="submit" name="update">Actualizar</button>
                        </form>
                        <!-- Formulario para Eliminar -->
                        <form action="index.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <button type="submit" name="delete" onclick="return confirm('¿Estás seguro de que quieres eliminar este dato?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
