<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['zoonosis'])) {
    header('Location: login_zoonosis_add.php');
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
    <title>IVC PROGRAMA DE ZOONOSIS DEPARTAMENTAL</title>
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
<a href="logout_zoonosis_add.php" class="logout-button">Cerrar sesión</a>
<body>
    <center>
        <h2>INSPECCION VIGILANCIA Y CONTROL DE ZOONOSIS DEPARTAMENTAL</h2>
    </center>
    <form action="crud_zoonosis.php" method="post">
        <table>

            <!-- <tr>
                <td><label for="id">Numero:</label></td>
                <td><input type="number" id="id" name="id" maxlength="30"></td>
            </tr> -->

            <tr>
                <td><label for="codigo">Codigo:</label></td>
                <td><input type="number" id="codigo" name="codigo"></td>
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
                <td><label for="numero_de_inscripcion">Numero de inscripcion:</label></td>
                <td><input type="number" id="numero_de_inscripcion" name="numero_de_inscripcion" maxlength="30"></td>
            </tr>

            <tr>
                <td><label for="nombre_del_establecimiento">Nombre del establecimiento:</label></td>
                <td colspan="2"><input type="text" id="nombre_del_establecimiento" name="nombre_del_establecimiento"
                        maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="nombre_del_propietario">Nombre del propietario:</label></td>
                <td colspan="2"><input type="text" id="nombre_del_propietario" name="nombre_del_propietario"
                        maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="direccion">Direccion:</label></td>
                <td colspan="2"><input type="text" id="direccion" name="direccion" maxlength="100">
                </td>
            </tr>

            <tr>
                <td><label for="tipo_de_establecimiento">Tipo del establecimiento:</label></td>
                <td colspan="2">
                    <select id="tipo_de_establecimiento" name="tipo_de_establecimiento">
                        <option value=""> </option>
                        <option value="VETERINARIAS">VETERINARIAS</option>
                        <option value="ALMACENES AGROINDUSTRIALES">ALMACENES AGROINDUSTRIALES</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="consultorio_veter">Consultorio veterinario</label></td>
                <td colspan="2">
                    <select id="consultorio_veter" name="consultorio_veter">
                        <option value=" "> </option>
                        <option value="X">X</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="clinicas_veter">Clinica veterinaria</label></td>
                <td colspan="2">
                    <select id="clinicas_veter" name="clinicas_veter">
                        <option value=" "> </option>
                        <option value="X">X</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="guarderia_veter">Guarderia veterinaria</label></td>
                <td colspan="2">
                    <select id="guarderia_veter" name="guarderia_veter">
                        <option value=" "> </option>
                        <option value="X">X</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="agropecuarias">Agropecuaria</label></td>
                <td colspan="2">
                    <select id="agropecuarias" name="agropecuarias">
                        <option value=" "> </option>
                        <option value="X">X</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="venta_de_alimentos_concentrado">Venta de alimentos concentrados</label></td>
                <td colspan="2">
                    <select id="venta_de_alimentos_concentrado" name="venta_de_alimentos_concentrado">
                        <option value=" "> </option>
                        <option value="X">X</option>
                    </select>
                </td>
            </tr>

            <!-- --------------------------------------------------------------------------------------- -->
            <tr>
                <td colspan="3">
                    <input type="submit" name="accion" value="Registrar">

                    <a href="../amb_1_index/Inicio_zoonosis.html">
                        <input type="button" value="Inicio">
                    </a>
                    <a href="read&delete_zoonosis.php">
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