// Clear previous charts before rendering new ones!
document.getElementById('chart-container').innerHTML = "";

Object.keys(data).forEach((position, index) => {
    let chartDiv = document.createElement('div');
    chartDiv.id = 'chart-' + index;
    chartDiv.style.width = '100%';
    chartDiv.style.height = '400px';
    chartDiv.style.marginBottom = '40px';
    document.getElementById('chart-container').appendChild(chartDiv);

    let options = {
        series: [{
            name: "Votes",
            data: data[position].map(c => c.votes)
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        title: {
            text: position + " Election Results"
        },
        xaxis: {
            categories: data[position].map(c => c.name)
        }
    };

    let chart = new ApexCharts(document.querySelector("#chart-" + index), options);
    chart.render();
});