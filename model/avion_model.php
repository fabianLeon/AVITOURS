<?php

$avion = $daoAvion->getSillasReserva($_GET['id']);
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
?>