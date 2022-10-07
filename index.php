<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart JS PHP</title>
    <script src="chart.min.js"></script>
</head>

<body>
    <?php
        $pieChartData = [
            [
                "label" => "Candidato A",
                "value" => 1658,
                "color" => "blue"
            ],
            [
                "label" => "Candidato B",
                "value" => 1402,
                "color" => "orange"
            ],
            [
                "label" => "Candidato C",
                "value" => 958,
                "color" => "green"
            ],
            [
                "label" => "Candidato D",
                "value" => 326,
                "color" => "purple"
            ],
        ];

        $barChartData = $pieChartData;

        $lineChartData = [
            "Julho" => 32,
            "Agosto" => 28,
            "Setembro" => 42,
            "Outubro" => 38,
        ];
    ?>

    <style>
        .box-chart {
            display: inline-block;
            width: 300px;
            padding: 20px;
            border: 2px solid black;
            margin: 20px;
        }

        #bar-chart {
            width: 600px;
        }

        #line-chart {
            width: 400px;
        }
    </style>

    <div class="box-chart" id="pie-chart">
        <canvas></canvas>
    </div>

    <div class="box-chart" id="bar-chart">
        <canvas></canvas>
    </div>

    <div class="box-chart" id="line-chart">
        <canvas></canvas>
    </div>

    <script>
        let pieChartData = <?php echo json_encode($pieChartData, JSON_PRETTY_PRINT); ?>;
        let barChartData = <?php echo json_encode($barChartData, JSON_PRETTY_PRINT); ?>;
        let lineChartData = <?php echo json_encode($lineChartData, JSON_PRETTY_PRINT); ?>;

        document.addEventListener("DOMContentLoaded", () => {
            createPieChart();
            createBarChart();
            createLineChart();
        });

        function createPieChart() {
            new Chart(document.querySelector('#pie-chart canvas').getContext('2d'), {
                type: 'pie',
                data: {
                    labels: pieChartData.map(item => item.label),
                    datasets: [{
                        data: pieChartData.map(item => item.value),
                        backgroundColor: pieChartData.map(item => item.color),
                        borderColor: 'white',
                        borderWidth: 3,
                    }]
                },
            });
        }

        function createBarChart() {
            new Chart(document.querySelector('#bar-chart canvas').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: pieChartData.map(item => item.label),
                    datasets: [{
                        data: pieChartData.map(item => item.value),
                        backgroundColor: pieChartData.map(item => item.color),
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }

        function createLineChart() {
            new Chart(document.querySelector('#line-chart canvas').getContext('2d'), {
                type: 'line',
                data: {
                    labels: Object.keys(lineChartData),
                    datasets: [{
                        data: Object.values(lineChartData),
                        backgroundColor: 'green',
                        borderColor: 'green',
                        borderWidth: 5,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>