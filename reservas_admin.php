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
            <div class="panel panel-warning" >
                <div class="panel-body">
                    <form class="form-signin" name="vuelos" id="vuelos" method = "POST" action = controller/insertar_vuelo_controller.php>    


                        <div class="col-sm-6">
                            <div class="col-sm-6">
                                <label>Fecha de Salida</label><br>
                            </div>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" required=""/>
                            </div>
                            <div class="col-sm-6">
                                <br>
                                <label>Fecha de Llegada</label><br>
                            </div>
                            <div class="col-sm-6">
                                <br><input type="date" class="form-control" id="fecha_salida" name="fecha_salida" required=""/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <br><button type="submit" class="btn btn-xl">Buscar</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
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

