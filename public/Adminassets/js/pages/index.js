$(function () {
    "use strict";
    initSparkline();
    initDonutChart();
    MorrisArea();
});


// ===========================
// EVENT GANTI TAHUN Dashboard
// ===========================
document.getElementById('yearFilter').addEventListener('change', function () {
    const selectedYear = this.value;

    // Update line chart
    activityChart.data.datasets[0].data = yearlyData[selectedYear].income;
    activityChart.update();

    // Update pie chart
    categoryChart.data.datasets[0].data = yearlyData[selectedYear].category;
    categoryChart.update();
});


//=======
function initSparkline() {
    $(".sparkline").each(function () {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });
}
//=======

//=======
var data = [], totalPoints = 110;
function getRandomData() {
    if (data.length > 0) data = data.slice(1);

    while (data.length < totalPoints) {
        var prev = data.length > 0 ? data[data.length - 1] : 50, y = prev + Math.random() * 10 - 5;
        if (y < 0) { y = 0; } else if (y > 100) { y = 100; }

        data.push(y);
    }

    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]]);
    }

    return res;
}

//=======
$(window).on('scroll', function () {
    $('.card .sparkline').each(function () {
        var imagePos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow + 400) {
            $(this).addClass("pullUp");
        }
    });
});

//=======
$(".dial1").knob();
$({ animatedVal: 0 }).animate({ animatedVal: 100 }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial2").knob();
$({ animatedVal: 0 }).animate({ animatedVal: 26 }, {
    duration: 3800,
    easing: "swing",
    step: function () {
        $(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial3").knob();
$({ animatedVal: 0 }).animate({ animatedVal: 76 }, {
    duration: 3200,
    easing: "swing",
    step: function () {
        $(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial4").knob();
$({ animatedVal: 0 }).animate({ animatedVal: 88 }, {
    duration: 3500,
    easing: "swing",
    step: function () {
        $(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});

//=======
$(function () {
    $('#world-map-markers').vectorMap({
        map: 'world_mill_en',
        scaleColors: ['#ea6c9c', '#ea6c9c'],
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        regionStyle: {
            initial: {
                fill: '#e0e0e0'
            }
        },
        markerStyle: {
            initial: {
                r: 15,
                'fill': '#ffd560',
                'fill-opacity': 0.9,
                'stroke': '#fff',
                'stroke-width': 5,
                'stroke-opacity': 0.5
            },

            hover: {
                'stroke': '#fff',
                'fill-opacity': 1,
                'stroke-width': 5
            }
        },
        backgroundColor: 'transparent',
        markers: [
            { latLng: [37.09, -95.71], name: 'America' },
            { latLng: [51.16, 10.45], name: 'Germany' },
            { latLng: [-25.27, 133.77], name: 'Australia' },
            { latLng: [56.13, -106.34], name: 'Canada' },
            { latLng: [20.59, 78.96], name: 'India' },
            { latLng: [55.37, -3.43], name: 'United Kingdom' },
        ]
    });
});