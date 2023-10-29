<div id="alumni_terdaftar_bar" style="width:100%; x max-height:300px;"></div>

<script>
    /* let terverif = {{ $countAlumni }}
    console.info(terverif) */
    var bar_option = {
        series: [{
            data: [{{ $countAlumni }}, {{ $countPekerjaan }}, {{ $countPendidikan }},
                {{ $countAlumniNganggur }}
            ]
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
