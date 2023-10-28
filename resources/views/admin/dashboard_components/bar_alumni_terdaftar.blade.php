<div id="alumni_terdaftar_bar" style="width:100%; x max-height:300px;"></div>

<script>
    var options = {
        series: [{
            data: [90, 32, 16, 40, ]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Terverif', 'Pekerjaan', 'Pendidikan', 'Nganggur'],
        }
    };

    let alumni_terdaftar_bar = new ApexCharts(document.querySelector("#alumni_terdaftar_bar"), options);
    alumni_terdaftar_bar.render();
</script>
