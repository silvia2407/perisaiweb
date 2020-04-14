<!-- PIE CHART -->
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Rekap per status</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
  </div>
  <!-- /.card-body -->
</div>
<script>
  $(function () {
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = {
            labels: [
                'ODP', 
                'OTG',
                'PDP', 
                'Positif', 
                'Karantina', 
                'Selesai', 
            ],
            datasets: [
              {
                data: [<?php//echo json_encode($_SESSION['odp']);?>,<?php //echo json_encode($_SESSION['otg']);?>,<?php //echo json_encode($_SESSION['pdp']);?>,<?php //echo json_encode($_SESSION['positif']);?>,<?php //echo json_encode($_SESSION['karantina']);?>,<?php //echo json_encode($_SESSION['selesai']);?>],
                backgroundColor : ['#ffcc00', '#3c8dbc', '#cc0000', '#f56954', '#e6e600', '#00a65a'],
                //backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
              }
            ]
          }
        var pieOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions      
        })
  })
</script>