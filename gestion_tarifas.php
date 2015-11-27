<?php ?>
<html>
    <head>
        <?php
        include ('./templates/importCss.php');
        include('templates/headerAdmin.php');
        include ('controller/vuelos_controller.php');
        include('templates/tabla.php');
        ?>
    </head>
    <body>  
        <div class="container">
            <div class="wrapper">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="panel-heading"><h2>Gesti&oacute;n de Vuelos</h2></div>
                    <div class="panel panel-warning" >
                        <div class="panel-body">
                            <form class="form-signin" name="vuelos" id="vuelos" method = "POST" action = controller/insertar_vuelo_controller.php>    


                                <div class="col-sm-6">
                                    <div class="col-sm-6">
                                        <label>Fecha de Salida</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" id="fecha_salida" name="fecha_salida" required=""/>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <label>Fecha de Llegada</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <input type="number" class="form-control" id="fecha_llegada" name="fecha_llegada" required=""/>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Hora de Salida</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control"   id="hora_salida" name="hora_salida" required="">
                                    </div>
                                    


                                </div>

                                <div class="col-sm-6 ">
                                    <div class="col-sm-6">
                                        <br>
                                        <label>Hora de Llegada</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <input type="number" class="form-control"   id="hora_llegada" name="hora_llegada" required="">

                                    </div>


                                    <div class="col-sm-6">
                                        <br>
                                        <label>Hora de Llegada</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <input type="number" class="form-control"   id="hora_llegada" name="hora_llegada" required="">

                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <label>Avion</label><br>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <select class="form-control" name="avion">
                                            <option>Seleccione ... </option>
                                            <?php foreach ($aviones as $avion) { ?>
                                                <option id= '<?php echo $avion[0]?>'> <?php echo $avion[1]?> </option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                    </div>
                                    
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <button type="submit" class="btn btn-xl">Nuevo Vuelo</button>
                                    </div>  

                                </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php
    include './templates/importJS.php';
    ?>
</body>
</html>
