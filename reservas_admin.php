<?php ?>
<html>
    <head>
        <?php
        include './templates/importCss.php';
        include('templates/headerAdmin.php');
        include ('./controller/reserva_admin_controller.php');
        include('./templates/tabla.php');
        ?>
    </head>
    <body>  
        <div class="container">

            <div class="wrapper">
                <div class="panel-heading"><h2>Reservas</h2></div>
                <?php
                $tabla = new Tabla($titulos, $tablaReservas);
                $tabla->escribirRegistros2();
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

