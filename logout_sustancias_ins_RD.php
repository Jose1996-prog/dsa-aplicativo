<?php
session_start();
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión
header('Location: login_sustancias_ins_RD.php'); // Redirigir al usuario a la página de login
exit;
?>