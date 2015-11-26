<?php ?>
<html>
    <head>
        <?php
        include ('./templates/importCss.php');
        include('templates/headerAdmin.php');
        include ('controller/ciudad_controller.php');
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
                            <form class="form-signin" name="vuelos" id="vuelos" method = "POST" action = home.php>    

                                <div class="col-sm-6 ">
                                    <div class="col-sm-6">
                                        <label>Ciudad Origen</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="ciudad_origen[]">
                                            <option>Seleccione ... </option>
                                            <?php foreach ($ciudad as $ciudades) { ?>
                                                <option id= '<?php echo $ciudad . id ?>'> <?php echo $ciudad . value ?> ></option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                    </div>
                                    
                                        
                                    <div class="col-sm-6">
                                        <label>Ciudad Destino</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="ciudad_destino[]">
                                            <option>Seleccione ... </option>
                                            <?php foreach ($ciudad as $ciudades) { ?>
                                                <option id= '<?php echo $ciudad . id ?>'> <?php echo $ciudad . value ?> ></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <label>Ciudad Destino</label><br>
                                    <select class="form-control" id="pais[]">
                                        <option>Seleccione ... </option>
                                        <?php foreach ($ciudad as $ciudades) { ?>
                                            <option id= '<?php echo $ciudad . id ?>'> <?php echo $ciudad . value ?> ></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <button type="submit" class="btn btn-xl">Nueva Ciudad</button>
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
