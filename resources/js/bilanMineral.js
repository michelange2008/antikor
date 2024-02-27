
var phosphore = <?php echo $besoins['p']; ?>;
console.log(phosphore)
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: [
            'Phosphore',
            'Calcium',
        ]
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'g/jour'
        }
    }],
    legend: {
        shadow: false
    },
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            grouping: false,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Besoins',
        color: '#057A6322',
        border: '#000000',
        data: besoins,
        pointPadding: 0.3,
        pointPlacement: -0.02
    }, {
        name: 'Apports',
        color: '#057A6366',
        data: [90, 140],
        pointPadding: 0.3,
        pointPlacement: 0.02

    }]
});