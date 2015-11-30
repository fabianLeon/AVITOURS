<html>
    <head>
        <?php include './templates/importCss.php'; ?>
    </head>
    <body>
        <?php
        include('templates/header.php');
        $sillas = split(",", $_GET['nombres']);
        $no = count($sillas);
        ?>
        <div class="container">
            <form class="form-signin" method = "POST" action = ./controller/insert_reserva_controller.php>
                <?php
                for ($i = 0; $i < $no - 1; $i ++) {
                    ?>
                    <div class="panel panel-warning" >
                        <div class="panel-heading"><h5><?php echo ("Informaci&oacute;n de pasajero de la Silla " . $sillas[$i]); ?></h5></div>
                        <div class="panel-body">

                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="<?php echo ($sillas[$i] . "nombre1"); ?>" required="" placeholder="Primer Nombre *"/>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="<?php echo ($sillas[$i] . "nombre2"); ?>" placeholder="Segundo Nombre"/>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="<?php echo ($sillas[$i] . "apellido1"); ?>" required="" placeholder="Primer Apellido *"/>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="<?php echo ($sillas[$i] . "apellido2"); ?>" required="" placeholder="Segundo Apellido *"/>
                            </div>
                            <div class="col-sm-2">
                                <div class="col-sm-4">
                                    <input type="radio" name="<?php echo ($sillas[$i] . "tipo[]"); ?>" value="ti">T.I.
                                </div>
                                <div class="col-sm-4">
                                    <input type="radio" name="<?php echo ($sillas[$i] . "tipo[]"); ?>" value="cc" checked="true">C.C.
                                </div>
                                <div class="col-sm-4">
                                    <input type="radio" name="<?php echo ($sillas[$i] . "tipo[]"); ?>" value="pp">P.P.
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="<?php echo ($sillas[$i] . "documento"); ?>" required="" placeholder="No. de Documento *"/>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <input type="hidden" name="nombres" value="<?php echo $_GET['nombres'] ?>"/>
                <input type="hidden" name="vuelos_ida" value="<?php echo $_GET['vuelos_ida'] ?>"/>

                <div class="col-sm-8 col-sm-offset-2">
                    <div class="panel-heading"><h2>Medio de Pago</h2></div>
                    <div class="panel panel-warning">
                        <div class="panel-body">  
                            <div class="col-sm-6">
                                <h5>Tarjeta</h5><br>

                                <div class="col-sm-6">
                                    <img src="img/master-card.png" alt="..." class="thumbnail" style="width: 100px; height: 70px">
                                    <div>
                                        <input type="radio" name="franquicia[]" value="Master Card">
                                        <label>Master Card</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <img src="img/visa.png" alt="..." class="thumbnail" style="width: 100px; height: 70px">
                                    <div>
                                        <input type="radio" name="franquicia[]" value="Visa">
                                        <label>Visa</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <img src="img/dinners.png" alt="..." class="thumbnail" style="width: 100px; height: 70px">
                                    <div>
                                        <input type="radio" name="franquicia[]" value="Dinners Club">
                                        <label>Dinners Club</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <img src="img/american.png" alt="..." class="thumbnail" style="width: 100px; height: 70px">
                                    <div>
                                        <input type="radio" name="franquicia[]" value="american">
                                        <label>American Express</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="tarjeta" required="" placeholder="Tarjeta de Credito *"/>

                                <br><label>fecha de vencimiento</label>
                                <div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="mes" min="1" max="12" required="" placeholder="Mes *"/>
                                    </div><div class="col-sm-6">
                                        <input type="number" class="form-control" name="ano" required="" min="2015" max="2016" placeholder="A&ntilde;o *"/>
                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-6">
                                <h5>Titular</h5><br>
                                <input type="text" class="form-control" name="priNombre" required="" placeholder="Primer Nombre *"/><br>
                                <input type="text" class="form-control" id="segNombre" name="segNombre" required="" oninput="eliminar_ultimo()" placeholder="inicial Segundo Nombre *"/><br>
                                <input type="text" class="form-control" name="priapellido" required="" placeholder="Primer apellido *"/><br>
                                <input type="text" class="form-control" name="telefono" required="" placeholder="Telefono *"/><br>
                                <input type="email" class="form-control" name="email" required="" placeholder="Email *"/>

                                <br>
                                <div class="col-sm-6">
                                    <label>Tipo Documento</label><br>
                                    <select class="form-control" id="sel1">
                                        <option>Seleccione ... </option>
                                        <option>CC</option>
                                        <option>TI</option>
                                        <option>PP</option>
                                        <option>LM</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Numero</label><br>
                                    <input type="text" class="form-control" name="numero_documento" required="" placeholder="No. Documento *"/>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <button type="submit" class="btn btn-xl">Reservar</button>
                </div>
            </form>
        </div>

    </body>
    <script>
        function eliminar_ultimo(){
            var segNombre = document.getElementById('segNombre');
            segNombre.value = (segNombre.value).substring(-1,1);
            
        }
        $('.selectpicker').selectpicker();
    </script>
    <?php include './templates/importJS.php'; ?>
</html>
