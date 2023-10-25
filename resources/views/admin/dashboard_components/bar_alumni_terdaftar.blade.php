<div id="myPlot" style="width:100%; max-width:480px max-height:300px;"></div>

<script>
    const xArray = [50, 150, 300, 550];
    const yArray = ["tanpa data  ", "Pendidikan  ", "Bekerja  ", "Terdaftar  "];

    const data = [{
        x: xArray,
        y: yArray,
        type: "bar",
        orientation: "h",
        marker: {
            color: "#7E3AF2"
        }
    }];

    Plotly.newPlot("myPlot", data);
</script>
