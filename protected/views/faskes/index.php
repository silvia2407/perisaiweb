<section class="content">
<!-- Berita -->
    <div class="box box-warning">
        <div class="box-header">
			<h3 class="box-title">
                <i class="fa fa-fw fa-table"></i> 
                Daftar Fasilitas Kesehatan
            </h3>
            
        </div>
        <?php if(!is_array($data_faskes)) { ?>
        <div class="box box-warning">
            <h3 class="box-title">
                <?php echo $data_faskes; ?>
            </h3>
        </div>    
        <?php } else{ ?>                             
        <div class="box-body table-responsive">
            <!-- .table - Uses sparkline charts-->
            <table id="table_id" class="table table-bordered table-hover dataTable">
                <thead>                                        
                <tr>
                    <th>No</th> 
                    <th>Kode Faskes</th>                                               
                    <th>Tipe</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Location (lat,long)</th>
                    <th>Akun</th>
                </tr>
                </thead>                                    
                <?php 
                $counter = 1;
                foreach ($data_faskes as $row) { ?> 
                    <tbody>                                     
                    <tr>
                        <td width="5%"><?php echo $counter; ?></td>
                        <td width="10%"><?php echo $row['faskesCode']; ?></td>
                        <td width="10%"><?php echo $row['faskesType']; ?></td>
<!--                        <td width="30%"><a href="<?php //echo Yii::app()->controller->createUrl('faskes/detail',array('id'=>$row['faskesId']));?>">
                            <?php //echo $row['faskesName']; ?>
                            </a></td>-->
                        <td width="15%"><?php echo $row['faskesName']; ?></td>
                        <td width="30%"><?php echo $row['faskesAddress']; ?></td>
                        <td width="12%"><?php echo $row['faskesPhone']; ?></td>
                        <td width="18%"><?php echo $row['latitude'].', '.$row['longitude']; ?></td>
                        <td width="10%">
                            <?php if(isset($row['userId'])){ ?>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-check">
                                </i>
                            </a>
                            <?php } else{ ?>
                            <a class="btn btn-danger btn-sm" href="<?php echo Yii::app()->controller->createUrl('faskes/akun',array('id'=>$row['faskesId']));?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                            </a>
                            <?php } ?>
                        </td>
                    </tr> 
                    </tbody>                                      
                <?php $counter++; } ?>
            </table>
        </div>
        <?php }?>                                 
    </div><!-- /.box -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
</section>