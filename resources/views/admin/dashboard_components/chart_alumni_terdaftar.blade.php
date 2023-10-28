<div id="alumni_terdaftar_line" style="width:100%;">
</div>

<script>
    var options = {
        series: [{
            name: "Alumni Terdaftar",
            data: [51, 49, 62, 69, 91, 148, 120, 133, 150, 190, 170, 150, 200, 222, 180, 190,
                190
            ],


        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'Product Trends by Month',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2016', '2017',
                '2018', '2019', '2020', '2021', '2022', '2023'
            ],
        },
    };

    let alumni_terdaftar_line = new ApexCharts(document.querySelector("#alumni_terdaftar_line"), options);
    alumni_terdaftar_line.render();
</script>
