<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['agua'])) {
    header('Location: login_agua_add.php');
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
    <title>IVC CALIDAD DEL AGUA PARA EL CONSUMO HUMANO DEPARTAMENTAL</title>
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
<a href="logout_agua_add.php" class="logout-button">Cerrar sesión</a>
<body>
    <center>
        <h2>PROGRAMA VIGILANCIA DE LA CALIDAD DEL AGUA PARA CONSUMO HUMANO</h2>
    </center>
    <form action="crud_agua.php" method="post">
        <table>

            <!-- <td><label for="item">Item:</label></td>
            <td><input type="number" id="item" name="item"></td>
            </tr> -->

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
                <td><label for="fecha_de_visita">Fecha de la visita:</label></td>
                <td colspan="2"><input type="date" id="fecha_de_visita" name="fecha_de_visita" required></td>
            </tr>

            <tr>
                <td><label for="razon_social">Razón social:</label></td>
                <td colspan="2"><input type="text" id="razon_social" name="razon_social" maxlength="30"></td>
            </tr>

            <tr>
                <td><label for="nit_rut_cc">NIT/RUT/CC:</label></td>
                <td colspan="2"><input type="text" id="nit_rut_cc" name="nit_rut_cc" maxlength="30"></td>
            </tr>

            <tr>
                <td><label for="representante_legal">Representante legal:</label></td>
                <td colspan="2"><input type="text" id="representante_legal" name="representante_legal" maxlength="30">
                </td>
            </tr>

            <tr>
                <td><label for="documento">Documento:</label></td>
                <td colspan="2"><input type="text" id="documento" name="documento" maxlength="30"></td>
            </tr>

            <tr>
                <td><label for="telefono">Teléfono:</label></td>
                <td colspan="2"><input type="number" id="telefono" name="telefono" maxlength="40"></td>
            </tr>

            <tr>
                <td><label for="e_mail">Correo electrónico:</label></td>
                <td colspan="2"><input type="text" id="e_mail" name="e_mail" maxlength="40"></td>
            </tr>

            <tr>
                <td><label for="irabapp">IRABApp:</label></td>
                <td colspan="2"><input type="number" step="0.01" id="irabapp" name="irabapp" maxlength="20"
                        oninput="actualizarNivelDeRiesgo()"></td>
            </tr>

            <tr>
                <td><label for="nivel_de_riesgo">Nivel de riesgo IRABApp:</label></td>
                <td colspan="2"><input type="text" id="nivel_de_riesgo" name="nivel_de_riesgo" maxlength="20"></td>
            </tr>

            <tr>
                <td><label for="bpspp">BPSpp:</label></td>
                <td colspan="2"><input type="number" step="0.01" id="bpspp" name="bpspp" maxlength="20"
                        oninput="actualizarNivelDeRiesgo2()"></td>
            </tr>

            <tr>
                <td><label for="nivel_de_riesgo_2">Nivel de riesgo BPSpp:</label></td>
                <td colspan="2"><input type="text" id="nivel_de_riesgo_2" name="nivel_de_riesgo_2" maxlength="20"></td>
            </tr>

            <tr>
                <td><label for="quien_realizo_la_visita">Quién realizó la visita:</label></td>
                <td colspan="2"><input type="text" id="quien_realizo_la_visita" name="quien_realizo_la_visita"
                        maxlength="30"></td>
            </tr>

            <tr>
                <td><label for="autocontrol">Autocontrol:</label></td>
                <td colspan="2"><input type="text" id="autocontrol" name="autocontrol" maxlength="30"></td>
            </tr>

            <tr>
                <td colspan="3">
                    <input type="submit" name="accion" value="Registrar">

                    <a href="../amb_1_index/Inicio_calidad_agua.html">
                        <input type="button" value="Inicio">
                    </a>
                    <a href="read&delete_agua.php">
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

        function actualizarNivelDeRiesgo() {
            // Obtener el valor de IRABApp
            var irabappValue = parseFloat(document.getElementById('irabapp').value);

            // Obtener el campo de nivel de riesgo
            var nivelDeRiesgoField = document.getElementById('nivel_de_riesgo');

            // Determinar el nivel de riesgo basado en el valor de IRABApp
            if (irabappValue >= 70.1 && irabappValue <= 100) {
                nivelDeRiesgoField.value = 'RIESGO MUY ALTO';
            } else if (irabappValue >= 40.1 && irabappValue <= 70) {
                nivelDeRiesgoField.value = 'RIESGO ALTO';
            } else if (irabappValue >= 25.1 && irabappValue <= 40) {
                nivelDeRiesgoField.value = 'RIESGO MEDIO';
            } else if (irabappValue >= 10.1 && irabappValue <= 25) {
                nivelDeRiesgoField.value = 'RIESGO BAJO';
            } else if (irabappValue >= 0 && irabappValue <= 10) {
                nivelDeRiesgoField.value = 'SIN RIESGO';
            } else {
                nivelDeRiesgoField.value = ''; // Si el valor no está en ningún rango conocido, dejar el campo vacío
            }
        }

        function actualizarNivelDeRiesgo2() {
            // Obtener el valor de BPSpp
            var bpsppValue = parseFloat(document.getElementById('bpspp').value);

            // Obtener el campo de nivel de riesgo 2
            var nivelDeRiesgo2Field = document.getElementById('nivel_de_riesgo_2');

            // Determinar el nivel de riesgo 2 basado en el valor de BPSpp
            if (bpsppValue >= 71 && bpsppValue <= 100) {
                nivelDeRiesgo2Field.value = 'RIESGO MUY ALTO';
            } else if (bpsppValue >= 41 && bpsppValue <= 70) {
                nivelDeRiesgo2Field.value = 'RIESGO ALTO';
            } else if (bpsppValue >= 25 && bpsppValue <= 40) {
                nivelDeRiesgo2Field.value = 'RIESGO MEDIO';
            } else if (bpsppValue >= 11 && bpsppValue <= 25) {
                nivelDeRiesgo2Field.value = 'RIESGO BAJO';
            } else if (bpsppValue >= 0 && bpsppValue <= 10) {
                nivelDeRiesgo2Field.value = 'SIN RIESGO';
            } else {
                nivelDeRiesgo2Field.value = ''; // Si el valor no está en ningún rango conocido, dejar el campo vacío
            }
        }

    </script>

</body>

</html>