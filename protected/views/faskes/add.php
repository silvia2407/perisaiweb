<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Tambah Fasilitas Kesehatan</h3>
  </div>
    
  <?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Gagal!</strong> Semua field harus diisi.
    </div>
  <?php endif; ?>
    
  <?php if(Yii::app()->user->hasFlash('gagal')): ?>
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Gagal!</strong> Faskes gagal ditambahkan.
    </div>
  <?php endif; ?>
    
  <?php if(Yii::app()->user->hasFlash('sukses')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Berhasil!</strong> Faskes berhasil ditambahkan.
    </div>
  <?php endif; ?>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="<?php echo Yii::app()->controller->createUrl('add')?>" method="post">
    <div class="card-body">
      <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">Kode Faskes</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="code" name="code" placeholder="Kode Faskes">
        </div>
      </div>
      <div class="form-group row">
        <label for="tipe" class="col-sm-2 col-form-label">Tipe Faskes</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Rumah Sakit/Puskesmas">
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Faskes">
        </div>
      </div>
      <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Faskes">
        </div>
      </div>
      <div class="form-group row">
        <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No Telepon">
        </div>
      </div>
      <div style="display: none">
        <input type="text" class="form-control" id="flag" name="flag" value="akun">
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info float-right">Tambah</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>