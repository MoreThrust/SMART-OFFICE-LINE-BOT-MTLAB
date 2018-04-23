<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form id="frm" method="POST" action="index.php">
<input type="hidden" name="st_door" value=<?php echo "'".$val[7]."'";?>/>
</form>

<script>
document.getElementById("frm").submit();
</script>

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