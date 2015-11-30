<?php
$titulo1 = ["'Titulo Grafica 1'","'Subtitulo grafica 1'"];
$titulo2 = ["'Titulo Grafica 2'","'Subtitulo grafica 2'"];
$titulo3 = ["'Top 5 Viajeros Frecuentes'","'Nuestros Viajeros Frecuentes'"];
$titulo4 = ["'Top 5 Destinos Frecuentes'","'Nuestros Destinos Frecuentes'"];

$reservas = [1, 5, 6, 20, 3, 5, 2, 6, 19, 10, 12];
$compras = [1, 2, 3, 4, 3, 2, 1, 5, 4, 3, 2, 1];
$cancelaciones = [1, 5, 4, 3, 2, 1, 4, 5, 6, 7, 1, 1];
$recaudo = [15000, 140000, 1350000, 12000, 190000, 250000, 190000, 950000, 1900000, 320000, 1100000, 300000];
$tiempo = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

$top5 = ['1. Fabian Leon', '2. Fabio Parra', '3. Julian Millos David', '4. Juanito Alimana', '5. Pedro Navaja'];
$comprasTop5 = [100,79,35,12,5];

$top5destinos = ['1. Medellin', '2. Cali', '3. Bucaramanga', '4. Paris', '5. Miami'];
$destinosTop5 = [30,21,14,12,11];

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
