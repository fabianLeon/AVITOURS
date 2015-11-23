<?php ?>
<html>
    <head>
        <?php
        include './templates/importCss.php';
        include('templates/header.php');
        include ('./controller/reserva_controller.php');
        include('./templates/tabla.php');
        ?>
    </head>
    <body>  
        <div class="container">

            <div class="wrapper">
                <div class="panel-heading"><h2>Reservas</h2></div>
                <?php
                $tabla = new Tabla($titulos, $tablaReservas);
                $tabla->EscribirRegistros("pago.php", "");
                echo ($tabla->getTabla());
                ?>
            </div> 

        </div> 

        <script src="js/validacionVuelo.js"></script>
    </body>
    <?php
    include './templates/importJS.php';
    ?>

</html>   

