<?php
// Conexión a la base de datos
$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die('Could not connect to the database server: ' . mysqli_connect_error());

// Consulta para obtener los registros
$sql = "SELECT * FROM ivc_entorno"; // Cambia 'ivc_agua' por el nombre de tu tabla
$result = $con->query($sql);

// Configurar la cabecera para descarga de archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"ivc_entorno_listado.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

// Abrir el cuerpo del archivo Excel como tabla HTML
echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Nombres Tecnico de Saneamiento</th>
        <th>Municipio</th>
        <th>Mes Actividades a Reportar</th>
        <th>Formato Caracterizacion a Reportar</th>
        <th>Fecha de la Visita Vivienda</th>
        <th>Tipo de Vivienda</th>
        <th>Nombre Cabeza de Hogar</th>
        <th>N Habitantes por Vivienda</th>
        <th>Direccion Vivienda</th>
        <th>Telefono</th>
        <th>Viviendo Construida Lugar Seguro 101</th>
        <th>Vivienda Paredes Techos No Tienen Huecos Ni Grietas 102</th>
        <th>Uso de Combustible 103</th>
        <th>Cocina Separada los Banos y Habitaciones 104</th>
        <th>Cuenta Iluminacion Ventilacion 105</th>
        <th>Cuenta Agua Tratada 201</th>
        <th>Vivienda Agua Consumir Recipientes Tapados Elevados Piso 202</th>
        <th>Los Recipientes Almacenar Agua Limpio 203</th>
        <th>Estado Almacenamiento Agua 204</th>
        <th>Vivienda Cuenta Servicios Bano 301</th>
        <th>Cuenta con Letrina 302</th>
        <th>Banos Estan Limpio 303</th>
        <th>Aguas Residuales Drenan Canales Tuberias 305</th>
        <th>Recipientes Adecuadamente Ubicados con Tapa 401</th>
        <th>Vivienda Esta Aseada 402</th>
        <th>Separan los Residuo 403</th>
        <th>Basureros Cerca de la Vivienda 404</th>
        <th>Presencia Plagas en Vivienda 501</th>
        <th>Vivienda Realiza Jornada Recoger Inservibles 502</th>
        <th>Vivienda Construida Materiales Impiden Entrada Plagas 503</th>
        <th>Productos Quimicos Almacenados Rotulados 504</th>
        <th>Cocina Esta Limpia 602</th>
        <th>Espacios Dialogo Normas Convivencia Conflictos Vivien 701</th>
        <th>Actividades Comunitarias Proyecto Viviendas Saludables 702</th>
        <th>Utilizan Plan Economia Familiar 703</th>
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

// Escribir los registros en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombres_tecnico_de_saneamiento']}</td>
                <td>{$row['municipio']}</td>
                <td>{$row['mes_actividades_a_reportar']}</td>
                <td>{$row['formato_caracterizacion_a_reportar']}</td>
                <td>{$row['fecha_de_la_visita_vivienda']}</td>
                <td>{$row['tipo_de_vivienda']}</td>
                <td>{$row['nombre_cabeza_de_hogar']}</td>
                <td>{$row['n_habitantes_por_vivienda']}</td>
                <td>{$row['direccion_vivienda']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['viviendo_construida_lugar_seguro_101']}</td>
                <td>{$row['vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102']}</td>
                <td>{$row['uso_de_combustible_103']}</td>
                <td>{$row['cocina_separada_los_banos_y_habitaciones_104']}</td>
                <td>{$row['cuenta_iluminacion_ventilacion_105']}</td>
                <td>{$row['cuenta_agua_tratada_201']}</td>
                <td>{$row['vivie_agua_consumir_recipientes_tapados_elevados_piso_202']}</td>
                <td>{$row['los_recipientes_almacenar_agua_limpio_203']}</td>
                <td>{$row['estado_almacenamiento_agua_204']}</td>
                <td>{$row['vivienda_cuenta_servicios_bano_301']}</td>
                <td>{$row['cuenta_con_letrina_302']}</td>
                <td>{$row['banos_estan_limpio_303']}</td>
                <td>{$row['aguas_residuales_drenan_canales_tuberias_305']}</td>
                <td>{$row['recipientes_adecuadamente_ubicados_con_tapa_401']}</td>
                <td>{$row['vivienda_esta_aseada_402']}</td>
                <td>{$row['separan_los_residuo_403']}</td>
                <td>{$row['basureros_cerca_de_la_vivienda_404']}</td>
                <td>{$row['presencia_plagas_en_vivienda_501']}</td>
                <td>{$row['vivienda_realiza_jornada_recojer_inservibles_502']}</td>
                <td>{$row['vivienda_construida_materiales_impiden_entrada_plagas_503']}</td>
                <td>{$row['productos_quimicos_almacenados_rotulados_504']}</td>
                <td>{$row['cocina_esta_limpia_602']}</td>
                <td>{$row['espacios_dialogo_normas_convivencia_conflictos_vivien_701']}</td>
                <td>{$row['actividades_comunitarias_proyecto_viviendas_saludables_702']}</td>
                <td>{$row['utilizan_plan_economia_familiar_703']}</td>
                <td>{$row['fecha_de_visita_institucion']}</td>
                <td>{$row['tipo_de_institucion_educativa']}</td>
                <td>{$row['nombre_institucion_educativa']}</td>
                <td>{$row['nit']}</td>
                <td>{$row['direccion_institucion']}</td>
                <td>{$row['nombre_del_rector']}</td>
                <td>{$row['n_de_cedula_de_ciudadania']}</td>
                <td>{$row['n_de_estudiantes_en_la_institucion']}</td>
                <td>{$row['institucion_construida_lugar_seguro_101']}</td>
                <td>{$row['institcion_paredes_techos_no_tienen_huecos_ni_grietas_102']}</td>
                <td>{$row['uso_de_combustible_en_el_comedor_escolar_103']}</td>
                <td>{$row['comedor_escolar_esta_separado_de_los_banos_y_salones_104']}</td>
                <td>{$row['institucion_cuenta_con_iluminacion_ventilacion_105']}</td>
                <td>{$row['cuenta_con_agua_tratada_201']}</td>
                <td>{$row['inst_agua_consumir_recipientes_tapados_elevados_piso_202']}</td>
                <td>{$row['recipientes_para_almacenar_el_agua_estan_limpios_203']}</td>
                <td>{$row['estado_del_almacenamiento_del_agua_204']}</td>
                <td>{$row['institucion_cuenta_con_servicios_de_bano_301']}</td>
                <td>{$row['banos_estan_limpios_303']}</td>
                <td>{$row['aguas_residuales_drenan_por_canales_o_tuberias_305']}</td>
                <td>{$row['recipientes_residuos_ubicados_recipiente_tapa_401']}</td>
                <td>{$row['institucion_esta_aseada_402']}</td>
                <td>{$row['institucion_separa_los_residuos_403']}</td>
                <td>{$row['basureros_cerca_de_la_institucion_404']}</td>
                <td>{$row['presencia_de_plagas_en_la_institucion__roedores_insectos_501']}</td>
                <td>{$row['institucion_realiza_jornada_para_recoger_inservibles_502']}</td>
                <td>{$row['productos_quimicos_utilizados_bien_almacenados_rotulados_504']}</td>
                <td>{$row['alimentos_del_comedor_estan_bien_manipulados_601']}</td>
                <td>{$row['cocina_del_comedor_esta_limpia_602']}</td>
                <td>{$row['espacios_dialogo_normas_convivencia_conflictos_inst_701']}</td>
                <td>{$row['actividades_comunitarias_proyecto_escuelas_saludables_702']}</td>

              </tr>";
    }
} else {
    echo "<tr><td colspan='15'>0 resultados</td></tr>";
}

// Cerrar la tabla
echo "</table>";

// Cerrar la conexión a la base de datos
$con->close();
?>
