<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body OnLoad="document.form1.submit();">
<form name="form1" method="post" action="index.php" enctype="multipart/form-data">
	<input type="text" name="std" value="ok">
	<input name="btnSubmit" type="submit" value="Submit">
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