<?php
$titulo1 = ["'Titulo Grafica 1'","'Subtitulo grafica 1'"];
$titulo2 = ["'Titulo Grafica 2'","'Subtitulo grafica 2'"];
$titulo3 = ["'Titulo Grafica 3'","'Subtitulo grafica 3'"];

$reservas = [1, 5, 6, 20, 3, 5, 2, 6, 19, 10, 12];
$compras = [1, 2, 3, 4, 3, 2, 1, 5, 4, 3, 2, 1];
$cancelaciones = [1, 5, 4, 3, 2, 1, 4, 5, 6, 7, 1, 1];
$recaudo = [15000, 140000, 1350000, 12000, 190000, 250000, 190000, 950000, 1900000, 320000, 1100000, 300000];
$tiempo = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

function toArray($array) {
    $arr = "[";
    foreach ($array as $elem) {
        $arr .= $elem . ",";
    }$arr = (substr($arr, 0, -1)) . "]";
    return $arr;
}

function toArrayString($array) {
    $arr = "['";
    foreach ($array as $elem) {
        $arr .= $elem . "','";
    }$arr = (substr($arr, 0, -2)) . "]";
    return $arr;
}
