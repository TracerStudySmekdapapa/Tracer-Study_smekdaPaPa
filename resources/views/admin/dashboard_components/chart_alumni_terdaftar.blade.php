<div id="alumni_terdaftar_line" style="width:100%;">
</div>

<script>
    let data = @json($countAlumniPertahun);

    function dataValue() {
        const finalValue = []
        for (const property in data) {
            finalValue.push(`${data[property]}`);
        }

        return finalValue;
    }

    function dataYear() {
        const finalValueYears = []
        for (const property in data) {
            finalValueYears.push(`${property}`);
        }
        return finalValueYears;
    }

    let options = {
        series: [{
            name: "Alumni Terdaftar",
            data: dataValue(),


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
            categories: dataYear(),
        },
    };

    let alumni_terdaftar_line = new ApexCharts(document.querySelector("#alumni_terdaftar_line"), options);
    alumni_terdaftar_line.render();
</script>
