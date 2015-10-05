<?php

require_once('../conf.php');
include '../daos/dao.php';
session_start();
if ($_GET) {
    try {
        $_SESSION['db_user'] = $_GET['db_user'];
        $_SESSION['db_pass'] = $_GET['db_pass'];
        $dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);
        $dao->conectar();
        $dao->cerrarConexion();
        if ($dao->link != false) {
            header('Location: ../home.php');
        } else {
            echo '<script>window.alert("Usuario o clave invalida");</script>';
            //header('Location: ../index.php');		
        }
    } catch (Exception $e) {
        header('Location: ../index.php');
    }
} else {

    $_SESSION['db_user'] = DB_USER_CONS;
    $_SESSION['db_pass'] = DB_PASSWORD_CONS;
    header('Location: ../home.php');
}
?>