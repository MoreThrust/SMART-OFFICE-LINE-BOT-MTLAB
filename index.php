<?php
include("Status.php");
//include("set_anto.php");

$accessToken = '04jXv6we9MYpqRctFYw7mNbBUIU0Wb22RVFrmfSaJup0Ii+Uf3INLI5FzsSdP1uysuqnv/YvY300eOcXdgPygsQJ/QPsY1CTHe9QAoR2E14pw346tN2johPVIVUMO3CaBx/7W9TkKsXdTFRqL2+UJgdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);
$set_front_door = "";
$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

// ####################################### Lamp ###################################### //

if ($message->{"text"} == 'แสงสว่าง') {
    $messageData = [
        'type' => 'template',
        'altText' => 'ระบบแสงสว่าง',
        'template' => [
            'type' => 'buttons',
            'title' => 'สถานะแสงสว่าง',
            'text' => 'เลือกส่วนที่ต้องการควบคุม',
            'actions' => [
                [
                    'type' => 'message',
                    'label' => $st_lamp_ww,
                    'text' => 'แสงสว่างทางเดิน'
                ],
                [
                    'type' => 'message',
                    'label' => $st_lamp_ws,
                    'text' => 'แสงสว่างห้องทำงาน'
                ],
                [
                    'type' => 'message',
                    'label' => $st_lamp_mt,
                    'text' => 'แสงสว่างห้องประชุม'
                ]
            ]
        ]
    ];
} 

elseif($message->{"text"} == 'แสงสว่างทางเดิน') {
    $messageData = [
        "type" => "template",
        "altText" => "แสงสว่างทางเดิน",
        "template" => [
          "type" => "confirm",
          "text" => $st_lamp_ww,
          "actions" => [
            [
              "type" => "message",
              "label" => "Yes",
              "text" => "yes"
            ],
            [
              "type" => "message",
              "label" => "No",
              "text" => "no"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'แสงสว่างห้องทำงาน') {
    $messageData = [
        'type' => 'text',
        'text' => "เปิดไฟห้องประชุมเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/front_door/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'แสงสว่างห้องประชุม') {
    $messageData = [
        'type' => 'text',
        'text' => "ปิดไฟห้องประชุมเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/front_door/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ####################################### End Lamp ###################################### //


elseif($message->{"text"} == 'ล็อกประตูหน้า') {
    $messageData = [
        'type' => 'text',
        'text' => "ล็อกประตูหน้าเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/front_door/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปลดล็อกประตูหน้า') {
    $messageData = [
        'type' => 'text',
        'text' => "ปลดล็อกประตูหน้าเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/front_door/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ล็อกประตูหลัง') {
    $messageData = [
        'type' => 'text',
        'text' => "ล็อกประตูหลังเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/back_door/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปลดล็อกประตูหลัง') {
    $messageData = [
        'type' => 'text',
        'text' => "ปลดล็อกประตูหลังเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/back_door/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ล็อกประตูห้องประชุม 1') {
    $messageData = [
        'type' => 'text',
        'text' => "ล็อกประตูห้องประชุม 1 เรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/Meeting_room_1_door/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปลดล็อกประตูห้องประชุม 1') {
    $messageData = [
        'type' => 'text',
        'text' => "ปลดล็อกประตูห้องประชุม 1 เรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/Meeting_room_1_door/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}
// #################### End Door ################### //
$response = [
    'replyToken' => $replyToken,
    'messages' => [$messageData]
];
error_log(json_encode($response));

$ch = curl_init('https://api.line.me/v2/bot/message/reply');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
));
$result = curl_exec($ch);
error_log($result);
curl_close($ch);

?>

<!--
<?php/*
require "vendor/autoload.php";
$access_token = '04jXv6we9MYpqRctFYw7mNbBUIU0Wb22RVFrmfSaJup0Ii+Uf3INLI5FzsSdP1uysuqnv/YvY300eOcXdgPygsQJ/QPsY1CTHe9QAoR2E14pw346tN2johPVIVUMO3CaBx/7W9TkKsXdTFRqL2+UJgdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'ee683a19a016dc7af6706b608f71d4c5';
$pushID = 'U25ededce0fb6209d9efa4a85be630e3c';

if($st_front_door == "ประตูยังไม่ได้ล็อค") {
  $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
  $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
  $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
  $response = $bot->pushMessage($pushID, $textMessageBuilder);
  echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
}
*/
?>
-->