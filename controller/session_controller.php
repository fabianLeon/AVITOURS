<?php

require_once('../conf.php');
session_start();
if (isset($_GET)){
	$_SESSION['db_user'] = $_GET['db_user'];
    $_SESSION['db_pass'] = $_GET['db_pass'];

    header('Location: ../home.php');
}else{
    
    $_SESSION['db_user'] = DB_USER_CONS;
    $_SESSION['db_pass'] = DB_PASSWORD_CONS;
    
    header('Location: ../home.php');
}

?>