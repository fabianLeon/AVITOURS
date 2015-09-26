<?php
session_start();
?>
<html>
    <head>

        <?php
        include './templates/importCss.php';
        include('templates/header.php');
        ?>
    </head>
    <body>  
        <div class="container">

            <div class="wrapper">
                <div class="col-sm-6">
                    <div class="panel panel-warning" >

                        <div class="panel-heading"><h5>Vuelos</h5></div>
                        <div class="panel-body">

                            <form class="form-signin" onsubmit="return nuevoEgresado();" method = "POST" action = DB/procesarNuevo.php>      


                                <div class="col-sm-6">
                                    <input type="radio" name="titulos[]" value="ida">   Ida

                                    <br><br>
                                    <input type="text" class="form-control" name="origen" placeholder="Ciudad de Origen" required=""/>
                                    <br>
                                    <p>Fecha de Salida</p>

                                    <input type="date" class="form-control" name="fecha_salida" required=""/>
                                    <br>
                                    <p>Pasajeros</p>
                                    <br>
                                    <input type="number" value="1" class="form-control" name="" required=""/>
                                </div>
                                <div class="col-sm-6">
                                    <input type="radio" name="titulos[]" value="ida y regreso">   Ida y Regreso
                                    <br><br>
                                    <input type="text" class="form-control" name="destino" placeholder="Ciudad de Destino" required=""/>
                                    <br>
                                    <p>Fecha de Regreso</p>
                                    <input type="date" class="form-control" name="fecha_regreso" required=""/>
                                    <div class="col-sm-2"> </div> 
                                    <div class="col-sm-8" > 
                                        <br><br><br>
                                        <button class= "btn btn-lg btn-warning btn-block" type="submit">Buscar</button>  
                                    </div>
                                    <div class="col-sm-2"> </div>
                                </div>

                        </div>

                    </div>
                    </form>
                </div>
            </div> 
        </div>
    </body>
    <?php
    include './templates/importJS.php';
    ?>
</html>   
