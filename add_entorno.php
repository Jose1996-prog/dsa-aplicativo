<?php

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

// Crear conexión
$con = new mysqli($host, $user, $password, $dbname, $port, $socket) 
    or die ('No se pudo conectar al servidor de base de datos: ' . mysqli_connect_error());

// Obtener datos del formulario

    $id = $_POST['id'] ?? '';
    $nombres_tecnico_de_saneamiento = $_POST['nombres_tecnico_de_saneamiento'] ?? '';
    $municipio = $_POST['municipio'] ?? '';
    $mes_actividades_a_reportar = $_POST['mes_actividades_a_reportar'] ?? '';
    $formato_caracterizacion_a_reportar = $_POST['formato_caracterizacion_a_reportar'] ?? '';
    $fecha_de_la_visita_vivienda = $_POST['fecha_de_la_visita_vivienda'] ?? '';
    $tipo_de_vivienda = $_POST['tipo_de_vivienda'] ?? '';
    $nombre_cabeza_de_hogar = $_POST['nombre_cabeza_de_hogar'] ?? '';
    $n_habitantes_por_vivienda = $_POST['n_habitantes_por_vivienda'] ?? '';
    $direccion_vivienda = $_POST['direccion_vivienda'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $viviendo_construida_lugar_seguro_101 = $_POST['viviendo_construida_lugar_seguro_101'] ?? '';
    $vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102 = $_POST['vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102'] ?? '';
    $uso_de_combustible_103 = $_POST['uso_de_combustible_103'] ?? '';
    $cocina_separada_los_banos_y_habitaciones_104 = $_POST['cocina_separada_los_banos_y_habitaciones_104'] ?? '';
    $cuenta_iluminacion_ventilacion_105 = $_POST['cuenta_iluminacion_ventilacion_105'] ?? '';
    $cuenta_agua_tratada_201 = $_POST['cuenta_agua_tratada_201'] ?? '';
    $vivie_agua_consumir_recipientes_tapados_elevados_piso_202 = $_POST['vivie_agua_consumir_recipientes_tapados_elevados_piso_202'] ?? '';
    $los_recipientes_almacenar_agua_limpio_203 = $_POST['los_recipientes_almacenar_agua_limpio_203'] ?? '';
    $estado_almacenamiento_agua_204 = $_POST['estado_almacenamiento_agua_204'] ?? '';
    $vivienda_cuenta_servicios_bano_301 = $_POST['vivienda_cuenta_servicios_bano_301'] ?? '';
    $cuenta_con_letrina_302 = $_POST['cuenta_con_letrina_302'] ?? '';
    $banos_estan_limpio_303 = $_POST['banos_estan_limpio_303'] ?? '';
    $aguas_residuales_drenan_canales_tuberias_305 = $_POST['aguas_residuales_drenan_canales_tuberias_305'] ?? '';
    $recipientes_adecuadamente_ubicados_con_tapa_401 = $_POST['recipientes_adecuadamente_ubicados_con_tapa_401'] ?? '';
    $vivienda_esta_aseada_402 = $_POST['vivienda_esta_aseada_402'] ?? '';
    $separan_los_residuo_403 = $_POST['separan_los_residuo_403'] ?? '';
    $basureros_cerca_de_la_vivienda_404 = $_POST['basureros_cerca_de_la_vivienda_404'] ?? '';
    $presencia_plagas_en_vivienda_501 = $_POST['presencia_plagas_en_vivienda_501'] ?? '';
    $vivienda_realiza_jornada_recojer_inservibles_502 = $_POST['vivienda_realiza_jornada_recojer_inservibles_502'] ?? '';
    $vivienda_construida_materiales_impiden_entrada_plagas_503 = $_POST['vivienda_construida_materiales_impiden_entrada_plagas_503'] ?? '';
    $productos_quimicos_almacenados_rotulados_504 = $_POST['productos_quimicos_almacenados_rotulados_504'] ?? '';
    $cocina_esta_limpia_602 = $_POST['cocina_esta_limpia_602'] ?? '';
    $espacios_dialogo_normas_convivencia_conflictos_vivien_701 = $_POST['espacios_dialogo_normas_convivencia_conflictos_vivien_701'] ?? '';
    $actividades_comunitarias_proyecto_viviendas_saludables_702 = $_POST['actividades_comunitarias_proyecto_viviendas_saludables_702'] ?? '';
    $utilizan_plan_economia_familiar_703 = $_POST['utilizan_plan_economia_familiar_703'] ?? '';
// -----------------------------------------------------------------------------------------------
    $fecha_de_visita_institucion = $_POST['fecha_de_visita_institucion'] ?? '';
    $tipo_de_institucion_educativa = $_POST['tipo_de_institucion_educativa'] ?? '';
    $nombre_institucion_educativa = $_POST['nombre_institucion_educativa'] ?? '';
    $nit = $_POST['nit'] ?? '';
    $direccion_institucion = $_POST['direccion_institucion'] ?? '';
    $nombre_del_rector = $_POST['nombre_del_rector'] ?? '';
    $n_de_cedula_de_ciudadania = $_POST['n_de_cedula_de_ciudadania'] ?? '';
    $n_de_estudiantes_en_la_institucion = $_POST['n_de_estudiantes_en_la_institucion'] ?? '';
    $institucion_construida_lugar_seguro_101 = $_POST['institucion_construida_lugar_seguro_101'] ?? '';
    $institcion_paredes_techos_no_tienen_huecos_ni_grietas_102 = $_POST['institcion_paredes_techos_no_tienen_huecos_ni_grietas_102'] ?? '';
    $uso_de_combustible_en_el_comedor_escolar_103 = $_POST['uso_de_combustible_en_el_comedor_escolar_103'] ?? '';
    $comedor_escolar_esta_separado_de_los_banos_y_salones_104 = $_POST['comedor_escolar_esta_separado_de_los_banos_y_salones_104'] ?? '';
    $institucion_cuenta_con_iluminacion_ventilacion_105 = $_POST['institucion_cuenta_con_iluminacion_ventilacion_105'] ?? '';
    $cuenta_con_agua_tratada_201 = $_POST['cuenta_con_agua_tratada_201'] ?? '';
    $inst_agua_consumir_recipientes_tapados_elevados_piso_202 = $_POST['inst_agua_consumir_recipientes_tapados_elevados_piso_202'] ?? '';
    $recipientes_para_almacenar_el_agua_estan_limpios_203 = $_POST['recipientes_para_almacenar_el_agua_estan_limpios_203'] ?? '';
    $estado_del_almacenamiento_del_agua_204 = $_POST['estado_del_almacenamiento_del_agua_204'] ?? '';
    $institucion_cuenta_con_servicios_de_bano_301 = $_POST['institucion_cuenta_con_servicios_de_bano_301'] ?? '';
    $banos_estan_limpios_303 = $_POST['banos_estan_limpios_303'] ?? '';
    $aguas_residuales_drenan_por_canales_o_tuberias_305 = $_POST['aguas_residuales_drenan_por_canales_o_tuberias_305'] ?? '';
    $recipientes_residuos_ubicados_recipiente_tapa_401 = $_POST['recipientes_residuos_ubicados_recipiente_tapa_401'] ?? '';
    $institucion_esta_aseada_402 = $_POST['institucion_esta_aseada_402'] ?? '';
    $institucion_separa_los_residuos_403 = $_POST['institucion_separa_los_residuos_403'] ?? '';
    $basureros_cerca_de_la_institucion_404 = $_POST['basureros_cerca_de_la_institucion_404'] ?? '';
    $presencia_de_plagas_en_la_institucion__roedores_insectos_501 = $_POST['presencia_de_plagas_en_la_institucion__roedores_insectos_501'] ?? '';
    $institucion_realiza_jornada_para_recoger_inservibles_502 = $_POST['institucion_realiza_jornada_para_recoger_inservibles_502'] ?? '';
    $productos_quimicos_utilizados_bien_almacenados_rotulados_504 = $_POST['productos_quimicos_utilizados_bien_almacenados_rotulados_504'] ?? '';
    $alimentos_del_comedor_estan_bien_manipulados_601 = $_POST['alimentos_del_comedor_estan_bien_manipulados_601'] ?? '';
    $cocina_del_comedor_esta_limpia_602 = $_POST['cocina_del_comedor_esta_limpia_602'] ?? '';
    $espacios_dialogo_normas_convivencia_conflictos_inst_701 = $_POST['espacios_dialogo_normas_convivencia_conflictos_inst_701'] ?? '';
    $actividades_comunitarias_proyecto_escuelas_saludables_702 = $_POST['actividades_comunitarias_proyecto_escuelas_saludables_702'] ?? '';

    $accion = $_POST['accion'] ?? '';

// Función para limpiar los datos de entrada
function limpiar_dato($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

    $id = limpiar_dato($id);
    $nombres_tecnico_de_saneamiento = limpiar_dato($nombres_tecnico_de_saneamiento);
    $municipio = limpiar_dato($municipio);
    $mes_actividades_a_reportar = limpiar_dato($mes_actividades_a_reportar);
    $formato_caracterizacion_a_reportar = limpiar_dato($formato_caracterizacion_a_reportar);
    $fecha_de_la_visita_vivienda = limpiar_dato($fecha_de_la_visita_vivienda);
    $tipo_de_vivienda = limpiar_dato($tipo_de_vivienda);
    $nombre_cabeza_de_hogar = limpiar_dato($nombre_cabeza_de_hogar);
    $n_habitantes_por_vivienda = limpiar_dato($n_habitantes_por_vivienda);
    $direccion_vivienda = limpiar_dato($direccion_vivienda);
    $telefono = limpiar_dato($telefono);
    $viviendo_construida_lugar_seguro_101 = limpiar_dato($viviendo_construida_lugar_seguro_101);
    $vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102 = limpiar_dato($vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102);
    $uso_de_combustible_103 = limpiar_dato($uso_de_combustible_103);
    $cocina_separada_los_banos_y_habitaciones_104 = limpiar_dato($cocina_separada_los_banos_y_habitaciones_104);
    $cuenta_iluminacion_ventilacion_105 = limpiar_dato($cuenta_iluminacion_ventilacion_105);
    $cuenta_agua_tratada_201 = limpiar_dato($cuenta_agua_tratada_201);
    $vivie_agua_consumir_recipientes_tapados_elevados_piso_202 = limpiar_dato($vivie_agua_consumir_recipientes_tapados_elevados_piso_202);
    $los_recipientes_almacenar_agua_limpio_203 = limpiar_dato($los_recipientes_almacenar_agua_limpio_203);
    $estado_almacenamiento_agua_204 = limpiar_dato($estado_almacenamiento_agua_204);
    $vivienda_cuenta_servicios_bano_301 = limpiar_dato($vivienda_cuenta_servicios_bano_301);
    $cuenta_con_letrina_302 = limpiar_dato($cuenta_con_letrina_302);
    $banos_estan_limpio_303 = limpiar_dato($banos_estan_limpio_303);
    $aguas_residuales_drenan_canales_tuberias_305 = limpiar_dato($aguas_residuales_drenan_canales_tuberias_305);
    $recipientes_adecuadamente_ubicados_con_tapa_401 = limpiar_dato($recipientes_adecuadamente_ubicados_con_tapa_401);
    $vivienda_esta_aseada_402 = limpiar_dato($vivienda_esta_aseada_402);
    $separan_los_residuo_403 = limpiar_dato($separan_los_residuo_403);
    $basureros_cerca_de_la_vivienda_404 = limpiar_dato($basureros_cerca_de_la_vivienda_404);
    $presencia_plagas_en_vivienda_501 = limpiar_dato($presencia_plagas_en_vivienda_501);
    $vivienda_realiza_jornada_recojer_inservibles_502 = limpiar_dato($vivienda_realiza_jornada_recojer_inservibles_502);
    $vivienda_construida_materiales_impiden_entrada_plagas_503 = limpiar_dato($vivienda_construida_materiales_impiden_entrada_plagas_503);
    $productos_quimicos_almacenados_rotulados_504 = limpiar_dato($productos_quimicos_almacenados_rotulados_504);
    $cocina_esta_limpia_602 = limpiar_dato($cocina_esta_limpia_602);
    $espacios_dialogo_normas_convivencia_conflictos_vivien_701 = limpiar_dato($espacios_dialogo_normas_convivencia_conflictos_vivien_701);
    $actividades_comunitarias_proyecto_viviendas_saludables_702 = limpiar_dato($actividades_comunitarias_proyecto_viviendas_saludables_702);
    $utilizan_plan_economia_familiar_703 = limpiar_dato($utilizan_plan_economia_familiar_703);
    // -------------------------------------------------------------------------------------------------
    $fecha_de_visita_institucion = limpiar_dato($fecha_de_visita_institucion);
    $tipo_de_institucion_educativa = limpiar_dato($tipo_de_institucion_educativa);
    $nombre_institucion_educativa = limpiar_dato($nombre_institucion_educativa);
    $nit = limpiar_dato($nit);
    $direccion_institucion = limpiar_dato($direccion_institucion);
    $nombre_del_rector = limpiar_dato($nombre_del_rector);
    $n_de_cedula_de_ciudadania = limpiar_dato($n_de_cedula_de_ciudadania);
    $n_de_estudiantes_en_la_institucion = limpiar_dato($n_de_estudiantes_en_la_institucion);
    $institucion_construida_lugar_seguro_101 = limpiar_dato($institucion_construida_lugar_seguro_101);
    $institcion_paredes_techos_no_tienen_huecos_ni_grietas_102 = limpiar_dato($institcion_paredes_techos_no_tienen_huecos_ni_grietas_102);
    $uso_de_combustible_en_el_comedor_escolar_103 = limpiar_dato($uso_de_combustible_en_el_comedor_escolar_103);
    $comedor_escolar_esta_separado_de_los_banos_y_salones_104 = limpiar_dato($comedor_escolar_esta_separado_de_los_banos_y_salones_104);
    $institucion_cuenta_con_iluminacion_ventilacion_105 = limpiar_dato($institucion_cuenta_con_iluminacion_ventilacion_105);
    $cuenta_con_agua_tratada_201 = limpiar_dato($cuenta_con_agua_tratada_201);
    $inst_agua_consumir_recipientes_tapados_elevados_piso_202 = limpiar_dato($inst_agua_consumir_recipientes_tapados_elevados_piso_202);
    $recipientes_para_almacenar_el_agua_estan_limpios_203 = limpiar_dato($recipientes_para_almacenar_el_agua_estan_limpios_203);
    $estado_del_almacenamiento_del_agua_204 = limpiar_dato($estado_del_almacenamiento_del_agua_204);
    $institucion_cuenta_con_servicios_de_bano_301 = limpiar_dato($institucion_cuenta_con_servicios_de_bano_301);
    $banos_estan_limpios_303 = limpiar_dato($banos_estan_limpios_303);
    $aguas_residuales_drenan_por_canales_o_tuberias_305 = limpiar_dato($aguas_residuales_drenan_por_canales_o_tuberias_305);
    $recipientes_residuos_ubicados_recipiente_tapa_401 = limpiar_dato($recipientes_residuos_ubicados_recipiente_tapa_401);
    $institucion_esta_aseada_402 = limpiar_dato($institucion_esta_aseada_402);
    $institucion_separa_los_residuos_403 = limpiar_dato($institucion_separa_los_residuos_403);
    $basureros_cerca_de_la_institucion_404 = limpiar_dato($basureros_cerca_de_la_institucion_404);
    $presencia_de_plagas_en_la_institucion__roedores_insectos_501 = limpiar_dato($presencia_de_plagas_en_la_institucion__roedores_insectos_501);
    $institucion_realiza_jornada_para_recoger_inservibles_502 = limpiar_dato($institucion_realiza_jornada_para_recoger_inservibles_502);
    $productos_quimicos_utilizados_bien_almacenados_rotulados_504 = limpiar_dato($productos_quimicos_utilizados_bien_almacenados_rotulados_504);
    $alimentos_del_comedor_estan_bien_manipulados_601 = limpiar_dato($alimentos_del_comedor_estan_bien_manipulados_601);
    $cocina_del_comedor_esta_limpia_602 = limpiar_dato($cocina_del_comedor_esta_limpia_602);
    $espacios_dialogo_normas_convivencia_conflictos_inst_701 = limpiar_dato($espacios_dialogo_normas_convivencia_conflictos_inst_701);
    $actividades_comunitarias_proyecto_escuelas_saludables_702 = limpiar_dato($actividades_comunitarias_proyecto_escuelas_saludables_702);


switch ($accion) {
    case "Registrar":
        $sql = "INSERT INTO ivc_entorno (nombres_tecnico_de_saneamiento,
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
        ) VALUES (?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?,
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
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

        if ($stmt->execute()) {
            echo "Nuevo registro ingresado con éxito. ";
            echo '<p>Puedes verificarlo presionando <a href="read&delete_entorno.php">aquí</a> y buscar o eliminar el registro.</p>';
            echo 'Presiona <a href="crud_entorno.php">aquí</a> si deseas insertar un nuevo registro.';
            echo '<p>O presiona <a href="../amb_1_index/Inicio_entorno_saludable.html">aquí</a> si deseas ir menú principal del programa.</p>';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $stmt->close();
        break;

    }

$con->close();
?>
