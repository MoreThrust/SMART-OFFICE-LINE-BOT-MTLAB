<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/front_door',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));

$resp = curl_exec($curl);

curl_close($curl);

$val = explode('"', $resp);

if($val[7] == "1"){
	$st_front_door = "ประตูล็อคอยู่";
}elseif($val[7] == "0"){
	$st_front_door = "ประตูยังไม่ได้ล็อค";
}
?>

<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/back_door',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));

$resp = curl_exec($curl);

curl_close($curl);

$val = explode('"', $resp);

if($val[7] == "1"){
	$st_back_door = "ประตูล็อคอยู่";
}elseif($val[7] == "0"){
	$st_back_door = "ประตูยังไม่ได้ล็อค";
}
?>

<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/Meeting_room_1_door',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));

$resp = curl_exec($curl);

curl_close($curl);

$val = explode('"', $resp);

if($val[7] == "1"){
	$st_mtr1_door = "ประตูล็อคอยู่";
}elseif($val[7] == "0"){
	$st_mtr1_door = "ประตูยังไม่ได้ล็อค";
}
?>

<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/Meeting_room_1_temp',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));

$resp = curl_exec($curl);

curl_close($curl);

$val = explode('"', $resp);

$st_air_mtr1 = 'อุณหภูมิ'.$val[7].'°C';
?>