<section class="content">
<!-- Berita -->
    <div class="box box-warning">
        <div class="box-header">
			<h4 class="box-title">
                <i class="fa fa-fw fa-list-alt"></i> 
                <a href="<?php echo Yii::app()->controller->createUrl('odp/index');?>">
                     List ODP</a> / Diagnosa <?php echo $nama; ?>
            </h4>								
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
                        <th width="10%">#<?php echo $counter." - ".date('d-m-Y', strtotime($row['insertDate']));?></th>
                    <?php $counter++; } ?>
                </tr>
                </thead>
                <tbody>                                     
                    <tr>
                    <td>Demam</td>
                    <?php 
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['demam']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Batuk/Pilek</td>
                    <?php 
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['batukPilek']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Sesak napas</td>
                    <?php 
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['sesakNapas']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Badan lemas</td>
                    <?php 
                        foreach ($diagnosa as $row) { ?>  
                        <td>
                            <?php 
                            echo ($row['badanLemas']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Diare</td>
                    <?php 
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['diare']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?>
                            </td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Kejang</td>
                    <?php 
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['kejang']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?>
                            </td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Kaku kuduk</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['kakuKuduk']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?>
                            </td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Mata merah</td>
                    <?php 
                        
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['mataMerah']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?>
                            </td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Mata Menguning</td>
                    <?php 
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['mataKuning']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?>
                            </td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Kulit Ruam</td>
                    <?php 
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['kulitRuam']==1) ? "<span class=\"badge bg-danger\">Ya</span>" : "<span class=\"badge bg-success\">Tidak</span>";?>
                        </td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Gejala Lainnya</td>
                    <?php 
                        foreach ($diagnosa as $row) { ?>  
                        <td><?php 
                            echo ($row['lainnya']==1) ? "<span class=\"badge bg-danger\">".$row['lainnyaDesc']."</span>" : "<span class=\"badge bg-success\">Tidak Ada</span>";?>
                            </td>
                    <?php } ?>
                    </tr>
                </tbody>                                      
            </table>
        </div>
        <?php }?>                                 
    </div><!-- /.box -->
</section>