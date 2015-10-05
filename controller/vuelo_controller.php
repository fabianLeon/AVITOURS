<?php

include './conf.php';
include './daos/dao.php';
include './daos/daoVuelo.php';
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

$dao->conectar();
$daoVuelo = new daoVuelo($dao);
$tablaVuelos = $daoVuelo->getVuelosTarifas("1=1");
if($_POST){
    $direccion        = $_POST["direccion"];
    $clase          = $_POST["clase"];
    $hora_inicio    = $_POST["hora_inicio"];
    $hora_fin       = $_POST["hora_fin"];
    $origen         = $_POST["origen"];
    $destino        = $_POST["destino"];
    $fecha_salida   = $_POST["fecha_salida"];
    $fecha_regreso  = $_POST["fecha_regreso"];
    $pasajeros      = $_POST["pasajeros"];
    echo $pasajeros;
    $_SESSION['Numero_pasajeros'] = $pasajeros;
}