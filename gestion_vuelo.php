<?php ?>
<html>
    <head>
        <?php
        include ('./templates/importCss.php');
        include('templates/headerAdmin.php');
        include ('controller/vuelos_controller.php');
        include('templates/tabla.php');
        ?>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <style type="text/css">
            html { height: 100% }
            body { height: 100%; margin: 0; padding: 0 }
            #map_canvas { height: 100% }
        </style>
        <script type="text/javascript"
                src="http://maps.googleapis.com/maps/api/js?sensor=false">
        </script>
        <script type="text/javascript">

            function initialize() {
                var myOptions = {
                    center: new google.maps.LatLng(40.036026, -4.965820),
                    zoom: 1,
                    mapTypeId: google.maps.MapTypeId.ROADMAP

                };

                var map = new google.maps.Map(document.getElementById("map_canvas"),
                        myOptions);

                gozilla3 = new google.maps.Marker({
                    position: new google.maps.LatLng(15.0203, 102.09),
                    icon: 'http://www.google.com/mapfiles/marker.png',
                    map: map,
                    title: 'avion'
                });
                gozilla = new google.maps.Marker({
                    position: new google.maps.LatLng(3.455371, -76.536664),
                    icon: 'http://www.google.com/mapfiles/marker.png',
                    map: map,
                    title: 'avion1'
                });
                var ruta = [
                    new google.maps.LatLng(3.455371, -76.536664),
                    new google.maps.LatLng(15.0203, 102.09)
                ];

                var lineas = new google.maps.Polyline({
                    path: ruta,
                    map: map,
                    strokeColor: '#000000',
                    strokeWeight: 4,
                    strokeOpacity: 0.8,
                    clickable: false
                });
            }
        </script>
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
                                        <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" required=""/>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <label>Fecha de Llegada</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <input type="date" class="form-control" id="fecha_llegada" name="fecha_llegada" required=""/>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Hora de Salida</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="time" class="form-control"   id="hora_salida" name="hora_salida" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <label>Hora de Llegada</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <input type="time" class="form-control"   id="hora_llegada" name="hora_llegada" required="">

                                    </div>


                                </div>

                                <div class="col-sm-6 ">
                                    <div class="col-sm-6">
                                        <label>Ciudad Origen</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="ciudad_origen">
                                            <option>Seleccione ... </option>
                                            <?php foreach ($ciudades as $ciudad) { ?>
                                                <option id= '<?php echo $ciudad[0] ?>'> <?php echo $ciudad[1] ?> </option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                    </div>


                                    <div class="col-sm-6">
                                        <label>Ciudad Destino</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="ciudad_destino">
                                            <option>Seleccione ... </option>
                                            <?php foreach ($ciudades as $ciudad) { ?>
                                                <option id= '<?php echo $ciudad[0] ?>'> <?php echo $ciudad[1] ?> </option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Avion</label><br>
                                    </div>

                                    <div class="col-sm-6">
                                        <select class="form-control" name="avion">
                                            <option>Seleccione ... </option>
                                            <?php foreach ($aviones as $avion) { ?>
                                                <option id= '<?php echo $avion[0] ?>'> <?php echo $avion[1] ?> </option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                    </div>

                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <button type="submit" class="btn btn-xl">Nuevo Vuelo</button>
                                    </div>  

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <button type="button" class="btn btn-primary" onclick="initialize()" data-toggle="modal" data-target="#modal-1">Activate the button</button>

            <div class="modal fade" id="modal-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" >&times;</button>
                            <h3 class="modal-title">This is the heading</h3>
                        </div>
                        <div class="modal-body">
                            <div id="map_canvas" style="width:100%; height:60%"></div>
                        </div>

                        <div class="modal-footer">
                            <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $titulos = ["ID", "Origen", "Destino", "Fecha Salida", "Fecha LLegada", "Duracion",];
        $tabla = new Tabla($titulos, $tablaVuelosGuardados);
        $tabla->escribirRegistros2();
        echo ($tabla->getTabla());
        ?>

        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Plugin JavaScript -->

    </body>
</html>
