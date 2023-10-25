<canvas id="myChart" style="width:100%;max-width:480"></canvas>

<script>
    const xValues = [2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021,
        2022, 2023, 2024, 2025, 2026
    ];
    const yValues = [190, 200, 230, 300, 204, 300, 240, 334, 232, 251, 123, 221, 142, 223, 209, 309, 203, 223, 200, 100,
        50
    ];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(0,0,255,0.1)",
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 400
                    }
                }],
            }
        }
    });
</script>
