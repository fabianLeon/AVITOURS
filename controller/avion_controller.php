<?php

$numero = $_SESSION['Numero_pasajeros'];

include 'daos/dao.php';
include 'conf.php';
include 'daos/daoGestion.php';

$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);
$dao->conectar();
$daoGestion = new daoGestion($dao);

$aviones = $daoGestion->getTipoAvion();
