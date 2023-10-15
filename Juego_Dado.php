<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego del Dado en PHP</title>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            margin-top: 10%;
        }
        th,td {
            font-size: 30px;
        }
    </style>
</head>
<body>
    <?php
        define ('CARA1',  "&#9856;");
        define ('CARA2',  "&#9857;");
        define ('CARA3',  "&#9858;");
        define ('CARA4',  "&#9859;");
        define ('CARA5',  "&#9860;");
        define ('CARA6',  "&#9861;");
        define ('TIRADAS', 5);

        $msg = ["¡Empate!",
        "Ha ganado el Jugador 1",
        "Ha ganado el Jugador 2"];

        //Tabla de asignar caras a numeros
        $conversion = [1 => CARA1,
                        2 => CARA2,
                        3 => CARA3,
                        4 => CARA4,
                        5 => CARA5,
                        6 => CARA6,];

        $Jugador1 = GenerarValores();
        $Jugador2 = GenerarValores();

        $ganador = CalcularGanador($Jugador1,$Jugador2);
    ?>
<!-- COMIENZO DE LA TABLA HTML -->
<table>
        <tr>
            <th>Jugador 1 </th>
            <?php MostarJugador($Jugador1,$conversion) ?>
            <?php MostarPuntos($Jugador1) ?>
        </tr>
        <tr>
            <th>Jugador 2 </th>
            <?php MostarJugador($Jugador2,$conversion) ?>
            <?php MostarPuntos($Jugador2) ?>
        </tr>
        <tr>
            <th>Restultado</th>
            <?php MostarGanador($msg,$ganador) ?>
        </tr>
</table>
<!-- FIN DE TABLA HTML -->

    <?php
        //Seccion de las Funcioness
        function GenerarValores() {
            $Jugador = [];
            for ($i=0; $i < TIRADAS; $i++) { 
                $Jugador[] = random_int(1,6);
            }

            return $Jugador;
        }

        function CalcularGanador(&$J1,&$J2) {
            $ganador = 0;
            $sum1 = array_sum($J1);
            $sum2 = array_sum($J2);

            if ($sum1 > $sum2) {
                $ganador = 1;
            } elseif ($sum2 > $sum1) {
                $ganador = 2;
            }
            return $ganador;
        }

        function MostarJugador(&$Jugador,&$conversion) {
            $texto = "";
            echo "<td style='font-size:3rem;'>";
            for ($i=0; $i < count($Jugador); $i++) { 
                $texto = $texto.$conversion[$Jugador[$i]];
            }
            echo $texto;
            echo "</td>";
            
        }

        function MostarPuntos(&$Jugador) {
            echo "<th>";
            echo array_sum($Jugador)." Puntos";
            echo "</th>";
        }

        function MostarGanador(&$msg,$ganador) {
            echo "<td colspan='2'>";
            echo $msg[$ganador];
            echo "</td>";
        }
    ?>
</body>
</html>