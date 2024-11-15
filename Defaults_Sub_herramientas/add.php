<?php

$connction = mysqli_connect("localhost","root","1996","formulario");
if(!$connction)
    die("Could not connect".mysqli_connect_error());

if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $query = "INSERT INTO tabla_form (nombre, usuario, contraseña) VALUES ('$nombre', '$usuario', '$contraseña')";

    if(mysqli_query($connction, $query)){
        echo "Datos insertados correctamente.";
    } else{
        echo "Error al insertar datos: " . mysqli_error($connction);
    }
}

mysqli_close($connction);

?>
