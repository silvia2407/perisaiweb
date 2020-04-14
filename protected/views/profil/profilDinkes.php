<h1><?php echo "DINKES ".$model['KotaName']; ?></h1>
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">About Informasi Umum</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
           <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

           <p class="text-muted">
             <?php echo $model['email'];?>
           </p>

           <hr>

           <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokasi</strong>

           <p class="text-muted"><?php echo $faskes['dinkesAddress'];?></p>
           	


           <hr>

           <strong><i class="fas fa-phone mr-1"></i> Telepon</strong>

           <p class="text-muted">
             <?php echo $faskes['dinkesPhone'];?>
           </p>
           
           <a href="<?php echo Yii::app()->controller->createUrl('update')?>" class="btn btn-primary btn-block"><b>Edit</b></a>

         </div>
         <!-- /.card-body -->
       </div>
     </div>

     <div class="col-md-6">
        <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">Akun</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
           <strong><i class="far fa-user mr-1"></i> Username</strong>

           <p class="text-muted">
             <?php echo $model['username'];?>
           </p>

           <hr>
           <form role="form" onsubmit="return validasi()">
               <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
               </div>

               <div class="card-footer">
                <button type="submit" name="submit"class="btn btn-primary">Update Password</button>
               </div>
           </form>
           </div>
         <!-- /.card-body -->
       </div>
     </div>
</div>


<script type="text/javascript">
	function validasi() {
		var password = document.getElementById("exampleInputPassword1").value;
		if (password!="") {
                        var url=<?php echo json_encode(Yii::app()->controller->createUrl('password'))?>;
                        
                        $.ajax({
                            url: url,
                            type: 'POST',
                            dataType:"json",
                            data:{
                                "password":password,
                                "type":"PUT"
                            },
                            beforeSend:function(){
                                 //lakukan apasaja sambil menunggu proses selesai disini
                                 //misal tampilkan loading

                                 $(".loading").html("Please wait....");

                            },
                            success: function(data){
                                alert(data+", silahkan melakukan login ulang");
                                return false;
                            }
                        })
		}else{
			alert('Password harus di isi!');
                        return false;
		}
	}

</script>



