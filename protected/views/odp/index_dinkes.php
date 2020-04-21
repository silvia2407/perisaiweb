<section class="content">
<!-- Berita -->
    <div class="box box-warning">
        <div class="box-header">
			<h4 class="box-title">
                <i class="fa fa-fw fa-table"></i> 
                Daftar Orang Dalam Pemantauan
            </h4>
            
        </div>
        <?php if(!is_array($data_odp)) { ?>
        <div class="box box-warning">
            <h4 class="box-title">
                <?php echo $data_odp; ?>
            </h4>
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
					<th>Jenis Kelamin</th>
                    <th>Kebangsaan</th>
                    <th>Status</th>
                    <th>Diagnosa</th>
                    <th>Info Travel</th>
                    <th>Info Tracking</th>
                </tr>
                </thead>                                    
                <?php 
                $counter = 1;
                foreach ($data_odp as $row) { ?> 
                    <tbody>                                     
                    <tr>
                        <td width="5%"><?php echo $counter; ?></td>
                        <td width="30%"><a href="<?php echo Yii::app()->controller->createUrl('odp/detail',array('id'=>$row['personId']));?>">
                            <?php echo $row['nama']; ?>
                            </a></td>
                        <td width="15%"><?php echo $row['usia']; ?></td>
                        <td width="10%"><?php echo $row['kelamin']; ?></td>
						<td width="20%"><?php echo $row['kebangsaan']; ?></td>
						<td width="10%"><?php echo Odp::model()->getStatusById($row['personStatus']); ?></td>
                        <td width="10%"><a href="<?php echo Yii::app()->controller->createUrl('odp/diagnosa',array('id'=>$row['personId']));?>">
                             <i class="fa fa-fw fa-stethoscope"></i>
                            </a></td>
                        <td width="10%"><a href="<?php echo Yii::app()->controller->createUrl('odp/travel',array('id'=>$row['personId']));?>">
                             <i class="fa fa-fw fa-map-pin"></i>
                            </a></td>
                        <td width="10%"><a href="<?php echo Yii::app()->controller->createUrl('odp/tracking',array('id'=>$row['personId']));?>">
                             <i class="fa fa-fw fa-location-arrow"></i>
                            </a></td>
					</tr> 
                    </tbody>                                      
                <?php $counter++; } ?>
            </table>
        </div>
        <?php }?>                                 
    </div><!-- /.box -->
 </section>