<?php ?>
<html>
    <head>
        <?php
        include './templates/importCss.php';
        include('templates/header.php');
        include ('controller/vuelo_controller.php');
        include('templates/tabla.php');
        ?>
    </head>
    <body>  
        <div class="container">

            <div class="wrapper">
                <div class="panel-heading"><h2>Vuelos</h2></div>
                <div class="panel panel-warning" >
                    <div class="panel-body">
                        <form class="form-signin" name="vuelos" id="vuelos" method = "POST" action = home.php>    
                            <div class="col-sm-2">
                                <h5>Direcci&oacute;n</h5><br>
                                <div class="col-sm-1">
                                    <input type="radio" name="direccion[]" onclick="desactivar_regreso()"value="Ida" checked="">
                                </div><p>ida</p>
                                <div class="col-sm-1">
                                    <input type="radio" name="direccion[]" onclick="activar_regreso()" value="Ida y regreso">
                                </div><p>ida-regreso</p>
                            </div>
                            <div class="col-sm-2">
                                <h5>Clase</h5><br>
                                <div class="col-sm-1">
                                    <input type="radio" name="clase[]" value="ejecutivo"> 
                                </div><p>Ejecutivo</p>
                                <div class="col-sm-1">
                                    <input type="radio" name="clase[]" value="economico"  checked="">
                                </div><p>Econ&oacute;mico</p>
                            </div>

                            <div class="col-sm-2">
                                <h5>Rango Horario</h5>
                                <input type="time" class="form-control"   id="hora_inicio" name="hora_inicio" required="">
                                <br>                                  
                                <input type="time" class="form-control"   id="hora_fin" name="hora_fin" required="">
                            </div>
                            <div class="col-sm-2">
                                <p>Ciudad de Origen</p>
                                <input type="text" class="form-control" id="origen" name="origen" placeholder="Ciudad de Origen" required=""/>
                                <p>Ciudad de Destino</p>
                                <input type="text" class="form-control"  id="destino" name="destino" placeholder="Ciudad de Destino" required="" onchange="origen_destino()"/>
                            </div>
                            <div class="col-sm-2">
                                <p>Fecha de Salida</p>
                                <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" required=""/>

                                <p>Fecha de Regreso</p>
                                <input type="date" class="form-control" id="fecha_regreso" name="fecha_regreso" required=""/>
                            </div>
                            <div class="col-sm-2">
                                <p>Pasajeros</p>
                                <input type="number" value="1"  class="form-control" id="pasajeros" name="pasajeros"  required=""/>
                                <br>
                                <button class= "btn btn-lg btn-warning btn-block" type="submit">Buscar</button>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <form name="lista" id="lista" method = "GET" action="avion.php"> 
                <?php
                $titulos = ["ID", "Origen", "Destino", "Fecha Salida", "Fecha LLegada", "Duracion", "Economica Promo", "Economica Flexi", "Economica Sin Restricciones", "Ejecutiva Flexi", "Ejecutiva Promo", "Ejecutiva Sin Restriccion"];
                $tabla = new Tabla($titulos, $tablaVuelos);
                $tabla->escribirRegistros2();
                echo ($tabla->getTabla());
                ?>
                <div class="col-lg-offset-10">
                    <button class= "btn btn-lg btn-warning btn-block" type="submit">Siguiente</button>
                </div>
            </form>
        </div> 

        <script src="js/validacionVuelo.js"></script>

        <?php
            include './templates/importJS.php';
        ?>
    </body>
</html>   
