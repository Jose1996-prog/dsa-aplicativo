<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['entorno'])) {
    header('Location: login_entorno_upd.php');
    exit;
}

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die('Could not connect to the database server' . mysqli_connect_error());

    // Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

    $id = $_POST['id'];
    $nombres_tecnico_de_saneamiento = $_POST['nombres_tecnico_de_saneamiento'];
    $municipio = $_POST['municipio'];
    $mes_actividades_a_reportar = $_POST['mes_actividades_a_reportar'];
    $formato_caracterizacion_a_reportar = $_POST['formato_caracterizacion_a_reportar'];
    $fecha_de_la_visita_vivienda = $_POST['fecha_de_la_visita_vivienda'];
    $tipo_de_vivienda = $_POST['tipo_de_vivienda'];
    $nombre_cabeza_de_hogar = $_POST['nombre_cabeza_de_hogar'];
    $n_habitantes_por_vivienda = $_POST['n_habitantes_por_vivienda'];
    $direccion_vivienda = $_POST['direccion_vivienda'];
    $telefono = $_POST['telefono'];
    $viviendo_construida_lugar_seguro_101 = $_POST['viviendo_construida_lugar_seguro_101'];
    $vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102 = $_POST['vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102'];
    $uso_de_combustible_103 = $_POST['uso_de_combustible_103'];
    $cocina_separada_los_banos_y_habitaciones_104 = $_POST['cocina_separada_los_banos_y_habitaciones_104'];
    $cuenta_iluminacion_ventilacion_105 = $_POST['cuenta_iluminacion_ventilacion_105'];
    $cuenta_agua_tratada_201 = $_POST['cuenta_agua_tratada_201'];
    $vivie_agua_consumir_recipientes_tapados_elevados_piso_202 = $_POST['vivie_agua_consumir_recipientes_tapados_elevados_piso_202'];
    $los_recipientes_almacenar_agua_limpio_203 = $_POST['los_recipientes_almacenar_agua_limpio_203'];
    $estado_almacenamiento_agua_204 = $_POST['estado_almacenamiento_agua_204'];
    $vivienda_cuenta_servicios_bano_301 = $_POST['vivienda_cuenta_servicios_bano_301'];
    $cuenta_con_letrina_302 = $_POST['cuenta_con_letrina_302'];
    $banos_estan_limpio_303 = $_POST['banos_estan_limpio_303'];
    $aguas_residuales_drenan_canales_tuberias_305 = $_POST['aguas_residuales_drenan_canales_tuberias_305'];
    $recipientes_adecuadamente_ubicados_con_tapa_401 = $_POST['recipientes_adecuadamente_ubicados_con_tapa_401'];
    $vivienda_esta_aseada_402 = $_POST['vivienda_esta_aseada_402'];
    $separan_los_residuo_403 = $_POST['separan_los_residuo_403'];
    $basureros_cerca_de_la_vivienda_404 = $_POST['basureros_cerca_de_la_vivienda_404'];
    $presencia_plagas_en_vivienda_501 = $_POST['presencia_plagas_en_vivienda_501'];
    $vivienda_realiza_jornada_recojer_inservibles_502 = $_POST['vivienda_realiza_jornada_recojer_inservibles_502'];
    $vivienda_construida_materiales_impiden_entrada_plagas_503 = $_POST['vivienda_construida_materiales_impiden_entrada_plagas_503'];
    $productos_quimicos_almacenados_rotulados_504 = $_POST['productos_quimicos_almacenados_rotulados_504'];
    $cocina_esta_limpia_602 = $_POST['cocina_esta_limpia_602'];
    $espacios_dialogo_normas_convivencia_conflictos_vivien_701 = $_POST['espacios_dialogo_normas_convivencia_conflictos_vivien_701'];
    $actividades_comunitarias_proyecto_viviendas_saludables_702 = $_POST['actividades_comunitarias_proyecto_viviendas_saludables_702'];
    $utilizan_plan_economia_familiar_703 = $_POST['utilizan_plan_economia_familiar_703'];
    // -----------------------------------------------------------------------------------------------------------
    $fecha_de_visita_institucion = $_POST['fecha_de_visita_institucion'];
    $tipo_de_institucion_educativa = $_POST['tipo_de_institucion_educativa'];
    $nombre_institucion_educativa = $_POST['nombre_institucion_educativa'];
    $nit = $_POST['nit'];
    $direccion_institucion = $_POST['direccion_institucion'];
    $nombre_del_rector = $_POST['nombre_del_rector'];
    $n_de_cedula_de_ciudadania = $_POST['n_de_cedula_de_ciudadania'];
    $n_de_estudiantes_en_la_institucion = $_POST['n_de_estudiantes_en_la_institucion'];
    $institucion_construida_lugar_seguro_101 = $_POST['institucion_construida_lugar_seguro_101'];
    $institcion_paredes_techos_no_tienen_huecos_ni_grietas_102 = $_POST['institcion_paredes_techos_no_tienen_huecos_ni_grietas_102'];
    $uso_de_combustible_en_el_comedor_escolar_103 = $_POST['uso_de_combustible_en_el_comedor_escolar_103'];
    $comedor_escolar_esta_separado_de_los_banos_y_salones_104 = $_POST['comedor_escolar_esta_separado_de_los_banos_y_salones_104'];
    $institucion_cuenta_con_iluminacion_ventilacion_105 = $_POST['institucion_cuenta_con_iluminacion_ventilacion_105'];
    $cuenta_con_agua_tratada_201 = $_POST['cuenta_con_agua_tratada_201'];
    $inst_agua_consumir_recipientes_tapados_elevados_piso_202 = $_POST['inst_agua_consumir_recipientes_tapados_elevados_piso_202'];
    $recipientes_para_almacenar_el_agua_estan_limpios_203 = $_POST['recipientes_para_almacenar_el_agua_estan_limpios_203'];
    $estado_del_almacenamiento_del_agua_204 = $_POST['estado_del_almacenamiento_del_agua_204'];
    $institucion_cuenta_con_servicios_de_bano_301 = $_POST['institucion_cuenta_con_servicios_de_bano_301'];
    $banos_estan_limpios_303 = $_POST['banos_estan_limpios_303'];
    $aguas_residuales_drenan_por_canales_o_tuberias_305 = $_POST['aguas_residuales_drenan_por_canales_o_tuberias_305'];
    $recipientes_residuos_ubicados_recipiente_tapa_401 = $_POST['recipientes_residuos_ubicados_recipiente_tapa_401'];
    $institucion_esta_aseada_402 = $_POST['institucion_esta_aseada_402'];
    $institucion_separa_los_residuos_403 = $_POST['institucion_separa_los_residuos_403'];
    $basureros_cerca_de_la_institucion_404 = $_POST['basureros_cerca_de_la_institucion_404'];
    $presencia_de_plagas_en_la_institucion__roedores_insectos_501 = $_POST['presencia_de_plagas_en_la_institucion__roedores_insectos_501'];
    $institucion_realiza_jornada_para_recoger_inservibles_502 = $_POST['institucion_realiza_jornada_para_recoger_inservibles_502'];
    $productos_quimicos_utilizados_bien_almacenados_rotulados_504 = $_POST['productos_quimicos_utilizados_bien_almacenados_rotulados_504'];
    $alimentos_del_comedor_estan_bien_manipulados_601 = $_POST['alimentos_del_comedor_estan_bien_manipulados_601'];
    $cocina_del_comedor_esta_limpia_602 = $_POST['cocina_del_comedor_esta_limpia_602'];
    $espacios_dialogo_normas_convivencia_conflictos_inst_701 = $_POST['espacios_dialogo_normas_convivencia_conflictos_inst_701'];
    $actividades_comunitarias_proyecto_escuelas_saludables_702 = $_POST['actividades_comunitarias_proyecto_escuelas_saludables_702'];



    // Preparar la consulta de actualización
    $update_query = "UPDATE ivc_entorno 
                     SET nombres_tecnico_de_saneamiento = ?,
                        municipio = ?,
                        mes_actividades_a_reportar = ?,
                        formato_caracterizacion_a_reportar = ?,
                        fecha_de_la_visita_vivienda = ?,
                        tipo_de_vivienda = ?,
                        nombre_cabeza_de_hogar = ?,
                        n_habitantes_por_vivienda = ?,
                        direccion_vivienda = ?,
                        telefono = ?,
                        viviendo_construida_lugar_seguro_101 = ?,
                        vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102 = ?,
                        uso_de_combustible_103 = ?,
                        cocina_separada_los_banos_y_habitaciones_104 = ?,
                        cuenta_iluminacion_ventilacion_105 = ?,
                        cuenta_agua_tratada_201 = ?,
                        vivie_agua_consumir_recipientes_tapados_elevados_piso_202 = ?,
                        los_recipientes_almacenar_agua_limpio_203 = ?,
                        estado_almacenamiento_agua_204 = ?,
                        vivienda_cuenta_servicios_bano_301 = ?,
                        cuenta_con_letrina_302 = ?,
                        banos_estan_limpio_303 = ?,
                        aguas_residuales_drenan_canales_tuberias_305 = ?,
                        recipientes_adecuadamente_ubicados_con_tapa_401 = ?,
                        vivienda_esta_aseada_402 = ?,
                        separan_los_residuo_403 = ?,
                        basureros_cerca_de_la_vivienda_404 = ?,
                        presencia_plagas_en_vivienda_501 = ?,
                        vivienda_realiza_jornada_recojer_inservibles_502 = ?,
                        vivienda_construida_materiales_impiden_entrada_plagas_503 = ?,
                        productos_quimicos_almacenados_rotulados_504 = ?,
                        cocina_esta_limpia_602 = ?,
                        espacios_dialogo_normas_convivencia_conflictos_vivien_701 = ?,
                        actividades_comunitarias_proyecto_viviendas_saludables_702 = ?,
                        utilizan_plan_economia_familiar_703 = ?,
                        fecha_de_visita_institucion = ?,
                        tipo_de_institucion_educativa = ?,
                        nombre_institucion_educativa = ?,
                        nit = ?,
                        direccion_institucion = ?,
                        nombre_del_rector = ?,
                        n_de_cedula_de_ciudadania = ?,
                        n_de_estudiantes_en_la_institucion = ?,
                        institucion_construida_lugar_seguro_101 = ?,
                        institcion_paredes_techos_no_tienen_huecos_ni_grietas_102 = ?,
                        uso_de_combustible_en_el_comedor_escolar_103 = ?,
                        comedor_escolar_esta_separado_de_los_banos_y_salones_104 = ?,
                        institucion_cuenta_con_iluminacion_ventilacion_105 = ?,
                        cuenta_con_agua_tratada_201 = ?,
                        inst_agua_consumir_recipientes_tapados_elevados_piso_202 = ?,
                        recipientes_para_almacenar_el_agua_estan_limpios_203 = ?,
                        estado_del_almacenamiento_del_agua_204 = ?,
                        institucion_cuenta_con_servicios_de_bano_301 = ?,
                        banos_estan_limpios_303 = ?,
                        aguas_residuales_drenan_por_canales_o_tuberias_305 = ?,
                        recipientes_residuos_ubicados_recipiente_tapa_401 = ?,
                        institucion_esta_aseada_402 = ?,
                        institucion_separa_los_residuos_403 = ?,
                        basureros_cerca_de_la_institucion_404 = ?,
                        presencia_de_plagas_en_la_institucion__roedores_insectos_501 = ?,
                        institucion_realiza_jornada_para_recoger_inservibles_502 = ?,
                        productos_quimicos_utilizados_bien_almacenados_rotulados_504 = ?,
                        alimentos_del_comedor_estan_bien_manipulados_601 = ?,
                        cocina_del_comedor_esta_limpia_602 = ?,
                        espacios_dialogo_normas_convivencia_conflictos_inst_701 = ?,
                        actividades_comunitarias_proyecto_escuelas_saludables_702 = ?
                     WHERE id=?";

    if ($stmt = $con->prepare($update_query)) {

        $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssi", 
        $nombres_tecnico_de_saneamiento,
        $municipio,
        $mes_actividades_a_reportar,
        $formato_caracterizacion_a_reportar,
        $fecha_de_la_visita_vivienda,
        $tipo_de_vivienda,
        $nombre_cabeza_de_hogar,
        $n_habitantes_por_vivienda,
        $direccion_vivienda,
        $telefono,
        $viviendo_construida_lugar_seguro_101,
        $vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102,
        $uso_de_combustible_103,
        $cocina_separada_los_banos_y_habitaciones_104,
        $cuenta_iluminacion_ventilacion_105,
        $cuenta_agua_tratada_201,
        $vivie_agua_consumir_recipientes_tapados_elevados_piso_202,
        $los_recipientes_almacenar_agua_limpio_203,
        $estado_almacenamiento_agua_204,
        $vivienda_cuenta_servicios_bano_301,
        $cuenta_con_letrina_302,
        $banos_estan_limpio_303,
        $aguas_residuales_drenan_canales_tuberias_305,
        $recipientes_adecuadamente_ubicados_con_tapa_401,
        $vivienda_esta_aseada_402,
        $separan_los_residuo_403,
        $basureros_cerca_de_la_vivienda_404,
        $presencia_plagas_en_vivienda_501,
        $vivienda_realiza_jornada_recojer_inservibles_502,
        $vivienda_construida_materiales_impiden_entrada_plagas_503,
        $productos_quimicos_almacenados_rotulados_504,
        $cocina_esta_limpia_602,
        $espacios_dialogo_normas_convivencia_conflictos_vivien_701,
        $actividades_comunitarias_proyecto_viviendas_saludables_702,
        $utilizan_plan_economia_familiar_703,
        $fecha_de_visita_institucion,
        $tipo_de_institucion_educativa,
        $nombre_institucion_educativa,
        $nit,
        $direccion_institucion,
        $nombre_del_rector,
        $n_de_cedula_de_ciudadania,
        $n_de_estudiantes_en_la_institucion,
        $institucion_construida_lugar_seguro_101,
        $institcion_paredes_techos_no_tienen_huecos_ni_grietas_102,
        $uso_de_combustible_en_el_comedor_escolar_103,
        $comedor_escolar_esta_separado_de_los_banos_y_salones_104,
        $institucion_cuenta_con_iluminacion_ventilacion_105,
        $cuenta_con_agua_tratada_201,
        $inst_agua_consumir_recipientes_tapados_elevados_piso_202,
        $recipientes_para_almacenar_el_agua_estan_limpios_203,
        $estado_del_almacenamiento_del_agua_204,
        $institucion_cuenta_con_servicios_de_bano_301,
        $banos_estan_limpios_303,
        $aguas_residuales_drenan_por_canales_o_tuberias_305,
        $recipientes_residuos_ubicados_recipiente_tapa_401,
        $institucion_esta_aseada_402,
        $institucion_separa_los_residuos_403,
        $basureros_cerca_de_la_institucion_404,
        $presencia_de_plagas_en_la_institucion__roedores_insectos_501,
        $institucion_realiza_jornada_para_recoger_inservibles_502,
        $productos_quimicos_utilizados_bien_almacenados_rotulados_504,
        $alimentos_del_comedor_estan_bien_manipulados_601,
        $cocina_del_comedor_esta_limpia_602,
        $espacios_dialogo_normas_convivencia_conflictos_inst_701,
        $actividades_comunitarias_proyecto_escuelas_saludables_702,
        $id
    );

        $stmt->execute();
        $stmt->close();
        echo "<p>Registro actualizado correctamente.</p>";
    } else {
        echo "<p>Error al preparar la consulta de actualización: " . $con->error . "</p>";
    }
}

// Mostrar formulario de edición si se ha seleccionado un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    
    $query = "SELECT nombres_tecnico_de_saneamiento,
                            municipio,
                            mes_actividades_a_reportar,
                            formato_caracterizacion_a_reportar,
                            fecha_de_la_visita_vivienda,
                            tipo_de_vivienda,
                            nombre_cabeza_de_hogar,
                            n_habitantes_por_vivienda,
                            direccion_vivienda,
                            telefono,
                            viviendo_construida_lugar_seguro_101,
                            vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102,
                            uso_de_combustible_103,
                            cocina_separada_los_banos_y_habitaciones_104,
                            cuenta_iluminacion_ventilacion_105,
                            cuenta_agua_tratada_201,
                            vivie_agua_consumir_recipientes_tapados_elevados_piso_202,
                            los_recipientes_almacenar_agua_limpio_203,
                            estado_almacenamiento_agua_204,
                            vivienda_cuenta_servicios_bano_301,
                            cuenta_con_letrina_302,
                            banos_estan_limpio_303,
                            aguas_residuales_drenan_canales_tuberias_305,
                            recipientes_adecuadamente_ubicados_con_tapa_401,
                            vivienda_esta_aseada_402,
                            separan_los_residuo_403,
                            basureros_cerca_de_la_vivienda_404,
                            presencia_plagas_en_vivienda_501,
                            vivienda_realiza_jornada_recojer_inservibles_502,
                            vivienda_construida_materiales_impiden_entrada_plagas_503,
                            productos_quimicos_almacenados_rotulados_504,
                            cocina_esta_limpia_602,
                            espacios_dialogo_normas_convivencia_conflictos_vivien_701,
                            actividades_comunitarias_proyecto_viviendas_saludables_702,
                            utilizan_plan_economia_familiar_703,
                            fecha_de_visita_institucion,
                            tipo_de_institucion_educativa,
                            nombre_institucion_educativa,
                            nit,
                            direccion_institucion,
                            nombre_del_rector,
                            n_de_cedula_de_ciudadania,
                            n_de_estudiantes_en_la_institucion,
                            institucion_construida_lugar_seguro_101,
                            institcion_paredes_techos_no_tienen_huecos_ni_grietas_102,
                            uso_de_combustible_en_el_comedor_escolar_103,
                            comedor_escolar_esta_separado_de_los_banos_y_salones_104,
                            institucion_cuenta_con_iluminacion_ventilacion_105,
                            cuenta_con_agua_tratada_201,
                            inst_agua_consumir_recipientes_tapados_elevados_piso_202,
                            recipientes_para_almacenar_el_agua_estan_limpios_203,
                            estado_del_almacenamiento_del_agua_204,
                            institucion_cuenta_con_servicios_de_bano_301,
                            banos_estan_limpios_303,
                            aguas_residuales_drenan_por_canales_o_tuberias_305,
                            recipientes_residuos_ubicados_recipiente_tapa_401,
                            institucion_esta_aseada_402,
                            institucion_separa_los_residuos_403,
                            basureros_cerca_de_la_institucion_404,
                            presencia_de_plagas_en_la_institucion__roedores_insectos_501,
                            institucion_realiza_jornada_para_recoger_inservibles_502,
                            productos_quimicos_utilizados_bien_almacenados_rotulados_504,
                            alimentos_del_comedor_estan_bien_manipulados_601,
                            cocina_del_comedor_esta_limpia_602,
                            espacios_dialogo_normas_convivencia_conflictos_inst_701,
                            actividades_comunitarias_proyecto_escuelas_saludables_702
              FROM ivc_entorno WHERE id=?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result(
            $nombres_tecnico_de_saneamiento,
            $municipio,
            $mes_actividades_a_reportar,
            $formato_caracterizacion_a_reportar,
            $fecha_de_la_visita_vivienda,
            $tipo_de_vivienda,
            $nombre_cabeza_de_hogar,
            $n_habitantes_por_vivienda,
            $direccion_vivienda,
            $telefono,
            $viviendo_construida_lugar_seguro_101,
            $vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102,
            $uso_de_combustible_103,
            $cocina_separada_los_banos_y_habitaciones_104,
            $cuenta_iluminacion_ventilacion_105,
            $cuenta_agua_tratada_201,
            $vivie_agua_consumir_recipientes_tapados_elevados_piso_202,
            $los_recipientes_almacenar_agua_limpio_203,
            $estado_almacenamiento_agua_204,
            $vivienda_cuenta_servicios_bano_301,
            $cuenta_con_letrina_302,
            $banos_estan_limpio_303,
            $aguas_residuales_drenan_canales_tuberias_305,
            $recipientes_adecuadamente_ubicados_con_tapa_401,
            $vivienda_esta_aseada_402,
            $separan_los_residuo_403,
            $basureros_cerca_de_la_vivienda_404,
            $presencia_plagas_en_vivienda_501,
            $vivienda_realiza_jornada_recojer_inservibles_502,
            $vivienda_construida_materiales_impiden_entrada_plagas_503,
            $productos_quimicos_almacenados_rotulados_504,
            $cocina_esta_limpia_602,
            $espacios_dialogo_normas_convivencia_conflictos_vivien_701,
            $actividades_comunitarias_proyecto_viviendas_saludables_702,
            $utilizan_plan_economia_familiar_703,
            $fecha_de_visita_institucion,
            $tipo_de_institucion_educativa,
            $nombre_institucion_educativa,
            $nit,
            $direccion_institucion,
            $nombre_del_rector,
            $n_de_cedula_de_ciudadania,
            $n_de_estudiantes_en_la_institucion,
            $institucion_construida_lugar_seguro_101,
            $institcion_paredes_techos_no_tienen_huecos_ni_grietas_102,
            $uso_de_combustible_en_el_comedor_escolar_103,
            $comedor_escolar_esta_separado_de_los_banos_y_salones_104,
            $institucion_cuenta_con_iluminacion_ventilacion_105,
            $cuenta_con_agua_tratada_201,
            $inst_agua_consumir_recipientes_tapados_elevados_piso_202,
            $recipientes_para_almacenar_el_agua_estan_limpios_203,
            $estado_del_almacenamiento_del_agua_204,
            $institucion_cuenta_con_servicios_de_bano_301,
            $banos_estan_limpios_303,
            $aguas_residuales_drenan_por_canales_o_tuberias_305,
            $recipientes_residuos_ubicados_recipiente_tapa_401,
            $institucion_esta_aseada_402,
            $institucion_separa_los_residuos_403,
            $basureros_cerca_de_la_institucion_404,
            $presencia_de_plagas_en_la_institucion__roedores_insectos_501,
            $institucion_realiza_jornada_para_recoger_inservibles_502,
            $productos_quimicos_utilizados_bien_almacenados_rotulados_504,
            $alimentos_del_comedor_estan_bien_manipulados_601,
            $cocina_del_comedor_esta_limpia_602,
            $espacios_dialogo_normas_convivencia_conflictos_inst_701,
            $actividades_comunitarias_proyecto_escuelas_saludables_702
        );

        if ($stmt->fetch()) {
            echo '<form action="update_entorno.php" method="post">';
            echo '<table>';
    
                echo '<tr>';
                    echo '<td><label for="id">Item:</label></td>';
                    echo '<td><input type="number" id="id" name="id" value="' . htmlspecialchars($id) . '" maxlength="30" readonly></td>';
                echo '</tr>';
    
                // <!-------------------------------------VIVIENDA------------------------------------->
    
                echo '<tr>';
                    echo '<td><label for="nombres_tecnico_de_saneamiento">Nombre del tecnico:</label></td>';
                    echo '<td colspan="2"><input type="text" id="nombres_tecnico_de_saneamiento"
                            name="nombres_tecnico_de_saneamiento" value="' . htmlspecialchars($nombres_tecnico_de_saneamiento) . '" maxlength="100"></td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="municipio">Municipio asginado:</label></td>';
                    echo '<td colspan="2"><input type="text" id="municipio"
                            name="municipio" value="' . htmlspecialchars($municipio) . '" maxlength="100">';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="mes_actividades_a_reportar">Mes de actividades a reportar:</label></td>';
                    echo '<td colspan="2"><input type="text" id="mes_actividades_a_reportar"
                            name="mes_actividades_a_reportar" value="' . htmlspecialchars($mes_actividades_a_reportar) . '" maxlength="100">';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="formato_caracterizacion_a_reportar">Tipo de formato de caracterización a
                            reportar:</label></td>';
                    echo '<td colspan="2"><input type="text" id="formato_caracterizacion_a_reportar"
                            name="formato_caracterizacion_a_reportar" value="' . htmlspecialchars($formato_caracterizacion_a_reportar) . '" maxlength="100"';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="fecha_de_la_visita_vivienda">fecha de la visita vivienda:</label></td>';
                    echo '<td colspan="2"><input type="date" id="fecha_de_la_visita_vivienda" name="fecha_de_la_visita_vivienda" value="' . htmlspecialchars($fecha_de_la_visita_vivienda) . '"
                            required>';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="tipo_de_vivienda">Tipo de vivienda:</label></td>';
                    echo '<td colspan="2"><input type="text" id="tipo_de_vivienda"
                            name="tipo_de_vivienda" value="' . htmlspecialchars($tipo_de_vivienda) . '" maxlength="100"';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="nombre_cabeza_de_hogar">Nombre de cabeza de hogar:</label></td>';
                    echo '<td colspan="2"><input type="text" id="nombre_cabeza_de_hogar" name="nombre_cabeza_de_hogar" value="' . htmlspecialchars($nombre_cabeza_de_hogar) . '"
                            maxlength="100"></td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="n_habitantes_por_vivienda">Numero de habitantes por vivienda:</label></td>';
                    echo '<td><input type="number" id="n_habitantes_por_vivienda" name="n_habitantes_por_vivienda" value="' . htmlspecialchars($n_habitantes_por_vivienda) . '" maxlength="30">';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="direccion_vivienda">Direccion de la vivienda:</label></td>';
                    echo '<td colspan="2"><input type="text" id="direccion_vivienda" name="direccion_vivienda" value="' . htmlspecialchars($direccion_vivienda) . '" maxlength="100">';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="telefono">Telefono:</label></td>';
                    echo '<td colspan="2"><input type="number" id="telefono" name="telefono" value="' . htmlspecialchars($telefono) . '" maxlength="30">';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                echo '<td><label for="viviendo_construida_lugar_seguro_101">Esta vivienda está construida en un lugar seguro</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="viviendo_construida_lugar_seguro_101" name="viviendo_construida_lugar_seguro_101" value="' . htmlspecialchars($viviendo_construida_lugar_seguro_101) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102">Las paredes no tienen ni huecos ni grietas</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102" name="vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102" value="' . htmlspecialchars($vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="uso_de_combustible_103">Uso de combustible</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="uso_de_combustible_103" name="uso_de_combustible_103" value="' . htmlspecialchars($uso_de_combustible_103) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="cocina_separada_los_banos_y_habitaciones_104">La cocina está separada de los baños y las habitaciones</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="cocina_separada_los_banos_y_habitaciones_104" name="cocina_separada_los_banos_y_habitaciones_104" value="' . htmlspecialchars($cocina_separada_los_banos_y_habitaciones_104) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="cuenta_iluminacion_ventilacion_105">Cuentan con iluminación y ventilación</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="cuenta_iluminacion_ventilacion_105" name="cuenta_iluminacion_ventilacion_105" value="' . htmlspecialchars($cuenta_iluminacion_ventilacion_105) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="cuenta_agua_tratada_201">Cuentan con agua tratada</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="cuenta_agua_tratada_201" name="cuenta_agua_tratada_201" value="' . htmlspecialchars($cuenta_agua_tratada_201) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="vivie_agua_consumir_recipientes_tapados_elevados_piso_202">El agua para beber y consumir las almacenan en recipientes tapados y elevados del piso</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="vivie_agua_consumir_recipientes_tapados_elevados_piso_202" name="vivie_agua_consumir_recipientes_tapados_elevados_piso_202" value="' . htmlspecialchars($vivie_agua_consumir_recipientes_tapados_elevados_piso_202) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="los_recipientes_almacenar_agua_limpio_203">Los recipientes para almacenar el agua están limpios</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="los_recipientes_almacenar_agua_limpio_203" name="los_recipientes_almacenar_agua_limpio_203" value="' . htmlspecialchars($los_recipientes_almacenar_agua_limpio_203) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="estado_almacenamiento_agua_204">Estado del almacenamiento del agua</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="estado_almacenamiento_agua_204" name="estado_almacenamiento_agua_204" value="' . htmlspecialchars($estado_almacenamiento_agua_204) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="vivienda_cuenta_servicios_bano_301">La vivienda cuenta con servicios de baño</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="vivienda_cuenta_servicios_bano_301" name="vivienda_cuenta_servicios_bano_301" value="' . htmlspecialchars($vivienda_cuenta_servicios_bano_301) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="cuenta_con_letrina_302">Cuenta con letrina</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="cuenta_con_letrina_302" name="cuenta_con_letrina_302" value="' . htmlspecialchars($cuenta_con_letrina_302) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="banos_estan_limpio_303">Los baños están limpios</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="banos_estan_limpio_303" name="banos_estan_limpio_303" value="' . htmlspecialchars($banos_estan_limpio_303) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="aguas_residuales_drenan_canales_tuberias_305">Las aguas residuales drenan por los canales o tuberías</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="aguas_residuales_drenan_canales_tuberias_305" name="aguas_residuales_drenan_canales_tuberias_305" value="' . htmlspecialchars($aguas_residuales_drenan_canales_tuberias_305) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="recipientes_adecuadamente_ubicados_con_tapa_401">Los recipientes que almacenan residuos sólidos están adecuadamente ubicados y en un recipiente con tapa</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="recipientes_adecuadamente_ubicados_con_tapa_401" name="recipientes_adecuadamente_ubicados_con_tapa_401" value="' . htmlspecialchars($recipientes_adecuadamente_ubicados_con_tapa_401) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="vivienda_esta_aseada_402">La vivienda está aseada</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="vivienda_esta_aseada_402" name="vivienda_esta_aseada_402" value="' . htmlspecialchars($vivienda_esta_aseada_402) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="separan_los_residuo_403">Separación de residuos</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="separan_los_residuo_403" name="separan_los_residuo_403" value="' . htmlspecialchars($separan_los_residuo_403) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="basureros_cerca_de_la_vivienda_404">Basureros cerca de la vivienda</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="basureros_cerca_de_la_vivienda_404" name="basureros_cerca_de_la_vivienda_404" value="' . htmlspecialchars($basureros_cerca_de_la_vivienda_404) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="presencia_plagas_en_vivienda_501">Presencia de plagas en viviendas (como roedores o insectos)</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="presencia_plagas_en_vivienda_501" name="presencia_plagas_en_vivienda_501" value="' . htmlspecialchars($presencia_plagas_en_vivienda_501) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="vivienda_realiza_jornada_recojer_inservibles_502">La vivienda realiza jornada para recoger inservibles</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="vivienda_realiza_jornada_recojer_inservibles_502" name="vivienda_realiza_jornada_recojer_inservibles_502" value="' . htmlspecialchars($vivienda_realiza_jornada_recojer_inservibles_502) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="vivienda_construida_materiales_impiden_entrada_plagas_503">La vivienda está construida en materiales que impiden la entrada de plagas</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="vivienda_construida_materiales_impiden_entrada_plagas_503" name="vivienda_construida_materiales_impiden_entrada_plagas_503" value="' . htmlspecialchars($vivienda_construida_materiales_impiden_entrada_plagas_503) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="productos_quimicos_almacenados_rotulados_504">Los productos químicos utilizados están bien almacenados y rotulados</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="productos_quimicos_almacenados_rotulados_504" name="productos_quimicos_almacenados_rotulados_504" value="' . htmlspecialchars($productos_quimicos_almacenados_rotulados_504) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="cocina_esta_limpia_602">La cocina está limpia</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="cocina_esta_limpia_602" name="cocina_esta_limpia_602" value="' . htmlspecialchars($cocina_esta_limpia_602) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="espacios_dialogo_normas_convivencia_conflictos_vivien_701">Al interior se generan espacios de diálogo y se aplican normas de convivencia y resolución de conflictos</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="espacios_dialogo_normas_convivencia_conflictos_vivien_701" name="espacios_dialogo_normas_convivencia_conflictos_vivien_701" value="' . htmlspecialchars($espacios_dialogo_normas_convivencia_conflictos_vivien_701) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="actividades_comunitarias_proyecto_viviendas_saludables_702">Participan en actividades comunitarias establecidas en el proyecto de viviendas saludables</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="actividades_comunitarias_proyecto_viviendas_saludables_702" name="actividades_comunitarias_proyecto_viviendas_saludables_702" value="' . htmlspecialchars($actividades_comunitarias_proyecto_viviendas_saludables_702) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="utilizan_plan_economia_familiar_703">Utilizan plan de economía familiar</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="utilizan_plan_economia_familiar_703" name="utilizan_plan_economia_familiar_703" value="' . htmlspecialchars($utilizan_plan_economia_familiar_703) . '">';
                echo '</td>';
                echo '</tr>';
                
                
                // <!-------------------------------------INSTITUCION EDUCATIVA------------------------------------->
    
                echo '<tr>';
                    echo '<td><label for="fecha_de_visita_institucion">Fecha de la visita Institucion:</label></td>';
                    echo '<td colspan="2"><input type="date" id="fecha_de_visita_institucion" name="fecha_de_visita_institucion" value="' . htmlspecialchars($fecha_de_visita_institucion) . '"
                            required>';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="tipo_de_institucion_educativa">Tipo de institucion educativa:</label></td>';
                    echo '<td colspan="2"><input type="text" id="tipo_de_institucion_educativa" name="tipo_de_institucion_educativa" value="' . htmlspecialchars($tipo_de_institucion_educativa) . '"
                            maxlength="100">';
                    echo '</td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="nombre_institucion_educativa">Nombre de la institucion educativa:</label></td>';
                    echo '<td colspan="2"><input type="text" id="nombre_institucion_educativa" name="nombre_institucion_educativa" value="' . htmlspecialchars($nombre_institucion_educativa) . '"
                            maxlength="100"></td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="nit">NIT:</label></td>';
                    echo '<td><input type="number" id="nit" name="nit" value="' . htmlspecialchars($nit) . '" maxlength="30"></td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="direccion_institucion">Direccion de la institucion:</label></td>';
                    echo '<td colspan="2"><input type="text" id="direccion_institucion" name="direccion_institucion" value="' . htmlspecialchars($direccion_institucion) . '"
                            maxlength="100"></td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="nombre_del_rector">Nombre del rector:</label></td>';
                    echo '<td colspan="2"><input type="text" id="nombre_del_rector" name="nombre_del_rector" value="' . htmlspecialchars($nombre_del_rector) . '" maxlength="100"></td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="n_de_cedula_de_ciudadania">N° de cedula de ciudadania:</label></td>';
                    echo '<td colspan="2"><input type="number" id="n_de_cedula_de_ciudadania" name="n_de_cedula_de_ciudadania" value="' . htmlspecialchars($n_de_cedula_de_ciudadania) . '"
                            maxlength="30"></td>';
                echo '</tr>';
    
                echo '<tr>';
                    echo '<td><label for="n_de_estudiantes_en_la_institucion">N° de estudiantes en la institucion:</label></td>';
                    echo '<td colspan="2"><input type="number" id="n_de_estudiantes_en_la_institucion" value="' . htmlspecialchars($n_de_estudiantes_en_la_institucion) . '"
                            name="n_de_estudiantes_en_la_institucion" maxlength="30"></td>';
                echo '</tr>';
    
                echo '<tr>';
                echo '<td><label for="institucion_construida_lugar_seguro_101">La institución educativa está en un lugar seguro</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="institucion_construida_lugar_seguro_101" name="institucion_construida_lugar_seguro_101" value="' . htmlspecialchars($institucion_construida_lugar_seguro_101) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="institcion_paredes_techos_no_tienen_huecos_ni_grietas_102">Las paredes y techos no tienen huecos ni grietas</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="institcion_paredes_techos_no_tienen_huecos_ni_grietas_102" name="institcion_paredes_techos_no_tienen_huecos_ni_grietas_102" value="' . htmlspecialchars($institcion_paredes_techos_no_tienen_huecos_ni_grietas_102) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="uso_de_combustible_en_el_comedor_escolar_103">Uso de combustible en el comedor escolar</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="uso_de_combustible_en_el_comedor_escolar_103" name="uso_de_combustible_en_el_comedor_escolar_103" value="' . htmlspecialchars($uso_de_combustible_en_el_comedor_escolar_103) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="comedor_escolar_esta_separado_de_los_banos_y_salones_104">El comedor escolar está separado de los baños y salones</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="comedor_escolar_esta_separado_de_los_banos_y_salones_104" name="comedor_escolar_esta_separado_de_los_banos_y_salones_104" value="' . htmlspecialchars($comedor_escolar_esta_separado_de_los_banos_y_salones_104) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="institucion_cuenta_con_iluminacion_ventilacion_105">La institución cuenta con iluminación y ventilación</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="institucion_cuenta_con_iluminacion_ventilacion_105" name="institucion_cuenta_con_iluminacion_ventilacion_105" value="' . htmlspecialchars($institucion_cuenta_con_iluminacion_ventilacion_105) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="cuenta_con_agua_tratada_201">Cuenta con agua tratada</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="cuenta_con_agua_tratada_201" name="cuenta_con_agua_tratada_201" value="' . htmlspecialchars($cuenta_con_agua_tratada_201) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="inst_agua_consumir_recipientes_tapados_elevados_piso_202">El agua para beber y consumir las almacenan en recipientes tapados y elevados del piso</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="inst_agua_consumir_recipientes_tapados_elevados_piso_202" name="inst_agua_consumir_recipientes_tapados_elevados_piso_202" value="' . htmlspecialchars($inst_agua_consumir_recipientes_tapados_elevados_piso_202) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="recipientes_para_almacenar_el_agua_estan_limpios_203">Los recipientes para almacenar el agua están limpios</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="recipientes_para_almacenar_el_agua_estan_limpios_203" name="recipientes_para_almacenar_el_agua_estan_limpios_203" value="' . htmlspecialchars($recipientes_para_almacenar_el_agua_estan_limpios_203) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="estado_del_almacenamiento_del_agua_204">Estado del almacenamiento del agua</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="estado_del_almacenamiento_del_agua_204" name="estado_del_almacenamiento_del_agua_204" value="' . htmlspecialchars($estado_del_almacenamiento_del_agua_204) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="institucion_cuenta_con_servicios_de_bano_301">La institución cuenta con servicios de baño</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="institucion_cuenta_con_servicios_de_bano_301" name="institucion_cuenta_con_servicios_de_bano_301" value="' . htmlspecialchars($institucion_cuenta_con_servicios_de_bano_301) . '">';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="banos_estan_limpios_303">Los baños están limpios</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="banos_estan_limpios_303" name="banos_estan_limpios_303" value="' . htmlspecialchars($banos_estan_limpios_303) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="aguas_residuales_drenan_por_canales_o_tuberias_305">Las aguas residuales drenan por canales o tuberías</label></td>';
                echo '<td colspan="2"><input type="text" id="aguas_residuales_drenan_por_canales_o_tuberias_305" name="aguas_residuales_drenan_por_canales_o_tuberias_305" value="' . htmlspecialchars($aguas_residuales_drenan_por_canales_o_tuberias_305) . '"';
                echo '</td>';
                echo '</tr>';
                    
                echo '<tr>';
                echo '<td><label for="recipientes_residuos_ubicados_recipiente_tapa_401">Los recipientes que almacenan residuos sólidos están adecuadamente ubicados y en un recipiente con tapa</label></td>';
                echo '<td colspan="2"><input type="text" id="recipientes_residuos_ubicados_recipiente_tapa_401" name="recipientes_residuos_ubicados_recipiente_tapa_401" value="' . htmlspecialchars($recipientes_residuos_ubicados_recipiente_tapa_401) . '"';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><label for="institucion_esta_aseada_402">La institución está aseada</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="institucion_esta_aseada_402" name="institucion_esta_aseada_402" value="' . htmlspecialchars($institucion_esta_aseada_402) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="institucion_separa_los_residuos_403">La institución separa los residuos</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="institucion_separa_los_residuos_403" name="institucion_separa_los_residuos_403" value="' . htmlspecialchars($institucion_separa_los_residuos_403) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="basureros_cerca_de_la_institucion_404">Hay basureros cerca de la institución</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="basureros_cerca_de_la_institucion_404" name="basureros_cerca_de_la_institucion_404" value="' . htmlspecialchars($basureros_cerca_de_la_institucion_404) . '">';
                echo '</td>';
                echo '</tr>';                               
    
                echo '<tr>';
                echo '<td><label for="presencia_de_plagas_en_la_institucion__roedores_insectos_501">Hay presencia de plagas en la institución (roedores, insectos)</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="presencia_de_plagas_en_la_institucion__roedores_insectos_501" name="presencia_de_plagas_en_la_institucion__roedores_insectos_501" value="' . htmlspecialchars($presencia_de_plagas_en_la_institucion__roedores_insectos_501) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="institucion_realiza_jornada_para_recoger_inservibles_502">La institución realiza jornada para recoger inservibles</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="institucion_realiza_jornada_para_recoger_inservibles_502" name="institucion_realiza_jornada_para_recoger_inservibles_502" value="' . htmlspecialchars($institucion_realiza_jornada_para_recoger_inservibles_502) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="productos_quimicos_utilizados_bien_almacenados_rotulados_504">Los productos químicos utilizados están bien almacenados y rotulados</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="productos_quimicos_utilizados_bien_almacenados_rotulados_504" name="productos_quimicos_utilizados_bien_almacenados_rotulados_504" value="' . htmlspecialchars($productos_quimicos_utilizados_bien_almacenados_rotulados_504) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="alimentos_del_comedor_estan_bien_manipulados_601">Los alimentos del comedor están bien manipulados</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="alimentos_del_comedor_estan_bien_manipulados_601" name="alimentos_del_comedor_estan_bien_manipulados_601" value="' . htmlspecialchars($alimentos_del_comedor_estan_bien_manipulados_601) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="cocina_del_comedor_esta_limpia_602">La cocina del comedor está limpia</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="cocina_del_comedor_esta_limpia_602" name="cocina_del_comedor_esta_limpia_602" value="' . htmlspecialchars($cocina_del_comedor_esta_limpia_602) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="espacios_dialogo_normas_convivencia_conflictos_inst_701">Al interior de la institución se generan espacios de diálogo y se aplican normas de convivencia y resolución de conflictos</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="espacios_dialogo_normas_convivencia_conflictos_inst_701" name="espacios_dialogo_normas_convivencia_conflictos_inst_701" value="' . htmlspecialchars($espacios_dialogo_normas_convivencia_conflictos_inst_701) . '">';
                echo '</td>';
                echo '</tr>';                
                
                echo '<tr>';
                echo '<td><label for="actividades_comunitarias_proyecto_escuelas_saludables_702">La institución participa en actividades comunitarias establecidas en el proyecto de escuelas saludables</label></td>';
                echo '<td colspan="2">';
                echo '<input type="text" id="actividades_comunitarias_proyecto_escuelas_saludables_702" name="actividades_comunitarias_proyecto_escuelas_saludables_702" value="' . htmlspecialchars($actividades_comunitarias_proyecto_escuelas_saludables_702) . '">';
                echo '</td>';
                echo '</tr>';                                

            echo "<tr><td colspan='2'><input type='submit' name='update' value='Actualizar'></td></tr>";

            echo "</form>";
            echo "</table>";
        }
        $stmt->close();
    }
}

// Mostrar lista de registros para seleccionar y editar
$query = "SELECT * FROM ivc_entorno";

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result(
        $id, 
        $nombres_tecnico_de_saneamiento,
        $municipio,
        $mes_actividades_a_reportar,
        $formato_caracterizacion_a_reportar,
        $fecha_de_la_visita_vivienda,
        $tipo_de_vivienda,
        $nombre_cabeza_de_hogar,
        $n_habitantes_por_vivienda,
        $direccion_vivienda,
        $telefono,
        $viviendo_construida_lugar_seguro_101,
        $vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102,
        $uso_de_combustible_103,
        $cocina_separada_los_banos_y_habitaciones_104,
        $cuenta_iluminacion_ventilacion_105,
        $cuenta_agua_tratada_201,
        $vivie_agua_consumir_recipientes_tapados_elevados_piso_202,
        $los_recipientes_almacenar_agua_limpio_203,
        $estado_almacenamiento_agua_204,
        $vivienda_cuenta_servicios_bano_301,
        $cuenta_con_letrina_302,
        $banos_estan_limpio_303,
        $aguas_residuales_drenan_canales_tuberias_305,
        $recipientes_adecuadamente_ubicados_con_tapa_401,
        $vivienda_esta_aseada_402,
        $separan_los_residuo_403,
        $basureros_cerca_de_la_vivienda_404,
        $presencia_plagas_en_vivienda_501,
        $vivienda_realiza_jornada_recojer_inservibles_502,
        $vivienda_construida_materiales_impiden_entrada_plagas_503,
        $productos_quimicos_almacenados_rotulados_504,
        $cocina_esta_limpia_602,
        $espacios_dialogo_normas_convivencia_conflictos_vivien_701,
        $actividades_comunitarias_proyecto_viviendas_saludables_702,
        $utilizan_plan_economia_familiar_703,
        $fecha_de_visita_institucion,
        $tipo_de_institucion_educativa,
        $nombre_institucion_educativa,
        $nit,
        $direccion_institucion,
        $nombre_del_rector,
        $n_de_cedula_de_ciudadania,
        $n_de_estudiantes_en_la_institucion,
        $institucion_construida_lugar_seguro_101,
        $institcion_paredes_techos_no_tienen_huecos_ni_grietas_102,
        $uso_de_combustible_en_el_comedor_escolar_103,
        $comedor_escolar_esta_separado_de_los_banos_y_salones_104,
        $institucion_cuenta_con_iluminacion_ventilacion_105,
        $cuenta_con_agua_tratada_201,
        $inst_agua_consumir_recipientes_tapados_elevados_piso_202,
        $recipientes_para_almacenar_el_agua_estan_limpios_203,
        $estado_del_almacenamiento_del_agua_204,
        $institucion_cuenta_con_servicios_de_bano_301,
        $banos_estan_limpios_303,
        $aguas_residuales_drenan_por_canales_o_tuberias_305,
        $recipientes_residuos_ubicados_recipiente_tapa_401,
        $institucion_esta_aseada_402,
        $institucion_separa_los_residuos_403,
        $basureros_cerca_de_la_institucion_404,
        $presencia_de_plagas_en_la_institucion__roedores_insectos_501,
        $institucion_realiza_jornada_para_recoger_inservibles_502,
        $productos_quimicos_utilizados_bien_almacenados_rotulados_504,
        $alimentos_del_comedor_estan_bien_manipulados_601,
        $cocina_del_comedor_esta_limpia_602,
        $espacios_dialogo_normas_convivencia_conflictos_inst_701,
        $actividades_comunitarias_proyecto_escuelas_saludables_702
    );
    
    echo "<h2>Selecciona un registro para editar:</h2>";
    echo "<table border='1' height='500px'>";
    echo "<tr>
                <th>Accion</th>
                <th>ID</th>
                <th>Nombres Técnico de Saneamiento</th>
                <th>Municipio</th>
                <th>Mes Actividades a Reportar</th>
                <th>Formato Caracterización a Reportar</th>
                <th>Fecha de la Visita Vivienda</th>
                <th>Tipo de Vivienda</th>
                <th>Nombre Cabeza de Hogar</th>
                <th>N Habitantes por Vivienda</th>
                <th>Dirección Vivienda</th>
                <th>Teléfono</th>
                <th>Viviendo Construida Lugar Seguro 101</th>
                <th>Vivienda Paredes Techos No Tienen Huecos Ni Grietas 102</th>
                <th>Uso de Combustible 103</th>
                <th>Cocina Separada los Baños y Habitaciones 104</th>
                <th>Cuenta Iluminación Ventilación 105</th>
                <th>Cuenta Agua Tratada 201</th>
                <th>Vivienda Agua Consumir Recipientes Tapados Elevados Piso 202</th>
                <th>Los Recipientes Almacenar Agua Limpio 203</th>
                <th>Estado Almacenamiento Agua 204</th>
                <th>Vivienda Cuenta Servicios Baño 301</th>
                <th>Cuenta con Letrina 302</th>
                <th>Baños Están Limpio 303</th>
                <th>Aguas Residuales Drenan Canales Tuberías 305</th>
                <th>Recipientes Adecuadamente Ubicados con Tapa 401</th>
                <th>Vivienda Está Aseada 402</th>
                <th>Separan los Residuo 403</th>
                <th>Basureros Cerca de la Vivienda 404</th>
                <th>Presencia Plagas en Vivienda 501</th>
                <th>Vivienda Realiza Jornada Recoger Inservibles 502</th>
                <th>Vivienda Construida Materiales Impiden Entrada Plagas 503</th>
                <th>Productos Químicos Almacenados Rotulados 504</th>
                <th>Cocina Está Limpia 602</th>
                <th>Espacios Diálogo Normas Convivencia Conflictos Vivien 701</th>
                <th>Actividades Comunitarias Proyecto Viviendas Saludables 702</th>
                <th>Utilizan Plan Economía Familiar 703</th>
                <th>Fecha de Visita Institucion</th>
                <th>Tipo de Institucion Educativa</th>
                <th>Nombre Institucion Educativa</th>
                <th>NIT</th>
                <th>Direccion Institucion</th>
                <th>Nombre del Rector</th>
                <th>N de Cedula de Ciudadania</th>
                <th>N de Estudiantes en la Institucion</th>
                <th>Institucion Construida Lugar Seguro 101</th>
                <th>Institcion Paredes Techos No Tienen Huecos Ni Grietas 102</th>
                <th>Uso de Combustible en el Comedor Escolar 103</th>
                <th>Comedor Escolar Esta Separado de los Banos y Salones 104</th>
                <th>Institucion Cuenta con Iluminacion Ventilacion 105</th>
                <th>Cuenta con Agua Tratada 201</th>
                <th>Inst Agua Consumir Recipientes Tapados Elevados Piso 202</th>
                <th>Recipientes para Almacenar el Agua Estan Limpios 203</th>
                <th>Estado del Almacenamiento del Agua 204</th>
                <th>Institucion Cuenta con Servicios de Bano 301</th>
                <th>Banos Estan Limpios 303</th>
                <th>Aguas Residuales Drenan por Canales o Tuberias 305</th>
                <th>Recipientes Residuos Ubicados Recipiente Tapa 401</th>
                <th>Institucion Esta Aseada 402</th>
                <th>Institucion Separa los Residuos 403</th>
                <th>Basureros Cerca de la Institucion 404</th>
                <th>Presencia de Plagas en la Institucion (Roedores, Insectos) 501</th>
                <th>Institucion Realiza Jornada para Recoger Inservibles 502</th>
                <th>Productos Quimicos Utilizados Bien Almacenados Rotulados 504</th>
                <th>Alimentos del Comedor Estan Bien Manipulados 601</th>
                <th>Cocina del Comedor Esta Limpia 602</th>
                <th>Espacios Dialogo Normas Convivencia Conflictos Inst 701</th>
                <th>Actividades Comunitarias Proyecto Escuelas Saludables 702</th>

          </tr>";

    while ($stmt->fetch()) {

        echo "<tr>";
        echo "<td>";

        echo "<form action='update_entorno.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='submit' value='Editar'>";

        echo "</form>";
        echo "</td>";

        echo "<td>$id</td>
                <td>$nombres_tecnico_de_saneamiento</td>
                <td>$municipio</td>
                <td>$mes_actividades_a_reportar</td>
                <td>$formato_caracterizacion_a_reportar</td>
                <td>$fecha_de_la_visita_vivienda</td>
                <td>$tipo_de_vivienda</td>
                <td>$nombre_cabeza_de_hogar</td>
                <td>$n_habitantes_por_vivienda</td>
                <td>$direccion_vivienda</td>
                <td>$telefono</td>
                <td>$viviendo_construida_lugar_seguro_101</td>
                <td>$vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102</td>
                <td>$uso_de_combustible_103</td>
                <td>$cocina_separada_los_banos_y_habitaciones_104</td>
                <td>$cuenta_iluminacion_ventilacion_105</td>
                <td>$cuenta_agua_tratada_201</td>
                <td>$vivie_agua_consumir_recipientes_tapados_elevados_piso_202</td>
                <td>$los_recipientes_almacenar_agua_limpio_203</td>
                <td>$estado_almacenamiento_agua_204</td>
                <td>$vivienda_cuenta_servicios_bano_301</td>
                <td>$cuenta_con_letrina_302</td>
                <td>$banos_estan_limpio_303</td>
                <td>$aguas_residuales_drenan_canales_tuberias_305</td>
                <td>$recipientes_adecuadamente_ubicados_con_tapa_401</td>
                <td>$vivienda_esta_aseada_402</td>
                <td>$separan_los_residuo_403</td>
                <td>$basureros_cerca_de_la_vivienda_404</td>
                <td>$presencia_plagas_en_vivienda_501</td>
                <td>$vivienda_realiza_jornada_recojer_inservibles_502</td>
                <td>$vivienda_construida_materiales_impiden_entrada_plagas_503</td>
                <td>$productos_quimicos_almacenados_rotulados_504</td>
                <td>$cocina_esta_limpia_602</td>
                <td>$espacios_dialogo_normas_convivencia_conflictos_vivien_701</td>
                <td>$actividades_comunitarias_proyecto_viviendas_saludables_702</td>
                <td>$utilizan_plan_economia_familiar_703</td>
                <td>$fecha_de_visita_institucion</td>
                <td>$tipo_de_institucion_educativa</td>
                <td>$nombre_institucion_educativa</td>
                <td>$nit</td>
                <td>$direccion_institucion</td>
                <td>$nombre_del_rector</td>
                <td>$n_de_cedula_de_ciudadania</td>
                <td>$n_de_estudiantes_en_la_institucion</td>
                <td>$institucion_construida_lugar_seguro_101</td>
                <td>$institcion_paredes_techos_no_tienen_huecos_ni_grietas_102</td>
                <td>$uso_de_combustible_en_el_comedor_escolar_103</td>
                <td>$comedor_escolar_esta_separado_de_los_banos_y_salones_104</td>
                <td>$institucion_cuenta_con_iluminacion_ventilacion_105</td>
                <td>$cuenta_con_agua_tratada_201</td>
                <td>$inst_agua_consumir_recipientes_tapados_elevados_piso_202</td>
                <td>$recipientes_para_almacenar_el_agua_estan_limpios_203</td>
                <td>$estado_del_almacenamiento_del_agua_204</td>
                <td>$institucion_cuenta_con_servicios_de_bano_301</td>
                <td>$banos_estan_limpios_303</td>
                <td>$aguas_residuales_drenan_por_canales_o_tuberias_305</td>
                <td>$recipientes_residuos_ubicados_recipiente_tapa_401</td>
                <td>$institucion_esta_aseada_402</td>
                <td>$institucion_separa_los_residuos_403</td>
                <td>$basureros_cerca_de_la_institucion_404</td>
                <td>$presencia_de_plagas_en_la_institucion__roedores_insectos_501</td>
                <td>$institucion_realiza_jornada_para_recoger_inservibles_502</td>
                <td>$productos_quimicos_utilizados_bien_almacenados_rotulados_504</td>
                <td>$alimentos_del_comedor_estan_bien_manipulados_601</td>
                <td>$cocina_del_comedor_esta_limpia_602</td>
                <td>$espacios_dialogo_normas_convivencia_conflictos_inst_701</td>
                <td>$actividades_comunitarias_proyecto_escuelas_saludables_702</td>";

        echo "</tr>";
        
    }
    echo "</table>";
    $stmt->close();
}

$con->close();

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario</title>
<style>
/* CSS */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
input[type="date"],
textarea,
select,
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

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
            right: 150px;
        }
    </style>
</head>
<a href="../amb_1_index/Inicio_entorno_saludable.html" class="Index_button">Inicio</a>
<a href="logout_entorno_upd.php" class="logout-button">Cerrar sesión</a>
<body>

</body>
</html>

<script>
function confirmUpdate() {
    return confirm("¿Está seguro que desea cambiar estos datos?");
}
</script>


<script>
function confirmUpdate() {
    return confirm("¿Está seguro que desea cambiar estos datos?");
}
</script>