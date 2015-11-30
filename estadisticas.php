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
                        valueSuffix: ' Pesos($)'
                    },
//                    
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

            $(function () {
                $('#container3').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: <?PHP echo $titulo3[0] ?>
                    },
                    subtitle: {
                        text: <?PHP echo $titulo3[1] ?>
                    },
                    xAxis: {
                        categories: <?PHP echo toArrayString($top5) ?>,
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Population (millions)',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' Viales'
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                            name: 'No. de Viajes',
                            data: <?PHP echo toArray($comprasTop5) ?>
                        }]
                });
            });

            $(function () {
                $('#container4').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: <?PHP echo $titulo4[0] ?>
                    },
                    subtitle: {
                        text: <?PHP echo $titulo4[1] ?>
                    },
                    xAxis: {
                        categories: <?PHP echo toArrayString($top5destinos) ?>,
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Population (millions)',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' Viales'
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                            name: 'No. de Viajes',
                            data: <?PHP echo toArray($destinosTop5) ?>
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
            <div class="panel-heading"><h2>Tabla 1</h2></div>
            <div class="panel panel-warning" >
                <div class="panel-body">
                    <div id="container1"></div>
                </div>
            </div>
            <div class="panel-heading"><h2>Tabla 2</h2></div>
            <div class="panel panel-warning" >
                <div class="panel-body">
                    <div id="container2"></div>
                </div>
            </div>
            <div class="panel-heading"><h2>Top 5 - viajeros Frecuentes</h2></div>
            <div class="panel panel-warning" >
                <div class="panel-body">
                    <div id="container3"></div>
                </div>
            </div>
            
            <div class="panel-heading"><h2>Top 5 Destinos Frecuentes</h2></div>
            <div class="panel panel-warning" >
                <div class="panel-body">
                    <div id="container4"></div>
                </div>
            </div>
        </div>

    </body>
</html>   
