<section class="content">
<!-- Berita -->
    <div class="box box-warning">
        <div class="box-header">
			<h3 class="box-title">
                <i class="fa fa-fw fa-list-alt"></i> 
                <a href="<?php echo Yii::app()->controller->createUrl('odp/index');?>">
                     List ODP</a> / Detail Data Orang Dalam Pengawasan
            </h3>								
        </div>
        <?php if(!is_array($data_odp)) { ?>
        <div class="box box-warning">
            <h3 class="box-title">
                <?php echo $data_odp; ?>
            </h3>
        </div>    
        <?php } else{ ?>                             
        <div class="box-body table-responsive">
            <!-- .table - Uses sparkline charts-->
            <table id="table_id" class="table table-hover">
                <tbody>                                     
                    <tr>
                        <td width="15%">No. KTP :</td>
                        <td width="50%"><?php echo $data_odp['ktpNo']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Nama :</td>
                        <td width="50%"><?php echo $data_odp['nama']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Umur :</td>
                        <td width="50%"><?php echo $data_odp['usia']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Jenis Kelamin :</td>
                        <td width="50%"><?php echo $data_odp['kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Kebangsaan :</td>
                        <td width="50%"><?php echo $data_odp['kebangsaan']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Nomor Telepon :</td>
                        <td width="50%"><?php echo $data_odp['phone']; ?></td>
                    </tr>  
                    <tr>
                        <td width="15%">Alamat Asal :</td>
                        <td width="50%"><?php echo $data_odp['oriAddress']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Alamat Tujuan :</td>
                        <td width="50%"><?php echo $data_odp['destAddress']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Kota Asal :</td>
                        <td width="50%"><?php echo $data_odp['oriCity']; ?></td>
                    </tr> 
                    <tr>
                        <td width="15%">Moda Transportasi :</td>
                        <td width="50%"><?php echo $data_odp['vehicleBy']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Tanggal Kedatangan :</td>
                        <td width="50%"><?php echo $data_odp['arrivalDate']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Status :</td>
                        <td width="50%"><?php echo $data_odp['personStatus']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Faskes :</td>
                        <td width="50%"><?php echo $data_odp['faskesId']; ?></td>
                    </tr>  
                </tbody>                                      
            </table>
        </div>
        <?php }?>                                 
    </div><!-- /.box -->
</section>