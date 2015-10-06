<html>
    <head>
        <?php
        include './templates/importCss.php';
        include('templates/header.php');
        include('conf.php');
        include('daos/dao.php');
        include('daos/daoReserva.php');
        
        $dao = new dao(DB_HOST, $_SESSION['db_user'], $_SESSION['db_pass'], DB_NAME);

        $dao->conectar();
        $daoReserva = new daoReserva($dao);

        $total = $daoReserva->getTotalReserva($_GET['id']);
        $tarjeta = $daoReserva->getTarjetaCredito($_GET['id']);
        $pagar = $tarjeta[0] . "," . $total[0];
        ?>
    </head>
    <body>  
        <div class="container">
            <?php
            require_once "lib/nusoap.php";
            $cliente = new nusoap_client("http://192.168.43.53:81/cardServiceSoap/producto.php");
            $error = $cliente->getError();
            if ($error) {
                echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
            }

            $result = $cliente->call("pago", array("categoria" => $pagar));
            if ($cliente->fault) {
                echo "<h2>Fault</h2><pre>";
                print_r($result);
                echo "</pre>";
            } else {
                $error = $cliente->getError();
                if ($error) {
                    echo "<h2>Error</h2><pre>" . $error . "</pre>";
                } else {
                    echo "<h2>Pago con Tarjeta de Credito</h2><pre>";
                    echo $result;
                    echo "</pre>";
                }
                if(split(" ", $resultado)[3]!="Disponible"){
                   $daoReserva->insertPago($_GET['id']);
                   header('Location: reservas.php');
                }
            }
            ?>