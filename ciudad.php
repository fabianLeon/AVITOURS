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
                <div class="panel-heading"><h2>Gesti&oacute;n de Ciudades</h2></div>
                <div class="panel panel-warning" >
                    <div class="panel-body">
                        <form class="form-signin" name="vuelos" id="vuelos" method = "POST" action = home.php>    
                            <div class="col-sm-4">
                                <label>PAIS</label><br>
                                <select class="form-control" id="pais[]">
                                    <option>Seleccione ... </option>
                                    <?php foreach ($pais as $paises) { ?>
                                        <option id= '<?php echo $pais . id ?>'> <?php echo $pais . value ?> ></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>CIUDAD</label><br>
                                <input type="text" class="form-control" name="ciudad" required="" placeholder="Ingrese Ciudad *"/>
                            </div>
                            <div class="col-sm-4">
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
        <?php
        include './templates/importJS.php';
        ?>
    </body>
</html>
