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
                <div class="panel panel-warning" >
                    <div class="panel-body">
                        <form class="form-signin" method = "POST" action = home.php>    
                            <div class="col-sm-2">
                                <div class="col-sm-1">
                                    <input type="radio" name="titulos[]" value="ida">
                                </div><p>ida</p>
                                <input type="text" class="form-control" name="origen" placeholder="Ciudad de Origen" required=""/>
                            </div>
                            <div class="col-sm-2">
                                <div class="col-sm-1">
                                    <input type="radio" name="titulos[]" value="ida y regreso">
                                </div><p>ida-regreso</p>
                                <input type="text" class="form-control" name="destino" placeholder="Ciudad de Destino" required=""/>
                            </div>
                            <div class="col-sm-2">
                                <p>Fecha de Salida</p>
                                <input type="date" class="form-control" name="fecha_salida" required=""/>
                            </div>
                            <div class="col-sm-2"> 
                                <p>Fecha de Regreso</p>
                                <input type="date" class="form-control" name="fecha_regreso" required=""/>
                            </div>
                            <div class="col-sm-2">
                                <p>Pasajeros</p>
                                <input type="number" value="1" class="form-control" name="" required=""/>
                            </div>
                            <div class="col-sm-2">
                                <br>
                                <button class= "btn btn-lg btn-warning btn-block" type="submit">Buscar</button>  
                            </div>

                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </body>
    <?php
    include './templates/importJS.php';
    ?>
</html>   
