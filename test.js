<script type="text/javascript">
	function validasi() {
		var password = document.getElementById("exampleInputPassword1").value;		
		if (password!="") {
                        var token = "Bearer "+ <?php echo json_encode($_SESSION['token'])?>;
                        
                        var url="https://twitterjobvacancy.online/api_perisai/public/user/"+<?php echo json_encode($_SESSION['user_id'])?>;
                        
                        //alert(url);
                        //return false;
                        $.ajax({
                            url: url,
                            type: 'PUT',
                            dataType:"json",
                            data:{
                                "password":password
                            },
                            beforeSend: function(request) {
                                request.setRequestHeader("Authorization", token);
                                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            },
                            success: function(data, textStatus, jqXHR){
                                alert('Password berhasil diupdate');
                                return false;
                            },
                        })
		}else{
			alert('Password harus di isi!');
			return false;
		}
	}

</script>