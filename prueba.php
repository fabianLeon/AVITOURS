<?php

	/**
*host de la base de datos
*/
define('DB_HOST','localhost');
/**
*nombre de la base de datos
*/
define('DB_NAME','db_avitours');
/**
*direccion de correo
*/
define('DB_USER','u_avitour_creador_cliente');
/**
*direccion de correo
*/
define('DB_PASSWORD','u_avitour_creador_cliente');
include('daos/dao.php');
include('daos/daoAvion.php');


	$db = new dao(DB_HOST,"u_avitour_creador_cliente","u_avitour_creador_cliente",DB_NAME);
	$db->conectar();
	$vuelodao = new daoAvion($db);
	
	var_dump($vuelodao->getSillasReserva("1"));
	
	
	$db->cerrarConexion();
?>