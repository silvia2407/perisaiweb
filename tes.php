<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
//	function validasi() {
		var password = "12345";	
		if (password!="") {
                        var token = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3R3aXR0ZXJqb2J2YWNhbmN5Lm9ubGluZS9hcGlfcGVyaXNhaS9wdWJsaWMvdXNlci9sb2dpbiIsImlhdCI6MTU4NjM3MTY0MSwiZXhwIjoxNTg5MDAxNDQxLCJuYmYiOjE1ODYzNzE2NDEsImp0aSI6IkUxMXBHRkdIOEZyMUFQS1oiLCJzdWIiOjcsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.c9Kn9RAhI1WV3nvN2Lj-LbD8krXMEeKK_U6tSYbE1Fw";
                        
                        var url="https://twitterjobvacancy.online/api_perisai/public/user/7";
                        
                        var value = JSON.stringify({
                            "password" : "12345"
                        });
                        $.ajax({
                            url: url,
                            type: 'PUT',
                            dataType:"text",
                            data:value,
                            beforeSend: function(request) {
                                request.setRequestHeader("Authorization", token);
                                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            },
                            success: function(data, textStatus, jqXHR){
                                alert('Password berhasil diupdate');
                                //return false;
                            },
                            error: function(xhr, status, error) {
                              alert('Gagale');
                                //return false;
                            },
                        })
		}else{
			alert('Password harus di isi!');
			//return false;
		}
//	}

</script>

