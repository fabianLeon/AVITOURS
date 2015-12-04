<?php

include '../conf.php';
include '../daos/dao.php';
include './daos/daoReserva.php';

session_start();
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

$dao->conectar();
$daoReserva = new daoReserva($dao);

if ($_POST){
    require_once "lib/nusoap.php";
    $cliente = new nusoap_client("http://192.168.137.80:81/cardServiceSoap/producto.php");
      
    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }
    $total = $daoReserva->getTotalReserva($_GET['id']);
    $tarjeta = $daoReserva->getTarjetaCredito($_GET['id']);
    $result = $cliente->call("pago", array("categoria" => "$tarjeta,$total"));
      
    if ($cliente->fault) {
        echo "<h2>Fault</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
    else {
        $error = $cliente->getError();
        if ($error) {
            echo "<h2>Error</h2><pre>" . $error . "</pre>";
        }
        else {
            echo "<h2>Libros</h2><pre>";
            echo $result;
            echo "</pre>";
        }
    }
    header('Location: ../reservas.php');
    
}
