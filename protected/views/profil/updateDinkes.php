<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Informasi Umum</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="<?php echo Yii::app()->controller->createUrl('update')?>" method="post" role="form" id="quickForm">
    <div class="card-body">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" value="<?php echo $model['email'];?>">
      </div>
      <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?php echo $faskes['dinkesAddress'];?>">
      </div>
      <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="text" name="telepon" class="form-control" id="telepon" value="<?php echo $faskes['dinkesPhone'];?>">
      </div>
      <div style="display: none" class="form-group">
        <input type="text" name="flag" class="form-control" id="flag" value="1">
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>