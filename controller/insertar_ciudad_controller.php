<?php

include '../conf.php';
include '../daos/dao.php';
include '../daos/daoGestion.php';
session_start();
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);
$dao->conectar();
$daoGestion = new daoGestion($dao);

if ($_POST) {
    $pais = $_POST['paises'];
    $ciudad = $_POST['ciudad'];
    $daoGestion->insertCiudad($pais, $ciudad);
   // header('Location: ../gestion_ciudad.php');
}

