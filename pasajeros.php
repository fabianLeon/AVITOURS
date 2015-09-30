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
            <form class="form-signin" method = "POST" action = home.php>
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
                                <input type="text" class="form-control" name="<?php echo ($sillas[$i] . "apellido2"); ?>" required="" placeholder="Primer Apellido *"/>
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
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <button type="submit" class="btn btn-xl">Reservar</button>
                </div>
            </form>
        </div>

    </body>
    <?php
    include './templates/importJS.php';
    ?>
</html>
