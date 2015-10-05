<?php

include './conf.php';
include './daos/dao.php';
include './daos/daoReserva.php';
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

$dao->conectar();
$daoReserva = new daoReserva($dao);

if ($_POST || $_GET){
    
    
}else{
    $res= $daoReserva->getReservas("");
    $tablaReservas = $dao->transformarResultado($res);
    $titulos = $dao->getTitulos($res);
}

