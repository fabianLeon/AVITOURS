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
            $cliente = new nusoap_client("http://192.168.137.80:81/cardServiceSoap/producto.php");
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
                   $myfile = fopen("templates/headerReserva.html", "r") or die("Unable to open file!");
                    $mensaje_reporte = fread($myfile,filesize("templates/headerReserva.html"));
                    fclose($myfile);

                    $mensaje_reporte .= $daoReserva->getReporte($_GET['id']);

                    require_once "Mail.php";

                    $from = '<faparraf@correo.udistrital.edu.co>';
                    $to = '<fabio-parra@hotmail.com>';
                    $subject = 'Reporte de reserva';

                    $headers = array(
                        'From' => $from,
                        'To' => $to,
                        'Subject' => $subject
                    );

                    $smtp = Mail::factory('smtp', array(
                            'host' => 'ssl://smtp.gmail.com',
                            'port' => '465',
                            'auth' => true,
                            'username' => 'faparraf@correo.udistrital.edu.co',
                            'password' => '29960381408'
                        ));

                    $mail = $smtp->send($to, $headers, $mensaje_reporte);

                    if (PEAR::isError($mail)) {
                        echo('<p>' . $mail->getMessage() . '</p>');
                    } else {
                        echo('<p>Message successfully sent!</p>');
                    }
                   header('Location: reservas.php');
                }
            }
            ?>