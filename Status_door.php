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

if($val[7] == "1"){
	$st_door = "ประตูล็อคอยู่";
}elseif($val[7] == "0"){
	$st_door = "ประตูยังไม่ได้ล็อค";
}
?>