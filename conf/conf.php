<?php

/**
 * Archivo de configuracion para la aplicacion modularizada.
 * Define valores por defecto y datos para cada uno de los modulos.
*/
/**
*host de la base de datos
*/
define('DB_HOST','localhost');
/**
*nombre de la base de datos
*/
define('DB_NAME','db_avitours');
/**
*id operador por defecto
*/
define('OPERADOR_DEFECTO',1);
/**
*direccion de correo
*/
define('MAIL_ADDRESS','prueba@avitour.com.co');
/**
*direccion de correo
*/
define('DB_USER','u_avitour_creador_cliente');
/**
*direccion de correo
*/
define('DB_PASSWORD','u_avitour_creador_cliente');
/**
*validacion por ip
*/
define('VALIDAR_IP','no');

include('./daos/dao.php');
 
?>
