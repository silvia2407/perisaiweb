<!-- PIE CHART -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
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
        </div>

        <div class="col-md-8">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-table"></i>  Tracking ODP*</h3>
              </div>
              <div class="card-body">
                <?php if(!is_array($data_tracking)) { ?>
                    <div class="box box-warning">
                        <h3 class="box-title">
                            <?php echo $data_tracking; ?>
                        </h3>
                    </div>    
                    <?php } else{ ?>                             
                    <div class="box-body table-responsive">
                        <!-- .table - Uses sparkline charts-->
                        <table id="table_id" class="table table-bordered table-hover dataTable">
                            <thead>                                        
                            <tr>
                                <th>No</th> 
                                <th>Nama</th>                                               
                                <th>Umur</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Jarak (m)</th>
                            </tr>
                            </thead>                                    
                            <?php 
                            $counter = 1;
                            foreach ($data_tracking as $row) { ?> 
                                <tbody>                                     
                                <tr>
                                    <td width="3%"><?php echo $counter; ?></td>
                                    <td width="32%"><?php echo $row['nama']." (".$row['kelamin'].")"; ?></td>
                                    <td width="5%"><?php echo $row['usia']; ?></td>
                                    <td width="15%"><?php echo $row['phone']; ?></td>
                                    <td width="30%"><?php echo $row['destAddress']; ?></td>
                                    <td width="15%"><?php echo $row['distanceOrigin']; ?></td>
                                </tr> 
                                </tbody>                                      
                            <?php $counter++; } ?>
                        </table>
                        <i>*khusus ODP yang keluar wilayah karantina</i>
                    </div>
                    <?php }?> 
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
    
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
                data: [<?php echo json_encode($_SESSION['odp']);?>,<?php echo json_encode($_SESSION['otg']);?>,<?php echo json_encode($_SESSION['pdp']);?>,<?php echo json_encode($_SESSION['positif']);?>,<?php echo json_encode($_SESSION['karantina']);?>,<?php echo json_encode($_SESSION['selesai']);?>],
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