Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: [
            'Calcium',
            'Phosphore'
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
        color: '#A2352FAA',
        data: [150, 73],
        pointPadding: 0.3,
        pointPlacement: -0.05
    }, {
        name: 'Apports',
        color: '#057A63AA',
        data: [140, 90],
        pointPadding: 0.3,
        pointPlacement: 0.05

    }]
});