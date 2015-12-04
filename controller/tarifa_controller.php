
<?php

include './conf.php';
include './daos/dao.php';
include './daos/daoVuelo.php';
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

$dao->conectar();
$daoVuelo = new daoVuelo($dao);
$tablaVuelosGuardados = $daoVuelo->getVuelos1();

