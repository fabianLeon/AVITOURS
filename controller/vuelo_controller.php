<?php

include './conf.php';
include './daos/dao.php';
include './daos/daoVuelo.php';
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

$dao->conectar();
$daoVuelo = new daoVuelo($dao);
$tablaVuelos = $daoVuelo->getVuelosTarifas("1=1");

if ($_POST){
    $titulos        = $post["titulos"];
    $clase          = $post["clase"];
    $hora_inicio    = $post["hora_inicio"];
    $hora_fin       = $post["hora_fin"];
    $origen         = $post["origen"];
    $destino        = $post["destino"];
    $fecha_salida   = $post["fecha_salida"];
    $fecha_regreso  = $post["fecha_regreso"];
    $pasajeros      = $post["pasajeros"];
}