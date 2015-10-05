<?php

include './conf.php';
include './daos/dao.php';
include './daos/daoVuelo.php';
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

$dao->conectar();
$daoVuelo = new daoVuelo($dao);

if ($_POST){
    $titulos        = $_POST["titulos"];
    $clase          = $_POST["clase"];
    $hora_inicio    = $_POST["hora_inicio"];
    $hora_fin       = $_POST["hora_fin"];
    $origen         = $_POST["origen"];
    $destino        = $_POST["destino"];
    $fecha_salida   = $_POST["fecha_salida"];
    $fecha_regreso  = $_POST["fecha_regreso"];
    $pasajeros      = $_POST["pasajeros"];
    $tablaVuelos = $daoVuelo->getVuelosTarifas("LOWER(c.n_nombre) LIKE LOWER('$origen%') "
            . "AND LOWER(c2.n_nombre) LIKE LOWER('$destino%') "
            . "AND v.d_fecha_salida BETWEEN '$fecha_salida $hora_inicio' AND '$fecha_salida $hora_fin'");
}else{
    
}

