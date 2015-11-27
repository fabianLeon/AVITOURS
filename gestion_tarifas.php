<?php ?>
<html>
    <head>
        <?php
        include ('./templates/importCss.php');
        include('templates/headerAdmin.php');
        include ('controller/tarifa_controller.php');
        include('templates/tabla.php');
        ?>
    </head>
    <body>  
        <div class="container">
            <div class="wrapper">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="panel-heading"><h2>Gesti&oacute;n de tarifas</h2></div>
                    <div class="panel panel-warning" >
                        <div class="panel-body">
                            <form class="form-signin" name="vuelos" id="vuelos" method = "POST" action = controller/insertar_vuelo_controller.php>    


                                <div class="col-sm-6">
                                    <div class="col-sm-6">
                                        <label>Economica Promo</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" min="0" class="form-control" id="fecha_salida" name="tarifaEconomiaPromo" required=""/>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <label>Economica Flexi</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <input type="number" min="0" class="form-control" id="fecha_llegada" name="fecha_llegada" required=""/>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Economica Sin Restricciones</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" min="0" class="form-control"   id="hora_salida" name="hora_salida" required="">
                                    </div>
                                    


                                </div>
                                 
                                <div class="col-sm-6">
                                    <div class="col-sm-6">
                                        <label>Ejecutiva Flexi</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" min="0" class="form-control" id="fecha_salida" name="tarifaEconomiaPromo" required=""/>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <label>Ejecutiva Promo</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <input type="number" min="0" class="form-control" id="fecha_llegada" name="fecha_llegada" required=""/>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Ejecutiva Sin Restricciones</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" min="0" class="form-control"   id="hora_salida" name="hora_salida" required="">
                                    </div>
                                    


                                </div>

                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <br>
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-xl">Guardar</button>
                                    </div>  

                                </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    
    
            <div class="col-sm-8 col-sm-offset-2">
                <?php
                $titulos = ["ID", "Origen", "Destino", "Fecha Salida", "Fecha LLegada", "Duracion", "Economica Promo", "Economica Flexi", "Economica Sin Restricciones", "Ejecutiva Flexi", "Ejecutiva Promo", "Ejecutiva Sin Restriccion"];
                $tabla = new Tabla($titulos,  $tablaVuelosGuardados);
                $tabla->escribirRegistros2();
                echo ($tabla->getTabla());
                ?>
                
                </div>
    
    
            </form>    <?php
    include './templates/importJS.php';
    ?>
</body>
</html>
