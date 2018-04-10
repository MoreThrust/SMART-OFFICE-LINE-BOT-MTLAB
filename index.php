<meta http-equiv="refresh" content="2" />
<?php
 
$strAccessToken = "04jXv6we9MYpqRctFYw7mNbBUIU0Wb22RVFrmfSaJup0Ii+Uf3INLI5FzsSdP1uysuqnv/YvY300eOcXdgPygsQJ/QPsY1CTHe9QAoR2E14pw346tN2johPVIVUMO3CaBx/7W9TkKsXdTFRqL2+UJgdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

if($arrJson['events'][0]['message']['text'] == "hi"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "เปิดไฟห้องนอนใหญ่"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เปิดไฟห้องนอนใหญ่แล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/1');
}else if($arrJson['events'][0]['message']['text'] == "ปิดไฟห้องนอนใหญ่"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดไฟห้องนอนใหญ่แล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/0');
}

else if($arrJson['events'][0]['message']['text'] == "เปิดไฟห้องนอนเล็ก"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เปิดไฟห้องนอนเล็กแล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp2/1');
}else if($arrJson['events'][0]['message']['text'] == "ปิดไฟห้องนอนเล็ก"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดไฟห้องนอนเล็กแล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp2/0');
}

else if($arrJson['events'][0]['message']['text'] == "เปิดไฟห้องรับแขก"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เปิดไฟห้องรับแขกแล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp3/1');
}else if($arrJson['events'][0]['message']['text'] == "ปิดไฟห้องรับแขก"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดไฟห้องรับแขกแล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp3/0');
}

else if($arrJson['events'][0]['message']['text'] == "เปิดแอร์ห้องนอนใหญ่"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เปิดแอร์ห้องนอนใหญ่แล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air1/1');
}else if($arrJson['events'][0]['message']['text'] == "ปิดแอร์ห้องนอนใหญ่"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดแอร์ห้องนอนใหญ่แล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air1/0');
}

else if($arrJson['events'][0]['message']['text'] == "เปิดแอร์ห้องนอนเล็ก"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เปิดแอร์ห้องนอนเล็กแล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air2/1');
}else if($arrJson['events'][0]['message']['text'] == "ปิดแอร์ห้องนอนเล็ก"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดแอร์ห้องนอนเล็กแล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air2/0');
}

else if($arrJson['events'][0]['message']['text'] == "เปิดแอร์ห้องรับแขก"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เปิดแอร์ห้องรับแขกแล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air3/1');
}else if($arrJson['events'][0]['message']['text'] == "ปิดแอร์ห้องรับแขก"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดแอร์ห้องรับแขกแล้ว 􀄃􀆏moon wink􏿿";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air3/0');
}

else if($arrJson['events'][0]['message']['text'] == "เปิดไฟทั้งหมด"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เปิดไฟทั้งหมดแล้ว 􀄃􀆏moon wink􏿿";
  $request1 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/1');
  $request2 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp2/1');
  $request3 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp3/1');
}else if($arrJson['events'][0]['message']['text'] == "ปิดไฟทั้งหมด"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดไฟทั้งหมดแล้ว 􀄃􀆏moon wink􏿿";
  $request1 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/0');
  $request2 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp2/0');
  $request3 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp3/0');
}

else if($arrJson['events'][0]['message']['text'] == "เปิดแอร์ทั้งหมด"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เปิดแอร์ทั้งหมดแล้ว 􀄃􀆏moon wink􏿿";
  $request1 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air1/1');
  $request2 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air2/1');
  $request3 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air3/1');
}else if($arrJson['events'][0]['message']['text'] == "ปิดแอร์ทั้งหมด"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดแอร์ทั้งหมดแล้ว 􀄃􀆏moon wink􏿿";
  $request1 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air1/0');
  $request2 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air2/0');
  $request3 = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air3/0');
}

else if($arrJson['events'][0]['message']['text'] == "เช็คสถานะไฟฟ้า"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $request1 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1');
  $request2 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp2');
  $request3 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp3');
  $request4 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air1');
  $request5 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air2');
  $request6 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air3');
  if($request1 == '{"result":"true","value":"1"}'){
    $Lamp1 = "􀔃􀇣blue circle􏿿ไฟห้องนอนใหญ่: เปิดอยู่ \n";
  }else{
    $Lamp1 = "􀔃􀇢red circle􏿿ไฟห้องนอนใหญ่: ปิดอยู่ \n";
  }
  if($request2 == '{"result":"true","value":"1"}'){
    $Lamp2 = "􀔃􀇣blue circle􏿿ไฟห้องนอนเล็ก: เปิดอยู่\n";
  }else{
    $Lamp2 = "􀔃􀇢red circle􏿿ไฟห้องนอนเล็ก: ปิดอยู่ \n";
  }
  if($request3 == '{"result":"true","value":"1"}'){
    $Lamp3 = "􀔃􀇣blue circle􏿿ไฟห้องรับแขก: เปิดอยู่ \n";
  }else{
    $Lamp3 = "􀔃􀇢red circle􏿿ไฟห้องรับแขก: ปิดอยู่ \n";
  }
  if($request4 == '{"result":"true","value":"1"}'){
    $Air1 = "􀔃􀇣blue circle􏿿แอร์ห้องนอนใหญ่: เปิดอยู่ \n";
  }else{
    $Air1 = "􀔃􀇢red circle􏿿แอร์ห้องนอนใหญ่: ปิดอยู่ \n";
  }
  if($request5 == '{"result":"true","value":"1"}'){
    $Air2 = "􀔃􀇣blue circle􏿿แอร์ห้องนอนเล็ก: เปิดอยู่ \n";
  }else{
    $Air2 = "􀔃􀇢red circle􏿿แอร์ห้องนอนเล็ก: ปิดอยู่ \n";
  }
  if($request6 == '{"result":"true","value":"1"}'){
    $Air3 = "􀔃􀇣blue circle􏿿แอร์ห้องรับแขก: เปิดอยู่ \n";
  }else{
    $Air3 = "􀔃􀇢red circle􏿿แอร์ห้องรับแขก: ปิดอยู่ \n";
  }
  $status = $Lamp1.$Lamp2.$Lamp3.$Air1.$Air2.$Air3;
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $status;
}

$val = 1;
else if($val == 1){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $request1 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1');
  if($request1 == '{"result":"true","value":"1"}'){
    $Lamp1 = "มีคนเข้ามา!!";
  }
  $status = $Lamp1;
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $status;
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
