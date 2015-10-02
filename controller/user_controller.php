<?php

require_once('../conf.php');
require_once('../daos/dao.php');
require_once('../daos/daoUsuario.php');
session_start();
	
	$dao = new dao(DB_HOST,DB_USER_CREATOR, DB_PASSWORD_CREATOR, DB_NAME);
	$dao->conectar();
	$daoUsuario = new daoUsuario($dao);
	$daoUsuario->crearUsuario($_GET['email'],$_GET['pass']);
    
    $daoUsuario->insertInfoUsuario($_GET['email'],$_GET['nombre1'],$_GET['nombre2'],$_GET['apellido1'],$_GET['apellido2'],$_GET['phone']);
    $dao->cerrarConexion();

    $_SESSION['db_user'] = $_GET['email'];
    $_SESSION['db_pass'] = $_GET['pass'];

    header('Location: ../home.php');


?>