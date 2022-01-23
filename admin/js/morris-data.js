$(function() {
    
    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2018 Q1',
            ADIDAS: 2666,
            NIKE: null,
            CONVERSE: 2647
        }, {
            period: '2018 Q2',
            ADIDAS: 2778,
            NIKE: 2294,
            CONVERSE: 2441
        }, {
            period: '2018 Q3',
            ADIDAS: 4912,
            NIKE: 1969,
            CONVERSE: 2501
        }, {
            period: '2018 Q4',
            ADIDAS: 3767,
            NIKE: 3597,
            CONVERSE: 5689
        }, {
            period: '2019 Q1',
            ADIDAS: 6810,
            NIKE: 1914,
            CONVERSE: 2293
        }, {
            period: '2019 Q2',
            ADIDAS: 5670,
            NIKE: 4293,
            CONVERSE: 1881
        }, {
            period: '2019 Q3',
            ADIDAS: 4820,
            NIKE: 3795,
            CONVERSE: 1588
        }, {
            period: '2019 Q4',
            ADIDAS: 15073,
            NIKE: 5967,
            CONVERSE: 5175
        }, {
            period: '2020 Q1',
            ADIDAS: 10687,
            NIKE: 4460,
            CONVERSE: 2028
        }, {
            period: '2020 Q2',
            ADIDAS: 8432,
            NIKE: 5713,
            CONVERSE: 1791
        }],
        xkey: 'period',
        ykeys: ['ADIDAS', 'NIKE', 'CONVERSE'],
        labels: ['ADIDAS', 'NIKE', 'CONVERSE'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Khách hàng tiềm năng",
            value: 12
        }, {
            label: "Khách hàng mua tại shop",
            value: 30
        }, {
            label: "Khách hàng mua online",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2014',
            a: 100,
            b: 90
        }, {
            y: '2015',
            a: 75,
            b: 65
        }, {
            y: '2016',
            a: 50,
            b: 40
        }, {
            y: '2017',
            a: 75,
            b: 65
        }, {
            y: '2018',
            a: 50,
            b: 40
        }, {
            y: '2019',
            a: 75,
            b: 65
        }, {
            y: '2020',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['01/2020', '02/2020'],
        hideHover: 'auto',
        resize: true
    });

});
