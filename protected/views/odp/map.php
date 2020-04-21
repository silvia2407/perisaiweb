<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(<?php echo $latitude.",".$longitude;?>),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng(<?php echo $latitude.",".$longitude;?>),
      map: peta,
  });

}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<section class="content">
        
    <div class="col-md-12">
        <h4 class="box-title">
                <i class="fa fa-fw fa-list-alt"></i> 
                <a href="<?php echo Yii::app()->controller->createUrl('odp/index');?>">
                     List ODP</a> / Info Lokasi
        </h4>
        <div id="map" style="width: 100%; height: 300px;"></div>
    </div>
</section>