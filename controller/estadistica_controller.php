<?php

include 'conf.php';
include 'daos/dao.php';
include 'daos/daoGestion.php';

session_start();
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);
$dao->conectar();
$daoGestion = new daoGestion($dao);


//titulos de las graficas
$titulo1 = ["'Titulo Grafica 1'", "'Subtitulo grafica 1'"];
$titulo2 = ["'Titulo Grafica 2'", "'Subtitulo grafica 2'"];
$titulo3 = ["'Top 5 Viajeros Frecuentes'", "'Nuestros Viajeros Frecuentes'"];
$titulo4 = ["'Top 5 Destinos Frecuentes'", "'Nuestros Destinos Frecuentes'"];


// grafica de ventas
$ventas = $daoGestion->getVentas();

$tiempo = $ventas[1];
$recaudo = $ventas[0];
for ($i=0;$i<count($recaudo);$i++){
    if($recaudo[$i]==''){
        $recaudo[$i]=0;
    }
}
//var_dump($recaudo);

$reservas = $daoGestion->getTotalEstados("VIGENTE")[0];
$compras = $daoGestion->getTotalEstados("PAGADA")[0];
$cancelaciones = $daoGestion->getTotalEstados("CANCELADA")[0];

for ($i=0;$i<count($reservas);$i++){
    if($reservas[$i]==''){
        $reservas[$i]=0;
    }
}
for ($i=0;$i<count($compras);$i++){
    if($compras[$i]==''){
        $compras[$i]=0;
    }
}
for ($i=0;$i<count($cancelaciones);$i++){
    if($cancelaciones[$i]==''){
        $cancelaciones[$i]=0;
    }
}
//top 5 de usuarios
$top5Usuarios = $daoGestion->get_top5_usuarios();
$top5 = $top5Usuarios[0];
$comprasTop5 = $top5Usuarios[1];

// top 5 de ciudades
$top5_destinos = $daoGestion->get_top5_ciudad();
$top5destinos = $top5_destinos[0];
$destinosTop5 = $top5_destinos[1];

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
