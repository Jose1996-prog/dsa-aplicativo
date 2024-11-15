<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Configuración del correo
    $to = $email;  // El correo al que será enviado (en este caso, al correo que el usuario ingresó)
    $subject = "Información ingresada en el formulario";
    $message = "
    Hola $nombre,

    Gracias por ponerte en contacto con nosotros. Aquí está la información que ingresaste:

    Nombre: $nombre
    Correo Electrónico: $email
    Mensaje: $mensaje

    ¡Nos pondremos en contacto contigo pronto!
    ";

    // Encabezados del correo
    $headers = "From: jmaa.djmoney1996@gmail.com\r\n";
    $headers .= "Reply-To: no-reply@tudominio.com\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // Enviar el
    if (mail($to, $subject, $message, $headers)) {
        echo "El correo se ha enviado correctamente.";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
}
?>