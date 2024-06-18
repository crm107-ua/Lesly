<script src="/js/highcharts/highmaps.js"></script>
<script src="/js/highcharts/exporting.js"></script>
<script src="/js/highcharts/world-robinson-highres.js"></script>
<script src="/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>

<style>
    #mapa-container {
        height: 100%;
        width: 100%;
        margin: 0 auto;
    }

    .loading {
        margin-top: 20em;
        text-align: center;
        color: gray;
    }
</style>


<script>
    var data = [];

    for (var dato in <?php echo json_encode($datos) ?>) {
        data.push([dato, <?php echo json_encode($datos) ?>[dato]])
    }

    console.log(data)

    // Create the chart
    Highcharts.mapChart('mapa-container', {
        chart: {
            map: 'custom/world-robinson-highres',
            backgroundColor: 'white'
        },

        title: {
            text: 'Tu música ha llegado a estos paises'
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'top'
            }
        },

        colorAxis: {
            min: 0,
        },

        series: [{
            data: data,
            name: 'Reproducciones',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            dataLabels: {
                enabled: false,
                format: '{point.name}'
            }
        }]
    });
</script>