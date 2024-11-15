<?php
    $host = "localhost";
    $port = 3306;
    $socket = "";
    $user = "root";
    $password = "1996";
    $dbname = "formulario";

    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die('Could not connect to the database server' . mysqli_connect_error());

    // Verificar si se ha enviado el formulario de actualización
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        $id = $_POST['id'];
        $fecha_recibido = $_POST['fecha_recibido'];
        $mes_letras = $_POST['mes_letras'];
        $medio_recibido = $_POST['medio_recibido'];
        $numero_radicado = $_POST['numero_radicado'];
        $usuario_nombre = $_POST['usuario_nombre'];
        $municipio = $_POST['municipio'];
        $tipo_solicitud = $_POST['tipo_solicitud'];
        $objeto_solicitud = $_POST['objeto_solicitud'];
        $correo_usuario = $_POST['correo_usuario'];
        $documento_soporte = $_POST['documento_soporte'];
        $programa_delegado = $_POST['programa_delegado'];
        $fecha_delegacion = $_POST['fecha_delegacion'];
        $correo_delegado = $_POST['correo_delegado'];
        $quien_atiende = $_POST['quien_atiende'];
        $delegado_coordinacion = $_POST['delegado_coordinacion'];
        $traslado_competencia = $_POST['traslado_competencia'];
        $correo_traslado = $_POST['correo_traslado'];
        $tiempo_respuesta = $_POST['tiempo_respuesta'];
        $estado_solicitud = $_POST['estado_solicitud'];
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $alerta_dias = $_POST['alerta_dias'];
        $dias_restantes = $_POST['dias_restantes'];
        $soporte_respuesta = $_POST['soporte_respuesta'];
        $fecha_respuesta = $_POST['fecha_respuesta'];
        $correo_notificado = $_POST['correo_notificado'];
        $observaciones = $_POST['observaciones'];

        // Preparar la consulta de actualización
        $update_query = "UPDATE datos_abril SET Fecha_de_recibido_Solicitud_dd_mm_aa=?, MES_Letras=?, Medio_por_el_cual_fue_recibido=?, Numero_radicado=?, Usuario_Nombre_Persona_Natural_y_o_Juridica=?, Municipio=?, Tipo_de_solicitud=?, Objeto_de_la_solicitud=?, Correo_Electronico_Usuario=?, Documento_soporte_de_Solicitud=?, Programa_Delegado=?, Fecha_delegacion_dd_mm_aa=?, Correo_Electronico_Delegado=?, Quien_Atiende_Solicitud=?, Delegado_a_Coordinacion_DSA=?, Traslado_Por_competencia_a=?, Correo_Electronico_enviado_el_Traslado_Por_Competencia=?, Tiempo_de_respuesta_Requerido=?, Estado_Solicitud=?, Fecha_de_vencimiento_dd_mm_aa=?, Alerta_en_numero_de_dias=?, Dias_restantes_de_respuesta=?, Soporte_de_la_respuesta_a_solicitud=?, Fecha_Respuesta_Solicitud_dd_mm_aa=?, Correo_Electronico_Notificado=?, Observaciones=? WHERE id=?";
        if ($stmt = $con->prepare($update_query)) {
            $stmt->bind_param("ssssssssssssssssssssssssssi", $fecha_recibido, $mes_letras, $medio_recibido, $numero_radicado, $usuario_nombre, $municipio, $tipo_solicitud, $objeto_solicitud, $correo_usuario, $documento_soporte, $programa_delegado, $fecha_delegacion, $correo_delegado, $quien_atiende, $delegado_coordinacion, $traslado_competencia, $correo_traslado, $tiempo_respuesta, $estado_solicitud, $fecha_vencimiento, $alerta_dias, $dias_restantes, $soporte_respuesta, $fecha_respuesta, $correo_notificado, $observaciones, $id);
            $stmt->execute();
            $stmt->close();
            echo "<p>Registro actualizado correctamente.</p>";
        } else {
            echo "<p>Error al preparar la consulta de actualización: " . $con->error . "</p>";
        }
    }

    // Mostrar lista de registros para seleccionar y editar
    $query = "SELECT id, Fecha_de_recibido_Solicitud_dd_mm_aa, Usuario_Nombre_Persona_Natural_y_o_Juridica FROM datos_abril";
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($id, $fecha_recibido, $usuario_nombre);
        echo "<h2>Selecciona un registro para editar:</h2>";
        echo "<ul>";
        while ($stmt->fetch()) {
            echo "<li>";
            echo "<form action='editar.php' method='post'>";
            echo "Fecha Recibido: $fecha_recibido, Usuario: $usuario_nombre ";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='hidden' name='action' value='edit'>";
            echo "<input type='submit' value='Editar'>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
        $stmt->close();
    }
    
    // Mostrar formulario de edición si se ha seleccionado un registro
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit') {
        $id = $_POST['id'];
        $query = "SELECT Fecha_de_recibido_Solicitud_dd_mm_aa, MES_Letras, Medio_por_el_cual_fue_recibido, Numero_radicado, Usuario_Nombre_Persona_Natural_y_o_Juridica, Municipio, Tipo_de_solicitud, Objeto_de_la_solicitud, Correo_Electronico_Usuario, Documento_soporte_de_Solicitud, Programa_Delegado, Fecha_delegacion_dd_mm_aa, Correo_Electronico_Delegado, Quien_Atiende_Solicitud, Delegado_a_Coordinacion_DSA, Traslado_Por_competencia_a, Correo_Electronico_enviado_el_Traslado_Por_Competencia, Tiempo_de_respuesta_Requerido, Estado_Solicitud, Fecha_de_vencimiento_dd_mm_aa, Alerta_en_numero_de_dias, Dias_restantes_de_respuesta, Soporte_de_la_respuesta_a_solicitud, Fecha_Respuesta_Solicitud_dd_mm_aa, Correo_Electronico_Notificado, Observaciones FROM datos_abril WHERE id=?";
        if ($stmt = $con->prepare
