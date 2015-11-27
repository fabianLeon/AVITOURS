
<?php ?>
<html>
    <head>
        <?php
        include ('./templates/importCss.php');
        include('templates/headerAdmin.php');
        include ('controller/avion_controller.php');
        include('templates/tabla.php');
        ?>
    </head>
    <body>  
        <div class="container">
            <div class="wrapper">
                <div class="panel-heading"><h2>Gesti&oacute;n de aviones</h2></div>
                <div class="panel panel-warning" >
                    <div class="panel-body">
                        <form class="form-signin" name="nuevoAvion" id="vuelos" method = "POST" action = controller/insertar_avion_controller.php>    
                            <div class="col-sm-4">
                                <label>TIPO AVION</label><br>
                                <select class="form-control" name="tipo_avion">
                                    <option>Seleccione ... </option>
                                    <?php foreach ($aviones as $avion) { ?>
                                        <option name= '<?php echo $avion[0]; ?>'> <?php echo $avion[1]; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>FECHA DE INGRESO</label><br>
                                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required=""/>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-xl">Nuevo avion</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        <?php
        include './templates/importJS.php';
        ?>
    </body>
</html>
