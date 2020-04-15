<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Akun Faskes <?php echo $detail_faskes['faskesName'];?></h3>
  </div>
  <?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Gagal!</strong> Semua field harus diisi.
    </div>
  <?php endif; ?>
    
  <?php if(Yii::app()->user->hasFlash('error')): ?>
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Gagal!</strong> Username dan email sudah pernah dipakai.
    </div>
  <?php endif; ?>
  <form class="form-horizontal" action="<?php echo Yii::app()->controller->createUrl('akun',array('id'=>$faskesId))?>" method="post">
    <div class="card-body">
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" name="username" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>
    </div>
    <div style="display: none">
      <input type="text" class="form-control" id="flag" name="flag" value="akun">
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info float-right">Tambah</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>