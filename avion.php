<html>
    <head>
        <?php include './templates/importCss.php'; ?>
    </head>
    <script> var avion = <?php include './model/avion_model.php'; ?></script>
    <script src="js/avion.js"></script>
    <body>
        <!-- Navigation -->
        <?php include('templates/header.php'); ?>

        <div class="container">
            <div class="canvas">
                <canvas id="canvas" width="600" height="600">
                    Tu navegador no soporta canvas.
                </canvas>
                <button type="submit" class="btn btn-warning" onclick="reservar()">Reservar</button>
            </div>
        </div>
    </body>
    <?php
    include './templates/importJS.php';
    ?>
</html>
