<?php

include 'conf.php';
include 'daos/dao.php';
include 'daos/daoGestion.php';
include 'daos/daoVuelo.php';
session_start();
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

$daoGestion = new daoGestion($dao);
$daoVuelo = new daoVuelo($dao);
$dao->conectar();
$ciudades = $daoGestion->getCiudades();
$aviones = $daoGestion->getAviones();

$tablaVuelosGuardados = $daoVuelo->getVuelos1();
$tablaReservas = $dao->transformarResultado($res);

