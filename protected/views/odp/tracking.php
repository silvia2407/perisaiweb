<section class="content">
<!-- Berita -->
    <div class="box box-warning">
        <div class="box-header">
			<h4 class="box-title">
                <i class="fa fa-fw fa-list-alt"></i> 
                <a href="<?php echo Yii::app()->controller->createUrl('odp/index');?>">
                     List ODP</a> / Info Tracking <?php echo $nama; ?>
            </h4>								
        </div>
        <?php if(!is_array($tracking)) { ?>
        <div class="box box-warning">
            <h4 class="box-title">
                <?php echo $tracking; ?>
            </h4>
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
                        foreach ($tracking as $row) { ?>  
                        <th width="10%">#<?php echo $counter;?></th>
                    <?php $counter++; } ?>
                </tr>
                </thead>
                <tbody>                                     
                    <tr>
                    <td>Waktu</td>
                    <?php 
                        foreach ($tracking as $row) { ?>  
                        <td><?php 
                            echo date('d-m-Y H:i:s', strtotime($row['created_at']));?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Jarak dari Rumah (m)</td>
                    <?php 
                        foreach ($tracking as $row) { ?>  
                        <td><?php 
                            echo $row['distanceOrigin'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                        <td>Info Lokasi</td>
                        <?php 
                            foreach ($tracking as $row) { ?>  
                            <td><?php 
                            echo ($row['latitude']!='' and $row['longitude']!='') ? "<a href=\"".Yii::app()->controller->createUrl('odp/map',array('latitude'=>$row['latitude'],'longitude'=>$row['longitude']))."\">
                             <i class=\"fa fa-fw fa-map\"></i></a>" : "-";?></td>
                        <?php } ?>
                    </tr>
                </tbody>                                      
            </table>
        </div>
        <?php }?>                                 
    </div><!-- /.box -->
</section>