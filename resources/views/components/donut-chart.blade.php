<div>
    <div class="p-5">
        <div>{{ $title }}</div>
   <div id='donut-chart'></div>
</div>
</div>
<script>

var _options = <?php echo $options_json; ?>;
var options = {
          series: _options.series,
          chart: {
          type: 'donut',
        },
        labels: _options.labels,
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#donut-chart"), options);
        chart.render();
</script>
