<?php

$vuelo = split("_", $_GET['vuelos_ida']);
$avion1 = $daoAvion->getSillasReserva($vuelo[0]);
$avion2 = $daoAvion->getSillasReserva($vuelo[0]);
$avion3 = $daoAvion->getSillasReserva($vuelo[0]);
function getAviones($avion){
    $fila = count($avion);
    $column = count($avion[0]);
    for ($i = 0; $i < $fila; $i++) {
        if ($i == 0) {
            echo "[";
        }
        echo "[";
        for ($j = 0; $j < $column; $j++) {
            $temp = split(' ', $avion[$i][$j]);
            echo("'" . $temp[0] . "*" . $temp[1] . "'");
            if ($j < ($column - 1)) {
                echo ",";
            } else {
                echo "]";
            }
            if ($j + 1 === ($column / 2)) {
                echo "'',";
            }
        }
        if ($i < $fila - 1) {
            echo ",";
        } else {
            echo "]";
        }
    }
    echo ";";
}

?>