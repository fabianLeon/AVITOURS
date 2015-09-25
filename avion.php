<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>AVITOURS</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/agency.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

        <link rel="stylesheet"href="css/style.css"/>
    </head>
    <script>
        var avion =
<?php
$avion = [
    [0, 0, 2, 2, 0, 0],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 1],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 0],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 0],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 1],
    [0, 0, 2, 2, 0, 0],
    [0, 1, 2, 2, 1, 0],
    [0, 0, 2, 2, 0, 0],
    [0, 1, 2, 2, 0, 0],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 1],
    [0, 0, 2, 2, 0, 0],
    [0, 1, 2, 2, 1, 0],
    [0, 0, 2, 2, 0, 0], [0, 1, 2, 2, 0, 0],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 1],
    [0, 0, 2, 2, 0, 0],
    [0, 1, 2, 2, 1, 0],
    [0, 0, 2, 2, 0, 0], [0, 1, 2, 2, 0, 0],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 1],
    [0, 0, 2, 2, 0, 0],
    [0, 1, 2, 2, 1, 0],
    [0, 0, 2, 2, 0, 0],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 0],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 1],
    [0, 0, 2, 2, 0, 0],
    [0, 1, 2, 2, 1, 0],
    [0, 0, 2, 2, 0, 0], [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 0],
    [0, 0, 2, 2, 1, 0],
    [0, 1, 2, 2, 0, 1],
    [0, 1, 2, 2, 0, 1]
];
$columnas = count($avion);
$filas = count($avion[0]);

for ($i = 0; $i < $columnas; $i++) {
    if ($i == 0) {
        echo "[";
    }
    echo "[";
    for ($j = 0; $j < $filas; $j++) {
        echo $avion[$i][$j];
        if ($j < ($filas - 1)) {
            echo ",";
        } else {
            echo "]";
        }
    }
    if ($i < $columnas - 1) {
        echo ",";
    } else {
        echo "]";
    }
}
echo ";";
?>


        var sup_izq = [260, 85];
        var sup_der = [339, 85];

        var inf_izq = [260, 415];
        var inf_der = [339, 415];
        var ancho = sup_der[0] - sup_izq[0];
        var alto = inf_der[1] - sup_izq[1];
        var tamX = ancho / avion[0].length;
        var tamY = alto / avion.length;

        document.addEventListener("DOMContentLoaded", init, false);

        function init()
        {

            var canvas = document.getElementById("canvas");
            var c = canvas.getContext('2d');
            canvas.addEventListener("mousedown", getPosition, false);

            for (var i = 0; i < avion.length; i++) {
                for (var j = 0; j < avion[i].length; j++) {
                    if (avion[i][j] == 0) {
                        c.beginPath();
                        c.fillStyle = '#F5D76E';
                        c.rect(sup_izq[0] + tamX * j, sup_izq[1] + tamY * i, tamX, tamY);
                        c.fill();
                        c.strokeStyle = '#FFF'
                    } else if (avion[i][j] == 1) {
                        c.beginPath();
                        c.fillStyle = '#F39C12';
                        c.rect(sup_izq[0] + tamX * j, sup_izq[1] + tamY * i, tamX, tamY);
                        c.fill();
                        c.strokeStyle = '#FFF'
                    }
                }
            }
        }

        function getPosition(event)
        {
            var x = new Number();
            var y = new Number();
            var canvas = document.getElementById("canvas");

            if (event.x != undefined && event.y != undefined)
            {
                x = event.x;
                y = event.y;
            }
            else // Firefox method to get the position
            {
                x = event.clientX + document.body.scrollLeft +
                        document.documentElement.scrollLeft;
                y = event.clientY + document.body.scrollTop +
                        document.documentElement.scrollTop;
            }

            x -= canvas.offsetLeft;
            y -= canvas.offsetTop;

            if ((x > sup_izq[0]) && (x < sup_der[0]) && (y < inf_der[1]) && (y > sup_der[1])) {
                x = Math.floor((x - sup_izq[0]) / tamX);
                y = Math.floor((y - sup_izq[1]) / tamY);

                if (avion[y][x] == 0) {
                    alert(x + " " + y + " La silla esta libre y puede reservarse :)");
                } else if (avion[y][x] == 1) {
                    alert(x + " " + y + " La silla ya ha sido reservada :(");
                }
            }
        }

    </script>



       <body>
        <!-- Navigation -->
        <?php include('templates/header.php'); ?>


        <div class="canvas">
            <canvas id="canvas" width="600" height="600">
                Tu navegador no soporta canvas.
            </canvas>
        </div>

    </body>

</html>
