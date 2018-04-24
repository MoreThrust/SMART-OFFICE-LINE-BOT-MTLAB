<!-- ==================== Status Lamp ==================== -->

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_workshop_room',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
$resp = curl_exec($curl);
curl_close($curl);
$val = explode('"', $resp);
if($val[7] == "1"){
    $st_lamp_ws = "ไฟห้องทำงาน: เปิดอยู่";
}elseif($val[7] == "0"){
    $st_lamp_ws = "ไฟห้องทำงาน: ปิดอยู่";
}
?>

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_meeting_room',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
$resp = curl_exec($curl);
curl_close($curl);
$val = explode('"', $resp);
if($val[7] == "1"){
    $st_lamp_mt = "ไฟห้องประชุม: เปิดอยู่";
}elseif($val[7] == "0"){
    $st_lamp_mt = "ไฟห้องประชุม: ปิดอยู่";
}
?>

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_reception_room',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
$resp = curl_exec($curl);
curl_close($curl);
$val = explode('"', $resp);
if($val[7] == "1"){
    $st_lamp_rt = "ไฟห้องรับแขก: เปิดอยู่";
}elseif($val[7] == "0"){
    $st_lamp_rt = "ไฟห้องรับแขก: ปิดอยู่";
}   
?>

<!-- ==================== End Status Lamp ==================== -->

<!-- ==================== Status Air ==================== -->

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_workshop_room',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
$resp = curl_exec($curl);
curl_close($curl);
$val = explode('"', $resp);
if($val[7] == "1"){
    $st_air_ws = "แอร์ห้องทำงาน: เปิดอยู่";
}elseif($val[7] == "0"){
    $st_air_ws = "แอร์ห้องทำงาน: ปิดอยู่";
}
?>

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_meeting_room',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
$resp = curl_exec($curl);
curl_close($curl);
$val = explode('"', $resp);
if($val[7] == "1"){
    $st_air_mt = "แอร์ห้องประชุม: เปิดอยู่";
}elseif($val[7] == "0"){
    $st_air_mt = "แอร์ห้องประชุม: ปิดอยู่";
}
?>

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_reception_room',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
$resp = curl_exec($curl);
curl_close($curl);
$val = explode('"', $resp);
if($val[7] == "1"){
    $st_air_rt = "แอร์ห้องรับแขก: เปิดอยู่";
}elseif($val[7] == "0"){
    $st_air_rt = "แอร์ห้องรับแขก: ปิดอยู่";
}   
?>

<!-- ==================== End Status Air ==================== -->

<!-- ==================== Temp Air ==================== -->

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_workshop_room',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
$resp = curl_exec($curl);
curl_close($curl);
$val = explode('"', $resp);
$val[7] = $st_air_ws;
?>

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_meeting_room',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
$resp = curl_exec($curl);
curl_close($curl);
$val = explode('"', $resp);
$val[7] = $st_air_mt;
?>

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/get/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_reception_room',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
$resp = curl_exec($curl);
curl_close($curl);
$val = explode('"', $resp);
$val[7] = $st_air_rt;
?>

<!-- ==================== End Temp Air ==================== -->