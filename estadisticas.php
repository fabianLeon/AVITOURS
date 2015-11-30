<?php ?>
<html>
    <head>
        <?php
        include './templates/importCss.php';
        include('templates/headerAdmin.php');
        include ('controller/estadistica_controller.php');
        include('templates/tabla.php');
        ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

        <script type="text/javascript">
            $(function () {
                $('#container1').highcharts({
                    title: {
                        text: <?PHP echo $titulo1[0] ?>,
                        x: -20 //center
                    },
                    subtitle: {
                        text: <?PHP echo $titulo1[1] ?>,
                        x: -20
                    },
                    xAxis: {
                        categories: <?PHP echo toArrayString($tiempo) ?>
                    },
                    yAxis: {
                        title: {
                            text: 'Unidades'
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    tooltip: {
                        valueSuffix: ' Unidades'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: [{
                            name: 'Reservas',
                            data: <?PHP echo toArray($reservas) ?>
                        }, {
                            name: 'Compras',
                            data: <?PHP echo toArray($compras) ?>
                        }, {
                            name: 'Cancelaciones',
                            data: <?PHP echo toArray($cancelaciones) ?>
                        }]
                });
            });

            $(function () {
                $('#container2').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: <?PHP echo $titulo2[0] ?>,
                        x: -20 //center
                    },
                    subtitle: {
                        text: <?PHP echo $titulo2[1] ?>,
                        x: -20
                    },
                    xAxis: {
                        categories: <?PHP echo toArrayString($tiempo) ?>
                    },
                    yAxis: {
                        title: {
                            text: 'Efectivo'
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    tooltip: {
                        valueSuffix: '$'
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.1,
                            borderWidth: 0
                        }
                    },
                    series: [{
                            name: 'Recaudo',
                            data: <?PHP echo toArray($recaudo) ?>
                        }]
                });
            });
        </script>
    </head>
    <body style= 'margin-top: - 20px'>  
        <?php
        include './templates/importJS.php';
        ?>

        <script src="js/highcharts.js"></script>
        <script src="js/modules/exporting.js"></script>
        <div class="container">
            <div id="container1"></div>
            <br>
            <div id="container2"></div>
        </div>

    </body>
</html>   
