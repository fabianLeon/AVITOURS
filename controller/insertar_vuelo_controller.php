<?php
include '../conf.php';
include '../daos/dao.php';
include '../daos/daoGestion.php';
session_start();
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);
$dao->conectar();
$daoGestion = new daoGestion($dao);

if ($_POST) {
    $f_salida = $_POST['fecha_salida'];
    $f_llegada = $_POST['fecha_llegada'];
    $h_salida = $_POST['hora_salida'];
    $h_llegada = $_POST['hora_llegada'];
    $c_origen = $daoGestion->getIdCiuadad($_POST['ciudad_origen'])[0][0];
    $c_destino = $daoGestion->getIdCiuadad($_POST['ciudad_destino'])[0][0];
    $avion = split(" - ", $_POST['avion'])[1];
    echo "<br>".$h_salida." ".$h_llegada."<br>";
    echo $f_salida." ".$f_llegada."<br>";
    echo $c_origen." ".$c_destino."<br>";
    echo $avion."<br>";
    
    $daoGestion->insertVuelo2($f_salida .' '. $h_salida, $f_llegada.' '. $h_llegada,$c_origen,$c_destino,$avion);
    header('Location: ../gestion_vuelo.php');
}

