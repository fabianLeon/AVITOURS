<?php

include '../conf.php';
include '../daos/dao.php';
include '../daos/daoReserva.php';
include '../model/reserva.php';
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

$dao->conectar();
$daoReserva = new daoReserva($dao);

if ($_POST){
    $sillas = split(",", $_POST['nombres']);
    $no = count($sillas);
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $tarjeta = $_POST['tarjeta'];
    $vuelos= split("_", $_POST['vuelos_ida']);
    $reserva = new Reserva(0, $vuelos[0], $vuelos[1], 'now()', $telefono, $email, $tarjeta);
    $daoReserva->insertReserva($reserva);
    for($i=0;$i<$no;$i++){
        
    }
    
}else{
    $res= $daoReserva->getReservas("");
    $tablaReservas = $dao->transformarResultado($res);
    $titulos = $dao->getTitulos($res);
}

