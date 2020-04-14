<section class="content">
<!-- Berita -->
    <div class="box box-warning">
        <div class="box-header">
			<h3 class="box-title">
                <i class="fa fa-fw fa-list-alt"></i> 
                <a href="<?php echo Yii::app()->controller->createUrl('odp/index');?>">
                     List ODP</a> / History Perjalanan <?php echo $nama; ?>
            </h3>								
        </div>
        <?php if(!is_array($travel)) { ?>
        <div class="box box-warning">
            <h3 class="box-title">
                <?php echo $travel; ?>
            </h3>
        </div>    
        <?php } else{ ?>                             
        <div class="box-body table-responsive">
            <!-- .table - Uses sparkline charts-->
            <table id="table_id" class="table table-hover">
                <thead>                                        
                <tr>
                    <th width="15%"></th>
                    <?php 
                        $counter = 1;
                        foreach ($travel as $row) { ?>  
                        <th width="10%">#<?php echo $counter;?></th>
                    <?php $counter++; } ?>
                </tr>
                </thead>
                <tbody>                                     
                    <tr>
                    <td>Kota</td>
                    <?php 
                        foreach ($travel as $row) { ?>  
                        <td><?php 
                            echo $row['city'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Tanggal Keberangkatan</td>
                    <?php 
                        foreach ($travel as $row) { ?>  
                        <td><?php 
                            echo $row['departureDate'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Tanggal Kedatangan</td>
                    <?php 
                        foreach ($travel as $row) { ?>  
                        <td><?php 
                            echo $row['arrivalDate'];?></td>
                    <?php } ?>
                    </tr>
                </tbody>                                      
            </table>
        </div>
        <?php }?>                                 
    </div><!-- /.box -->
</section>