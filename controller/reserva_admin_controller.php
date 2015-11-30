<?php

include './conf.php';
include './daos/dao.php';
include './daos/daoReserva.php';
include './model/reserva.php';
session_start();
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);
$daoReserva = new daoReserva($dao);
$dao->conectar();
if ($_POST) {
    
} else {
    $res = $daoReserva->getReservasAdmin();
    $tablaReservas = $dao->transformarResultado($res);
    $titulos = $dao->getTitulos($res);
}

