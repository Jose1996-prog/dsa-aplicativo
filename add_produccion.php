<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['produccion'])) {
    header('Location: login_produccion_add.php');
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
    <title>CONTROL DE INDUCCIONES A PRODUCCION LIMPIA DEPARTAMENTAL</title>
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
<a href="logout_produccion_add.php" class="logout-button">Cerrar sesión</a>
<body>
    <center>
        <h2>CONTROL DE INDUCCIONES A PRODUCCION LIMPIA DEPARTAMENTAL</h2>
    </center>
    <form action="crud_produccion.php" method="post">
        <table>

            <!-- <tr>
                <td><label for="id">Item:</label></td>
                <td><input type="number" id="id" name="id"></td>
            </tr> -->

            <tr>
                <td><label for="fecha">Fecha:</label></td>
                <td><input type="date" id="fecha" name="fecha" required></td>
            </tr>

            <tr>
                <td><label for="encargado_visita">Encargado de la visita:</label></td>
                <td><input type="text" id="encargado_visita" name="encargado_visita" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="cargo">Cargo:</label></td>
                <td><input type="text" id="cargo" name="cargo" maxlength="50"></td>
            </tr>

            <tr>
                <td><label for="dimension">Dimension:</label></td>
                <td><input type="text" id="dimension" name="dimension" maxlength="50"></td>
            </tr>

            <tr>
                <td><label for="componente">Componente:</label></td>
                <td><input type="text" id="componente" name="componente" maxlength="50"></td>
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
                <td><label for="institucion">Institucion:</label></td>
                <td><input type="text" id="institucion" name="institucion" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="rep_institucional">Representante institucional:</label></td>
                <td><input type="text" id="rep_institucional" name="rep_institucional" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="direccion">Direccion:</label></td>
                <td><input type="text" id="direccion" name="direccion" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="correo_elec">Correo electronico:</label></td>
                <td><input type="text" id="correo_elec" name="correo_elec" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="telefono">Telefono:</label></td>
                <td><input type="number" id="telefono" name="telefono" maxlength="20"></td>
            </tr>

            <tr>
                <td><label for="persona_entrevistada">Persona entrevistada:</label></td>
                <td><input type="text" id="persona_entrevistada" name="persona_entrevistada" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="cargo_del_entrevistado">Cargo del entrevistado:</label></td>
                <td><input type="text" id="cargo_del_entrevistado" name="cargo_del_entrevistado" maxlength="50"></td>
            </tr>

            <tr>
                <td><label for="telefono_del_entrevistado">Telefono del entrevisado:</label></td>
                <td><input type="number" id="telefono_del_entrevistado" name="telefono_del_entrevistado" maxlength="20"></td>
            </tr>

            <tr>
                <td><label for="correo_elec_entrevistado">Correo electronico del entrevisado:</label></td>
                <td><input type="text" id="correo_elec_entrevistado" name="correo_elec_entrevistado" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="objetivo_de_la_visita">Objetivo de la visita:</label></td>
                <td><input type="text" id="objetivo_de_la_visita" name="objetivo_de_la_visita" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="desarrollo">Desarollo:</label></td>
                <td><input type="text" id="desarrollo" name="desarrollo" size="50" maxlength="1000"></td>
            </tr>

            <tr>
                <td><label for="compromisos">Compromiso:</label></td>
                <td><input type="text" id="compromisos" name="compromisos" size="50" maxlength="1000"></td>
            </tr>

            <tr>
                <td><label for="nombre_funcionario_entidad">Nombre del funcionario de la entidad:</label></td>
                <td><input type="text" id="nombre_funcionario_entidad" name="nombre_funcionario_entidad" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="cargo_funcionario_entidad">Cargo del funcionario de la entidad:</label></td>
                <td><input type="text" id="cargo_funcionario_entidad"
                        name="cargo_funcionario_entidad" maxlength="50"></td>
            </tr>

            <tr>
                <td><label for="nombre_funcionario_departamento">Nombre del funcionario departamental:</label></td>
                <td><input type="text" id="nombre_funcionario_departamento" name="nombre_funcionario_departamento" maxlength="100"></td>
            </tr>

            <tr>
                <td><label for="cargo_funcionario_departamento">Cargo del funcionario departamental:</label></td>
                <td><input type="text" id="cargo_funcionario_departamento" name="cargo_funcionario_departamento" maxlength="50"></td>
            </tr>

            <!--------------------------------------------------------------------------------------------->
            <tr>
                <td colspan="3">
                    <input type="submit" name="accion" value="Registrar">

                    <a href="../amb_1_index/Inicio_produccion_limpia.html">
                        <input type="button" value="Inicio">
                    </a>
                    <a href="read&delete_produccion.php">
                        <input type="button" value="Listado">
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