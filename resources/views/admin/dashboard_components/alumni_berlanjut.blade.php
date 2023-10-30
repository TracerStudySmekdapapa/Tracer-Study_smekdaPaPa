<div id="chart_lanjut" style="width:100%;  max-height:500px; min-height: 300px">
</div>


<script>
    let pekerjaan = @json($countPekerjaanPertahun);
    let pendidikan = @json($countPendidikanPertahun);

    function dataPekerjaanValue() {
        const finalValue = []
        for (const property in pekerjaan) {
            finalValue.push(`${pekerjaan[property]}`);
        }
        return finalValue;
    }

    function dataPendidikanValue() {
        const finalValue = []
        for (const property in pendidikan) {
            finalValue.push(`${pendidikan[property]}`);
        }
        return finalValue;
    }

    function dataYear() {
        const finalValueYears = []
        for (const property in pekerjaan) {
            finalValueYears.push(`${property}`);
        }
        return finalValueYears;
    }

    var options_berlanjut = {
        series: [{
            name: 'Alumni yang bekerja',
            data: dataPekerjaanValue()
        }, {
            name: 'Alumni yang melanjutkan pendidikan',
            data: dataPendidikanValue()
        }],
        chart: {
            height: 350,
            type: 'area'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: dataYear()
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart_lanjut"), options_berlanjut);
    chart.render()
</script>
