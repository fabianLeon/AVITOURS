
<?php

include '../conf.php';
include '../daos/dao.php';
include '../daos/daoGestion.php';
session_start();
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);
$dao->conectar();
$daoGestion = new daoGestion($dao);

if ($_POST) {
    $tipoAvion = $_POST['nuevoAvion'];
    $fecha = $_POST['fecha_ingreso'];
    $daoGestion->insertAvion($pais, $ciudad);
   // header('Location: ../gestion_ciudad.php');
}
