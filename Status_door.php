<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
      
        $('#sendData').click(function(){ 
                var txt=$('#formData').serialize();  // ใช้ serialize() รวมเอา ค่าทั้งหมดที่อยู่ใน form     
                $.ajax({
                  type: 'POST',
                  url: "index.php",
                  data: txt,
                  success: function(data){
                     $('#showData').html( data );                  
                  }
                
                });              
        })

        window.onload=function(){
    		setInterval("submitform();", 5000);
    	}
    	function submitform(){ document.getElementById('formData').submit(); }
      
    });
</script>
</head>
<body>
<form id="formData" method="post" action="">
	<input type="text" id="std" name="key" value="123">
</form>
</body>
</html>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/RM2BVxasyryPXrpuxm5xCkUnFxfkg1HbMDdG3kTU/settime/tim_now',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));

$resp = curl_exec($curl);

curl_close($curl);
$val = explode('"', $resp);
echo 'สถานะ: '.$val[7];

?>