<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['entorno'])) {
    header('Location: login_entorno_add.php');
    exit;
}

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>IVC ENTORNO SALUDABLE DEPARTAMENTAL</title>
    <style>

body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

/* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Estilos para el formulario */
        form {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #2c8fff;
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        /* Botones de formulario */
        input[type="submit"],
        input[type="button"] {
            padding: 10px 20px;
            background-color: #2c8fff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #4CAF50;
        }

        /* Encabezado */
        h2 {
            color: #2c8fff;
        }

        /* Tooltip container */
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted #4CAF50;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 5px;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        /* Estilo del botón de cierre de sesión */
        .logout-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #2c8fff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .logout-button:hover {
            background-color: #4CAF50;
        }

        /* Estilo de los select */
        select {
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #2c8fff;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #2c8fff;
            border-radius: 4px;
        }
    </style>

</head>
<a href="logout_entorno_add.php" class="logout-button">Cerrar sesión</a>
<body>
    <center>
        <h2>INSPECCION VIGILANCIA Y CONTROL DE ENTORNO SALUDABLE</h2>
    </center>
    <form action="add_entorno.php" method="post">
        <table>

            <!-- <tr>
                <td><label for="id">Item:</label></td>
                <td><input type="number" id="id" name="id" maxlength="30"></td>
            </tr> -->

            <!-------------------------------------VIVIENDA------------------------------------->

            <tr>
                <td><label for="nombres_tecnico_de_saneamiento">Nombre del tecnico:</label></td>
                <td colspan="2"><input type="text" id="nombres_tecnico_de_saneamiento"
                        name="nombres_tecnico_de_saneamiento" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="municipio">Municipio asginado:</label></td>
                <td colspan="2">
                    <select id="municipio" name="municipio">
                        <option value="Buenavista">Buenavista</option>
                        <option value="Caimito">Caimito</option>
                        <option value="Chalán">Chalán</option>
                        <option value="Coloso">Coloso</option>
                        <option value="Corozal">Corozal</option>
                        <option value="Coveñas">Coveñas</option>
                        <option value="El Roble">El Roble</option>
                        <option value="Galeras">Galeras</option>
                        <option value="Guaranda">Guaranda</option>
                        <option value="La Union">La Unión</option>
                        <option value="Los Palmitos">Los Palmitos</option>
                        <option value="Majagual">Majagual</option>
                        <option value="Morroa">Morroa</option>
                        <option value="Ovejas">Ovejas</option>
                        <option value="Palmito">Palmito</option>
                        <option value="San Benito Abad">San Benito Abad</option>
                        <option value="San Juan de Betulia">San Juan de Betulia</option>
                        <option value="San Marcos">San Marcos</option>
                        <option value="San Onofre">San Onofre</option>
                        <option value="San Pedro">San Pedro</option>
                        <option value="Sampues">Sampués</option>
                        <option value="Sincelejo">Sincelejo</option>
                        <option value="Since">Sincé</option>
                        <option value="Sucre">Sucre</option>
                        <option value="Santiago de Tolu">Santiago de Tolú</option>
                        <option value="Tolu Viejo">Tolú Viejo</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="mes_actividades_a_reportar">Mes de actividades a reportar:</label></td>
                <td colspan="2">
                    <select id="mes_actividades_a_reportar" name="mes_actividades_a_reportar">
                        <option value="enero">Enero</option>
                        <option value="febrero">Febrero</option>
                        <option value="marzo">Marzo</option>
                        <option value="abril">Abril</option>
                        <option value="mayo">Mayo</option>
                        <option value="junio">Junio</option>
                        <option value="julio">Julio</option>
                        <option value="agosto">Agosto</option>
                        <option value="septiembre">Septiembre</option>
                        <option value="octubre">Octubre</option>
                        <option value="noviembre">Noviembre</option>
                        <option value="diciembre">Diciembre</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="formato_caracterizacion_a_reportar">Tipo de formato de caracterización a
                        reportar:</label></td>
                <td colspan="2">
                    <select id="formato_caracterizacion_a_reportar" name="formato_caracterizacion_a_reportar">
                        <option value="FORMATO DE CARACTERIZACION DE VIVIENDAS">FORMATO DE CARACTERIZACIÓN DE VIVIENDAS
                        </option>
                        <option value="FORMATO DE CARACTERIZACION DE INSTITUCION EDUCATIVA">FORMATO DE CARACTERIZACIÓN
                            DE INSTITUCION EDUCATIVA</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="fecha_de_la_visita_vivienda">fecha de la visita vivienda:</label></td>
                <td colspan="2"><input type="date" id="fecha_de_la_visita_vivienda" name="fecha_de_la_visita_vivienda"
                        required>
                </td>
            </tr>

            <tr>
                <td><label for="tipo_de_vivienda">Tipo de vivienda:</label></td>
                <td colspan="2">
                    <select id="tipo_de_vivienda" name="tipo_de_vivienda">
                        <option value="Urbana">Urbana</option>
                        <option value="Rural">Rural</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="nombre_cabeza_de_hogar">Nombre de cabeza de hogar:</label></td>
                <td colspan="2"><input type="text" id="nombre_cabeza_de_hogar" name="nombre_cabeza_de_hogar"
                        maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="n_habitantes_por_vivienda">Numero de habitantes por vivienda:</label></td>
                <td><input type="number" id="n_habitantes_por_vivienda" name="n_habitantes_por_vivienda" maxlength="30">
                </td>
            </tr>

            <tr>
                <td><label for="direccion_vivienda">Direccion de la vivienda:</label></td>
                <td colspan="2"><input type="text" id="direccion_vivienda" name="direccion_vivienda" maxlength="100">
                </td>
            </tr>

            <tr>
                <td><label for="telefono">Telefono:</label></td>
                <td colspan="2"><input type="number" id="telefono" name="telefono" maxlength="30">
                </td>
            </tr>

            <tr>
                <td><label for="viviendo_construida_lugar_seguro_101">Esta vivienda esta construida en un lugar
                        seguro</label></td>
                <td colspan="2">
                    <select id="viviendo_construida_lugar_seguro_101" name="viviendo_construida_lugar_seguro_101">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102">Las paredes no tiene ni huecos
                        ni grietas</label></td>
                <td colspan="2">
                    <select id="vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102"
                        name="vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="uso_de_combustible_103">Uso de combustible</label></td>
                <td colspan="2">
                    <select id="uso_de_combustible_103" name="uso_de_combustible_103">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="cocina_separada_los_banos_y_habitaciones_104">La cocina esta separada de los baños y las
                        habitaciones</label></td>
                <td colspan="2">
                    <select id="cocina_separada_los_banos_y_habitaciones_104"
                        name="cocina_separada_los_banos_y_habitaciones_104">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="cuenta_iluminacion_ventilacion_105">Cuentan con iluminacion y ventilacion</label></td>
                <td colspan="2">
                    <select id="cuenta_iluminacion_ventilacion_105" name="cuenta_iluminacion_ventilacion_105">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="cuenta_agua_tratada_201">Cuentan con agua tratada</label></td>
                <td colspan="2">
                    <select id="cuenta_agua_tratada_201" name="cuenta_agua_tratada_201">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="vivie_agua_consumir_recipientes_tapados_elevados_piso_202">El agua para beber y consumir
                        las almacenan en recipientes tapados y elevados del piso</label></td>
                <td colspan="2">
                    <select id="vivie_agua_consumir_recipientes_tapados_elevados_piso_202"
                        name="vivie_agua_consumir_recipientes_tapados_elevados_piso_202">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="los_recipientes_almacenar_agua_limpio_203">los recipientes para almacenar el agua están
                        limpios</label></td>
                <td colspan="2">
                    <select id="los_recipientes_almacenar_agua_limpio_203"
                        name="los_recipientes_almacenar_agua_limpio_203">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="estado_almacenamiento_agua_204">Estado del almacenamiento del agua</label></td>
                <td colspan="2">
                    <select id="estado_almacenamiento_agua_204" name="estado_almacenamiento_agua_204">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="vivienda_cuenta_servicios_bano_301">La vivienda cuenta con servicios de baño</label>
                </td>
                <td colspan="2">
                    <select id="vivienda_cuenta_servicios_bano_301" name="vivienda_cuenta_servicios_bano_301">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="cuenta_con_letrina_302">Cuenta con letrina</label></td>
                <td colspan="2">
                    <select id="cuenta_con_letrina_302" name="cuenta_con_letrina_302">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="banos_estan_limpio_303">Los baños estan limpios</label></td>
                <td colspan="2">
                    <select id="banos_estan_limpio_303" name="banos_estan_limpio_303">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="aguas_residuales_drenan_canales_tuberias_305">Las aguas reciduales drenan por los
                        canales o tuberias</label></td>
                <td colspan="2">
                    <select id="aguas_residuales_drenan_canales_tuberias_305"
                        name="aguas_residuales_drenan_canales_tuberias_305">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="recipientes_adecuadamente_ubicados_con_tapa_401">Los recipientes que almacenan residuos
                        sólidos están adecuadamente ubicados y en un recipiente con tapa</label></td>
                <td colspan="2">
                    <select id="recipientes_adecuadamente_ubicados_con_tapa_401"
                        name="recipientes_adecuadamente_ubicados_con_tapa_401">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="vivienda_esta_aseada_402">La vivienda esta aseada</label></td>
                <td colspan="2">
                    <select id="vivienda_esta_aseada_402" name="vivienda_esta_aseada_402">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="separan_los_residuo_403">Separacion de de residuos</label></td>
                <td colspan="2">
                    <select id="separan_los_residuo_403" name="separan_los_residuo_403">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="basureros_cerca_de_la_vivienda_404">Basureros cerca de la vivienda</label></td>
                <td colspan="2">
                    <select id="basureros_cerca_de_la_vivienda_404" name="basureros_cerca_de_la_vivienda_404">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="presencia_plagas_en_vivienda_501">Presencia de plagas en viviendas (como roedores o
                        insectos)</label></td>
                <td colspan="2">
                    <select id="presencia_plagas_en_vivienda_501" name="presencia_plagas_en_vivienda_501">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="vivienda_realiza_jornada_recojer_inservibles_502">La vivienda realiza jornada para
                        recoger inservibles</label></td>
                <td colspan="2">
                    <select id="vivienda_realiza_jornada_recojer_inservibles_502"
                        name="vivienda_realiza_jornada_recojer_inservibles_502">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="vivienda_construida_materiales_impiden_entrada_plagas_503">La vivienda está construida
                        en materiales que impiden la entrada de plagas</label></td>
                <td colspan="2">
                    <select id="vivienda_construida_materiales_impiden_entrada_plagas_503"
                        name="vivienda_construida_materiales_impiden_entrada_plagas_503">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="productos_quimicos_almacenados_rotulados_504">Los productos químicos utilizados están
                        bien almacenados y rotulados</label></td>
                <td colspan="2">
                    <select id="productos_quimicos_almacenados_rotulados_504"
                        name="productos_quimicos_almacenados_rotulados_504">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="cocina_esta_limpia_602">La cocina esta limpia</label></td>
                <td colspan="2">
                    <select id="cocina_esta_limpia_602" name="cocina_esta_limpia_602">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="espacios_dialogo_normas_convivencia_conflictos_vivien_701">Al interior se generan
                        espacios de dialogo y se aplicación normas de convivencia y resolución conflictos</label></td>
                <td colspan="2">
                    <select id="espacios_dialogo_normas_convivencia_conflictos_vivien_701"
                        name="espacios_dialogo_normas_convivencia_conflictos_vivien_701">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="actividades_comunitarias_proyecto_viviendas_saludables_702">Participan en actividades
                        comunitarias establecidas en el proyecto de viviendas saludables</label></td>
                <td colspan="2">
                    <select id="actividades_comunitarias_proyecto_viviendas_saludables_702"
                        name="actividades_comunitarias_proyecto_viviendas_saludables_702">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><label for="utilizan_plan_economia_familiar_703">Utilizan plan de economía familiar</label></td>
                <td colspan="2">
                    <select id="utilizan_plan_economia_familiar_703" name="utilizan_plan_economia_familiar_703">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <!-------------------------------------INSTITUCION EDUCATIVA------------------------------------->

            <tr>
                <td><label for="fecha_de_visita_institucion">Fecha de la visita Institucion:</label></td>
                <td colspan="2"><input type="date" id="fecha_de_visita_institucion" name="fecha_de_visita_institucion"
                        required>
                </td>
            </tr>

            <tr>
                <td><label for="tipo_de_institucion_educativa">Tipo de institucion educativa:</label></td>
                <td colspan="2">
                    <select id="tipo_de_institucion_educativa" name="tipo_de_institucion_educativa">
                        <option value="Urbana">Urbana</option>
                        <option value="Rural">Rural</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="nombre_institucion_educativa">Nombre de la institucion educativa:</label></td>
                <td colspan="2"><input type="text" id="nombre_institucion_educativa" name="nombre_institucion_educativa"
                        maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="nit">NIT:</label></td>
                <td><input type="number" id="nit" name="nit" maxlength="30"></td>
            </tr>

            <tr>
                <td><label for="direccion_institucion">Direccion de la institucion:</label></td>
                <td colspan="2"><input type="text" id="direccion_institucion" name="direccion_institucion"
                        maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="nombre_del_rector">Nombre del rector:</label></td>
                <td colspan="2"><input type="text" id="nombre_del_rector" name="nombre_del_rector" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="n_de_cedula_de_ciudadania">N° de cedula de ciudadania:</label></td>
                <td colspan="2"><input type="number" id="n_de_cedula_de_ciudadania" name="n_de_cedula_de_ciudadania"
                        maxlength="30"></td>
            </tr>

            <tr>
                <td><label for="n_de_estudiantes_en_la_institucion">N° de estudiantes en la institucion:</label></td>
                <td colspan="2"><input type="number" id="n_de_estudiantes_en_la_institucion"
                        name="n_de_estudiantes_en_la_institucion" maxlength="30"></td>
            </tr>

            <tr>
                <td><label for="institucion_construida_lugar_seguro_101">La institución educativa está en un lugar
                        seguro</label></td>
                <td colspan="2">
                    <select id="institucion_construida_lugar_seguro_101" name="institucion_construida_lugar_seguro_101">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="institcion_paredes_techos_no_tienen_huecos_ni_grietas_102">Las paredes y techos no
                        tienen huecos ni grietas</label></td>
                <td colspan="2">
                    <select id="institcion_paredes_techos_no_tienen_huecos_ni_grietas_102"
                        name="institcion_paredes_techos_no_tienen_huecos_ni_grietas_102">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="uso_de_combustible_en_el_comedor_escolar_103">Uso de combustible en el comedor
                        escolar</label></td>
                <td colspan="2">
                    <select id="uso_de_combustible_en_el_comedor_escolar_103"
                        name="uso_de_combustible_en_el_comedor_escolar_103">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="comedor_escolar_esta_separado_de_los_banos_y_salones_104">El comedor escolar está
                        separado de los baños y salones</label></td>
                <td colspan="2">
                    <select id="comedor_escolar_esta_separado_de_los_banos_y_salones_104"
                        name="comedor_escolar_esta_separado_de_los_banos_y_salones_104">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="institucion_cuenta_con_iluminacion_ventilacion_105">La institución cuenta con
                        iluminación y ventilación</label></td>
                <td colspan="2">
                    <select id="institucion_cuenta_con_iluminacion_ventilacion_105"
                        name="institucion_cuenta_con_iluminacion_ventilacion_105">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="cuenta_con_agua_tratada_201"></label>Cuenta con agua tratada</td>
                <td colspan="2">
                    <select id="cuenta_con_agua_tratada_201" name="cuenta_con_agua_tratada_201">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="inst_agua_consumir_recipientes_tapados_elevados_piso_202">El agua para beber y consumir
                        las almacenan en recipientes tapados y elevados del piso</label></td>
                <td colspan="2">
                    <select id="inst_agua_consumir_recipientes_tapados_elevados_piso_202"
                        name="inst_agua_consumir_recipientes_tapados_elevados_piso_202">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="recipientes_para_almacenar_el_agua_estan_limpios_203">Los recipientes para almacenar el
                        agua están limpios</label></td>
                <td colspan="2">
                    <select id="recipientes_para_almacenar_el_agua_estan_limpios_203"
                        name="recipientes_para_almacenar_el_agua_estan_limpios_203">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="estado_del_almacenamiento_del_agua_204">Estado del almacenamiento del agua</label></td>
                <td colspan="2">
                    <select id="estado_del_almacenamiento_del_agua_204" name="estado_del_almacenamiento_del_agua_204">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="institucion_cuenta_con_servicios_de_bano_301">La institución cuenta con servicios de
                        baño</label></td>
                <td colspan="2">
                    <select id="institucion_cuenta_con_servicios_de_bano_301"
                        name="institucion_cuenta_con_servicios_de_bano_301">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="banos_estan_limpios_303">Los baños están limpios</label></td>
                <td colspan="2">
                    <select id="banos_estan_limpios_303" name="banos_estan_limpios_303">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="aguas_residuales_drenan_por_canales_o_tuberias_305">Las aguas residuales drenan por
                        canales o tuberías</label></td>
                <td colspan="2">
                    <select id="aguas_residuales_drenan_por_canales_o_tuberias_305"
                        name="aguas_residuales_drenan_por_canales_o_tuberias_305">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="recipientes_residuos_ubicados_recipiente_tapa_401">Los recipientes que almacenan
                        residuos sólidos están adecuadamente ubicados y en un recipiente con tapa</label></td>
                <td colspan="2">
                    <select id="recipientes_residuos_ubicados_recipiente_tapa_401"
                        name="recipientes_residuos_ubicados_recipiente_tapa_401">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="institucion_esta_aseada_402">La institución esta aseada</label></td>
                <td colspan="2">
                    <select id="institucion_esta_aseada_402" name="institucion_esta_aseada_402">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="institucion_separa_los_residuos_403">La institución separa los residuos</label></td>
                <td colspan="2">
                    <select id="institucion_separa_los_residuos_403" name="institucion_separa_los_residuos_403">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="basureros_cerca_de_la_institucion_404">Hay basureros cerca de la institución</label>
                </td>
                <td colspan="2">
                    <select id="basureros_cerca_de_la_institucion_404" name="basureros_cerca_de_la_institucion_404">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="presencia_de_plagas_en_la_institucion__roedores_insectos_501">Hay presencia de plagas en
                        la institución (roedores, insectos)</label></td>
                <td colspan="2">
                    <select id="presencia_de_plagas_en_la_institucion__roedores_insectos_501"
                        name="presencia_de_plagas_en_la_institucion__roedores_insectos_501">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="institucion_realiza_jornada_para_recoger_inservibles_502">La institución realiza jornada
                        para recoger inservibles</label></td>
                <td colspan="2">
                    <select id="institucion_realiza_jornada_para_recoger_inservibles_502"
                        name="institucion_realiza_jornada_para_recoger_inservibles_502">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="productos_quimicos_utilizados_bien_almacenados_rotulados_504">Los productos químicos
                        utilizados están bien almacenados y rotulados</label></td>
                <td colspan="2">
                    <select id="productos_quimicos_utilizados_bien_almacenados_rotulados_504"
                        name="productos_quimicos_utilizados_bien_almacenados_rotulados_504">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="alimentos_del_comedor_estan_bien_manipulados_601">los alimentos del comedor están bien
                        manipulados</label></td>
                <td colspan="2">
                    <select id="alimentos_del_comedor_estan_bien_manipulados_601"
                        name="alimentos_del_comedor_estan_bien_manipulados_601">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="cocina_del_comedor_esta_limpia_602">La cocina del comedor está limpia</label></td>
                <td colspan="2">
                    <select id="cocina_del_comedor_esta_limpia_602" name="cocina_del_comedor_esta_limpia_602">
                    <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="espacios_dialogo_normas_convivencia_conflictos_inst_701">Al interior de la institución
                        se generan espacios de dialogo y se aplicación normas de convivencia y resolución
                        conflictos</label></td>
                <td colspan="2">
                    <select id="espacios_dialogo_normas_convivencia_conflictos_inst_701"
                        name="espacios_dialogo_normas_convivencia_conflictos_inst_701">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="actividades_comunitarias_proyecto_escuelas_saludables_702">La institución participa en
                        actividades comunitarias establecidas en el proyecto de escuelas saludables</label></td>
                <td colspan="2">
                    <select id="actividades_comunitarias_proyecto_escuelas_saludables_702"
                        name="actividades_comunitarias_proyecto_escuelas_saludables_702">
                        <option value=""></option>
                        <option value="VERDE (SIN RIESGO)">VERDE (SIN RIESGO)</option>
                        <option value="AMARILLO (RIESGO MEDIO)">AMARILLO (RIESGO MEDIO)</option>
                        <option value="ROJO (RIESGO ALTO)">ROJO (RIESGO ALTO)</option>
                    </select>
                </td>
            </tr>

            <!-- --------------------------------------------------------------------------------------- -->
            <tr>
                <td colspan="3">
                    <input type="submit" name="accion" value="Registrar">

                    <a href="../amb_1_index/Inicio_entorno_saludable.html">
                        <input type="button" value="Inicio">
                    </a>
                    <a href="read&delete_entorno.php">
                        <input type="button" value="Listado">
                    </a>
                    
                </td>
            </tr>

        </table>
    </form>

    <script>
        // Espera a que el DOM esté completamente cargado
        document.addEventListener('DOMContentLoaded', function () {
            // Selecciona todos los inputs de tipo number
            var inputsNumber = document.querySelectorAll('input[type="number"]');

            // Recorre cada input
            inputsNumber.forEach(function (input) {
                // Verifica si el valor está vacío
                if (input.value === "") {
                    input.value = "0"; // Establece el valor predeterminado como "0"
                }
            });
        });

    </script>

</body>

</html>