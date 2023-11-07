<div id="alumni_terdaftar_bar" style="width:100%; "></div>

<script>
    var bar_option = {
        series: [{
            data: [{{ $alumniData['countAlumni'] }}, {{ $alumniData['countPekerjaan'] }},
                {{ $alumniData['countPendidikan'] }},
                {{ $alumniData['countAlumniNganggur'] }}
            ],
            color: '#7E3AF2',

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

    let alumniTerdaftarBar = new ApexCharts(document.querySelector("#alumni_terdaftar_bar"), bar_option);
    alumniTerdaftarBar.render();
</script>
