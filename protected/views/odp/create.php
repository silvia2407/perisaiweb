<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">
                <i class="fa fa-fw fa-list-alt"></i> 
                <a href="<?php echo Yii::app()->controller->createUrl('odp/index');?>">
                     List ODP</a> / Tambah Data
          </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <form action="<?php echo Yii::app()->controller->createUrl('login')?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Nama</label>
              <input type="text" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Umur</label>
              <input type="text" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputStatus">Jenis Kelamin</label>
              <select class="form-control custom-select">
                <option selected disabled>Select one</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputClientCompany">Alamat Asal</label>
              <textarea id="inputDescription" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label for="inputProjectLeader">Alamat Tujuan</label>
              <textarea id="inputDescription" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label for="inputDescription">Nomor Telepon</label>
              <input type="text" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Kota Asal</label>
              <input type="text" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Moda Transportasi</label>
              <input type="text" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Tanggal Kedatangan</label>
              <input type="text" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Status</label>
              <input type="text" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" value="submit" class="btn btn-success float-left">
            </div>
          </div>
        </form>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</section>
