<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['alimentos'])) {
    header('Location: login_alimentos_add.php');
    exit;
}

$host = "127.0.0.1:3306";
$port = 3306;
$socket = "";
$user = "u337956361_dsas";
$password = "Saludambiental2024";
$dbname = "u337956361_saludambiental";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket) 
    or die ('No se pudo conectar al servidor de base de datos: ' . mysqli_connect_error());

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>IVC DE ALIMENTOS Y BEBIDAS DEPARTAMENTAL</title>
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
<a href="logout_alimentos_add.php" class="logout-button">Cerrar sesión</a>
<body>
    <center>
        <h2>INSPECCION VIGILANCIA Y CONTROL DE ALIMENTOS Y BEBIDAS DEPARTAMENTAL</h2>
    </center>
    <form action="crud_alimentos.php" method="post">
        <table>

            <!-- <td><label for="id">Item:</label></td>
            <td><input type="number" id="id" name="id"></td>
            </tr> -->

            <tr>
                <td><label for="nombre_del_tecnico_saneamiento">Nombre del tecnico:</label></td>
                <td colspan="2"><input type="text" id="nombre_del_tecnico_saneamiento"
                        name="nombre_del_tecnico_saneamiento" maxlength="100" required></td>
            </tr>

            <tr>
                <td><label for="municipio">Municipio:</label></td>
                <td colspan="2">
                    <select id="municipio" name="municipio">
                        <option value="Buenavista">Buenavista</option>
                        <option value="Caimito">Caimito</option>
                        <option value="Chalan">Chalán</option>
                        <option value="Coloso">Coloso</option>
                        <option value="Corozal">Corozal</option>
                        <option value="Coveñas">Coveñas</option>
                        <option value="El Roble">El Roble</option>
                        <option value="Galeras">Galeras</option>
                        <option value="Guaranda">Guaranda</option>
                        <option value="La Unión">La Unión</option>
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
                <td><label for="nombre_de_establecimiento">Nombre del establecimiento:</label></td>
                <td colspan="2"><input type="text" id="nombre_de_establecimiento" name="nombre_de_establecimiento" maxlength="50"
                        required></td>
            </tr>

            <tr>
                <td><label for="nombre_del_representante_legal">Nombre del representante legal:</label></td>
                <td colspan="2"><input type="text" id="nombre_del_representante_legal"
                        name="nombre_del_representante_legal" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="identificacion_cedula_y_o_nit">Cedula y/o NIT:</label></td>
                <td colspan="2"><input type="number" id="identificacion_cedula_y_o_nit"
                        name="identificacion_cedula_y_o_nit" maxlength="40"></td>
            </tr>

            <tr>
                <td><label for="direccion_del_establecimiento">Direccion del establecimiento:</label></td>
                <td colspan="2"><input type="text" id="direccion_del_establecimiento"
                        name="direccion_del_establecimiento" maxlength="100">
                </td>
            </tr>

            <tr>
                <td><label for="area">Area:</label></td>
                <td colspan="2">
                    <select id="area" name="area">
                        <option value="Rural">Rural</option>
                        <option value="Urbana">Urbana</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="telefono">Telefono:</label></td>
                <td colspan="2"><input type="number" id="telefono" name="telefono" maxlength="40"></td>
            </tr>

            <tr>
                <td><label for="correo_electronico">Correo electronico:</label></td>
                <td colspan="2"><input type="text" id="correo_electronico" name="correo_electronico" maxlength="100">
                </td>
            </tr>

            <tr>
                <td><label for="categoria_establecimiento">Categoria del establecimiento:</label></td>
                <td colspan="2">
                    <select id="categoria_establecimiento" name="categoria_establecimiento">
                        <option value="Reparacion Alimentos">Reparacion Alimentos</option>
                        <option value="Comedores">Comedores</option>
                        <option value="Expendio de alimentos">Expendio de alimentos</option>
                        <option value="Grandes superficies">Grandes superficies</option>
                        <option value="Ensamble alimentos">Ensamble alimentos</option>
                        <option value="Almacenamiento">Almacenamiento</option>
                        <option value="Expendio de bebidas alcholicas">Expendio de bebidas alcholicas</option>
                        <option value="Plaza de mercado">Plaza de mercado</option>
                        <option value="Comercializador de leche cruda">Comercializador de leche cruda</option>
                        <option value="Carnes y/o productos carnicos comestibles">Carnes y/o productos carnicos
                            comestibles</option>
                        <option value="Vehiculos">Vehiculos</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="seleccione_el_tipo_de_establecimiento">Tipo de establecimiento:</label>
                </td>
                <td colspan="2"><input type="text" id="seleccione_el_tipo_de_establecimiento"
                        name="seleccione_el_tipo_de_establecimiento" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="fecha_de_visita_actual">Fecha de la visita actual:</label></td>
                <td colspan="2"><input type="date" id="fecha_de_visita_actual" name="fecha_de_visita_actual" required>
                </td>
            </tr>

            <tr>
                <td><label for="concepto_sanitario">Concepto sanitario:</label></td>
                <td colspan="2">
                    <select id="concepto_sanitario" name="concepto_sanitario">
                        <option value="Favorable">Favorable</option>
                        <option value="Favorable con requerimiento">Favorable con requerimiento</option>
                        <option value="Desfavorable">Desfavorable</option>
                        <option value="Pendiente">Pendiente</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="porcentaje_de_cumplimiento">Porcentaje de cumplimiento:</label></td>
                <td colspan="2"><input type="number" step="0.01" id="porcentaje_de_cumplimiento" name="porcentaje_de_cumplimiento"
                        maxlength="5"></td>
            </tr>

            <tr>
                <td><label for="motivo_de_la_visita">Motivo de la visita:</label></td>
                <td colspan="2">
                    <select id="motivo_de_la_visita" name="motivo_de_la_visita">
                        <option value="Programacion">Programacion</option>
                        <option value="Solicitud del interesado">Solicitud del interesado</option>
                        <option value="Asociada a petisiones, quejas y reclamos">Asociada a petisiones, quejas y
                            reclamos</option>
                        <option value="Solicitud oficial">Solicitud oficial</option>
                        <option value="Eveto de interes en salud publica">Evento de interes en salud publica</option>
                        <option value="Solicitud de practicas de pruebas/Proceso sancionatorio administrativo">Solicitud
                            de practicas de pruebas/Proceso sancionatorio administrativo</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="verificacion_de_rotulado">Verificacion de rotulado:</label></td>
                <td colspan="2">
                    <select id="verificacion_de_rotulado" name="verificacion_de_rotulado">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="numero_de_rotulados_realizados">Numero de rotulados realizados:</label></td>
                <td colspan="2"><input type="number" id="numero_de_rotulados_realizados"
                        name="numero_de_rotulados_realizados" maxlength="10">
                </td>
            </tr>

            <tr>
                <td><label for="establecimiento_cuenta_con_la_documentacion_si_no">¿El establecimiento cuenta con la
                        documentacion?</label></td>
                <td colspan="2">
                    <select id="establecimiento_cuenta_con_la_documentacion_si_no"
                        name="establecimiento_cuenta_con_la_documentacion_si_no">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <input type="submit" name="accion" value="Registrar">

                    <a href="../amb_1_index/Inicio_alimentos_y_bebidas.html">
                        <input type="button" value="Inicio">
                    </a>
                    <a href="read&delete_alimentos.php">
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