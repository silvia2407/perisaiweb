<section class="content">
<!-- Berita -->
    <div class="box box-warning">
        <div class="box-header">
			<h3 class="box-title">
                <i class="fa fa-fw fa-table"></i> 
                Daftar Orang Dalam Pengawasan
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
					<th>Ubah Status</th>
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
						<td width="10%"><a href='#myModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id="1">
                             <i class="fa fa-fw fa-edit"></i>
                            </a>
                        </td>
                    </tr> 
                    </tbody>                                      
                <?php $counter++; } ?>
            </table>
        </div>
        <?php }?>                                 
    </div><!-- /.box -->
    <div class="modal fade" id="myModal" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div class="form-group">
                    <h4 class="modal-title float-left">Ubah Status</h4>
                </div>
                <div class="form-group">
                    <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                </div>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select class="form-control custom-select" name="status" id="status">
                        <option selected disabled>Select one</option>
                        <option value="1">Orang Dalam Pemantauan (ODP)</option>
                        <option value="2">Orang Tanpa Gejala (OTG)</option>
                        <option value="3">Pasien Dalam Pemantauan (PDP)</option>
                        <option value="4">Positive (Positive Covid-19)</option>
                        <option value="5">Selesai masa karantina</option>
                        <option value="6">Belum melakukan karantina</option>
                    </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
        </div>
          <!-- /.modal-dialog -->
    </div>
    
</section>