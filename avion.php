<html>

    <head>
        <?php include './templates/importCss.php';
        ?>
    </head>

    <body>
        <?php include('templates/header.php'); ?>
        <div class="container">
            <div class="canvas">
                <canvas id="canvas" width="600" height="600">
                    Tu navegador no soporta canvas.
                </canvas>
                <div class="col-lg-4 text-center">
                    <div id="success"></div>
                    <br><br><br><br><br><br><br><br><br><br>
                    <button type="submit" class="btn btn-xl"onclick="reservar()">Reservar</button>
                </div>
            </div>
        </div>
    </body>
    <?php
        include './controller/avion_controller.php'
    ?>
    <script> 
        var avion = <?php include './model/avion_model.php'; ?>
        var numero = <?php echo $numero?>;
    </script>
    <script src="js/avion.js"></script>
    <?php
    include './templates/importJS.php';
    ?>
</html>
