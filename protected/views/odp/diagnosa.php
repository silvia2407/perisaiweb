<section class="content">
<!-- Berita -->
    <div class="box box-warning">
        <div class="box-header">
			<h3 class="box-title">
                <i class="fa fa-fw fa-list-alt"></i> 
                <a href="<?php echo Yii::app()->controller->createUrl('odp/index');?>">
                     List ODP</a> / Diagnosa <?php echo $nama; ?>
            </h3>								
        </div>
        <?php if(!is_array($diagnosa)) { ?>
        <div class="box box-warning">
            <h3 class="box-title">
                <?php echo $diagnosa; ?>
            </h3>
        </div>    
        <?php } else{ ?>                             
        <div class="box-body table-responsive">
            <!-- .table - Uses sparkline charts-->
            <table id="table_id" class="table table-hover">
                <thead>                                        
                <tr>
                    <th width="15%">Diagnosa</th>
                    <?php 
                        $counter = 1;
                        foreach ($diagnosa as $row) { ?>  
                        <th width="10%">#<?php echo $counter." - ".$row['insertDate'];?></th>
                    <?php $counter++; } ?>
                </tr>
                </thead>
                <tbody>                                     
                    <tr>
                    <td>Demam</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['demam'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Batuk Pilek</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['batukPilek'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Sesak Napas</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['sesakNapas'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Badan Lemas</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['badanLemas'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Diare</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['diare'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Kejag</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['kejang'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Kaku Kuduk</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['kakuKuduk'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Mata Merah</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['mataMerah'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Mata Kuning</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['mataKuning'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Kulit Ruam</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['kulitRuam'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Lainnya</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['lainnyaDesc'];?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Diagnosa Status</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php echo $row['diagStatus'];?></td>
                    <?php } ?>
                    </tr>
                </tbody>                                      
            </table>
        </div>
        <?php }?>                                 
    </div><!-- /.box -->
</section>