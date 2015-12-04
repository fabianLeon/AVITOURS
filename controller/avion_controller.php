<?php

$numero = $_SESSION['Numero_pasajeros'];

include 'daos/dao.php';
include 'conf.php';
include 'daos/daoAvion.php';

$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);
$dao->conectar();
$daoAvion = new daoAvion($dao);