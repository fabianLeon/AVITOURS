<?php

include '../conf.php';
include '../daos/dao.php';
include '../daos/daoReserva.php';
include '../model/reserva.php';

session_start();
$dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

$dao->conectar();
$daoReserva = new daoReserva($dao);
if ($_POST) {
    //validacion de medio de pago
    require_once "../lib/nusoap.php";
    $cliente = new nusoap_client("http://192.168.137.80:81/cardServiceSoap/producto.php");
    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }
    $franquicia = $_POST['franquicia'][0];
    $tarjeta = $_POST['tarjeta'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $priNombre = $_POST['priNombre'];
    $s = $_POST['segNombre'];
    $numero_documento = $_POST['numero_documento'];
    $priapellido = $_POST['priapellido'];

    $result = $cliente->call("pago", array("categoria" => "$numero_documento,$franquicia,$tarjeta,$mes,$ano,$priNombre,$s,$priapellido"));
    echo $result;

    //datos para reserva
    $sillas = split(",", $_POST['nombres']);
    $no = count($sillas);
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $tarjeta = $_POST['tarjeta'];
    $vuelos = split("_", $_POST['vuelos_ida']);
    $reserva = new Reserva(0, 1, 1, 'now()', $telefono, $email, $tarjeta);

    if ($result == "Validacion Exitosa") {
        $daoReserva->insertReserva($reserva);

        for ($i = 0; $i < $no - 1; $i++) {
            $daoReserva->insertSillaReserva($reserva->k_reserva, $sillas[$i], $reserva->k_vuelo);
        }
        header('Location: ../reservas.php?result = Validacion Exitosa');
    } else {
        header('Location: ../reservas.php?result=' . $result);
    }
}

