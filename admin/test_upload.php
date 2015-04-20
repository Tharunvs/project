<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="front_design/jquery/jquery.min.js"></script>
</head>

<body>
<form name="myfrm" id="myfrm" method="post" enctype="multipart/form-data">
<input type="file" name="image"  />
<input type="submit" name="submit" />
</form>


<script>
$(document).ready(function(){
	$("#myfrm").submit(function(event){
		event.preventDefault();
					
					var fdata = new FormData($(this)[0]);
					
					url =  "test_upload1.php";
					 $.ajax({
                    url: url,
                    type: 'POST',
                    data: fdata,
                    async: false,
                    success: function (msg) {
							alert(msg);
                        
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;
                
		
	});
});	
</script>



<?php
if(isset($_POST['image']))
{
	print_r($_FILES);
}
?>
</body>
</html>
