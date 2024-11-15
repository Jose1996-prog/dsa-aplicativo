<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['veo'])) {
    header('Location: login_veo_add.php');
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
    <title>IVC VILIGANCIA EPIDEMIOLOGIVA</title>
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
<a href="logout_veo_add.php" class="logout-button">Cerrar sesión</a>
<body>
    <center>
        <h2>INSPECCION VIGILANCIA Y CONTROL VEO</h2>
    </center>
    <form action="crud_veo.php" method="post">
        <table>

            <tr>
                <td><label for="nombre_del_tecnico_saneamiento">Nombre del tecnico:</label></td>
                <td colspan="2"><input type="text" id="nombre_del_tecnico_saneamiento"
                        name="nombre_del_tecnico_saneamiento" maxlength="100" required></td>
            </tr>

            <tr>
                <td><label for="fecha_visita">Fecha de la visita:</label></td>
                <td colspan="2"><input type="date" id="fecha_visita" name="fecha_visita" required></td>
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
                <td><label for="categoria_establecimiento">Categoria del establecimiento:</label></td>
                <td colspan="2">
                    <select id="categoria_establecimiento" name="categoria_establecimiento">
                        <option value="Expendedores de plaguicidas">Expendedores de plaguicidas</option>
                        <option value="Bodegas">Bodegas</option>
                        <option value="Depositos">Depositos</option>
                        <option value="Almacen agricola">Almacen agricola</option>
                        <option value="Agroquimicos">Agroquimicos</option>
                        <option value="Cuartelarios">Cuartelarios</option>
                        <option value="Ferreterias (Expendedoras de plaguicidas)">Ferreterias (Expendedoras de
                            plaguicidas)</option>
                        <option value="Empresa aplicadoras de plaguicidas,  limpieza y desifeccion">Empresa aplicadoras
                            de plaguicidas, limpieza y desifeccion</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="tipo_de_establecimiento">Tipo de establecimiento:</label>
                </td>
                <td colspan="2"><input type="text" id="tipo_de_establecimiento" name="tipo_de_establecimiento"
                        maxlength="50"></td>
            </tr>

            <tr>
                <td><label for="nombre_del_establecimiento">Nombre del establecimiento:</label></td>
                <td colspan="2"><input type="text" id="nombre_del_establecimiento" name="nombre_del_establecimiento"
                        maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="direccion">Direccion del establecimiento:</label></td>
                <td colspan="2"><input type="text" id="direccion" name="direccion" maxlength="50">
                </td>
            </tr>

            <tr>
                <td><label for="telefono">Telefono:</label></td>
                <td colspan="2"><input type="number" id="telefono" name="telefono" maxlength="20"></td>
            </tr>

            <tr>
                <td><label for="correo">Correo electronico:</label></td>
                <td colspan="2"><input type="text" id="correo" name="correo" maxlength="100"></td>
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
                <td><label for="nombre_del_representante_legal">Nombre del representante legal:</label></td>
                <td colspan="2"><input type="text" id="nombre_del_representante_legal"
                        name="nombre_del_representante_legal" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="cedula">Identificacion cedula:</label></td>
                <td><input type="number" id="cedula" name="cedula" maxlength="30"></td>
            </tr>

            <tr>
                <td><label for="nit">NIT:</label></td>
                <td><input type="number" id="nit" name="nit" maxlength="50"></td>
            </tr>

            <tr>
                <td><label for="tipo_de_persona">Tipo de persona:</label></td>
                <td colspan="2">
                    <select id="tipo_de_persona" name="tipo_de_persona">
                        <option value="Natural">Natural</option>
                        <option value="Juridica">Juridica</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="cuenta_con_la_documentacion">¿Cuenta con la documentacion?</label></td>
                <td colspan="2">
                    <select id="cuenta_con_la_documentacion" name="cuenta_con_la_documentacion">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="motivo_de_la_visita">Motivo de la visita:</label></td>
                <td colspan="2">
                    <select id="motivo_de_la_visita" name="motivo_de_la_visita">
                        <option value="Programacion">Programacion</option>
                        <option value="Solicitud del interesado">Solicitud del interesado</option>
                        <option value="Quejas y reclamos">Quejas y reclamos</option>
                        <option value="Notificacion">Notificacion</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="porcentaje_de_cumplimiento">Porcentaje de cumplimiento:</label></td>
                <td colspan="2"><input type="number" step="0.01" id="porcentaje_de_cumplimiento" name="porcentaje_de_cumplimiento"
                        maxlength="5"></td>
            </tr>

            <tr>
                <td><label for="concepto_sanitario">Concepto sanitario:</label></td>
                <td colspan="2">
                    <select id="concepto_sanitario" name="concepto_sanitario">
                        <option value="Favorable (95 al 100%)">Favorable (95 al 100%)</option>
                        <option value="Favorable con requerimiento (50 al 94%)">Favorable con requerimiento (50 al 94%)
                        </option>
                        <option value="Desfavorable (menos del 49.9%)">Desfavorable (menos del 49.9%)</option>
                        <option value="Pendiente">Pendiente</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="visitas">Numero de visita:</label></td>
                <td colspan="2">
                    <select id="visitas" name="visitas">
                        <option value="Visita 1">Visita 1</option>
                        <option value="Visita 2">Visita 2</option>
                        <option value="Visita 3">Visita 3</option>
                        <option value="Visita 4">Visita 4</option>
                    </select>
                </td>
            </tr>

            <!-- ---------------------------------------------------------------------------------------- -->
            <tr>
                <td colspan="3">
                    <input type="submit" name="accion" value="Registrar">

                    <a href="../amb_1_index/Inicio_veo.html">
                        <input type="button" value="Inicio">
                    </a>
                    <a href="read&delete_veo.php">
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