<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 04/20/2020
 * Time: 8:52 AM
 */
?>

<!DOCTYPE html>
<head>
    <title>Grafico|Invoice</title>
    <script type = "text/javascript" src = "../../../libraries/loader.js">
    </script>
    <script type = "text/javascript">
    google.charts.load('current', {packages: ['corechart']});
    </script>
</head>

<body>
<div id = "container" style = "width: 800px; height: 400px; margin: 0 auto">
</div>
<script language = "JavaScript">
    function drawChart() {
        // Define the chart to be drawn.
        var data = google.visualization.arrayToDataTable([
                ['Mes', 'Total'],
                ['Jan',  900],
                ['Fev',  1000],
                ['Mar',  1170],
                ['Abr',  1250],
                ['Mai',  120],
                ['Jun',  1250],
                ['Jul',  150],
                ['Ago',  2250],
                ['Set',  9250],
                ['Out',  11250],
                ['Nov',  35250],
                ['Dez',  530]
            ]);

        var options = {title: 'Vendas Mensais'};

        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart
            (document.getElementById('container'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart);
</script>
</body>
</html>

