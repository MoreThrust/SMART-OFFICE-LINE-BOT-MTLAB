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
                    'label' => $st_lamp_rt,
                    'text' => 'แสงสว่างห้องรับแขก'
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
                ],
                [
                    'type' => 'message',
                    'label' => 'แสงสว่างทั้งหมด',
                    'text' => 'แสงสว่างทั้งหมด'
                ]
            ]
        ]
    ];
} 

// ==================== Set RT ==================== //
elseif($message->{"text"} == 'แสงสว่างห้องรับแขก') {
    $messageData = [
        "type" => "template",
        "altText" => "แสงสว่างห้องรับแขก",
        "template" => [
          "type" => "confirm",
          "text" => $st_lamp_rt,
          "actions" => [
            [
              "type" => "message",
              "label" => "เปิดไฟ",
              "text" => "เปิดไฟห้องรับแขก"
            ],
            [
              "type" => "message",
              "label" => "ปิดไฟ",
              "text" => "ปิดไฟห้องรับแขก"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'เปิดไฟห้องรับแขก') {
    $messageData = [
        'type' => 'text',
        'text' => "เปิดไฟห้องรับแขกเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_reception_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปิดไฟห้องรับแขก') {
    $messageData = [
        'type' => 'text',
        'text' => "ปิดไฟห้องรับแขกเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_reception_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ==================== Set WS ==================== //
elseif($message->{"text"} == 'แสงสว่างห้องทำงาน') {
    $messageData = [
        "type" => "template",
        "altText" => "แสงสว่างห้องทำงาน",
        "template" => [
          "type" => "confirm",
          "text" => $st_lamp_ws,
          "actions" => [
            [
              "type" => "message",
              "label" => "เปิดไฟ",
              "text" => "เปิดไฟห้องทำงาน"
            ],
            [
              "type" => "message",
              "label" => "ปิดไฟ",
              "text" => "ปิดไฟห้องทำงาน"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'เปิดไฟห้องทำงาน') {
    $messageData = [
        'type' => 'text',
        'text' => "เปิดไฟห้องทำงานเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_workshop_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปิดไฟห้องทำงาน') {
    $messageData = [
        'type' => 'text',
        'text' => "ปิดไฟห้องทำงานเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_workshop_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ==================== Set MT ==================== //
elseif($message->{"text"} == 'แสงสว่างห้องประชุม') {
    $messageData = [
        "type" => "template",
        "altText" => "แสงสว่างห้องประชุม",
        "template" => [
          "type" => "confirm",
          "text" => $st_lamp_mt,
          "actions" => [
            [
              "type" => "message",
              "label" => "เปิดไฟ",
              "text" => "เปิดไฟห้องประชุม"
            ],
            [
              "type" => "message",
              "label" => "ปิดไฟ",
              "text" => "ปิดไฟห้องประชุม"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'เปิดไฟห้องประชุม') {
    $messageData = [
        'type' => 'text',
        'text' => "เปิดไฟห้องประชุมเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_meeting_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปิดไฟห้องประชุม') {
    $messageData = [
        'type' => 'text',
        'text' => "ปิดไฟห้องประชุมเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_meeting_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ==================== Set ALL ==================== //
elseif($message->{"text"} == 'แสงสว่างทั้งหมด') {
    $messageData = [
        "type" => "template",
        "altText" => "แสงสว่างทั้งหมด",
        "template" => [
          "type" => "confirm",
          "text" => 'ระบบแสงสว่างทั้งหมด',
          "actions" => [
            [
              "type" => "message",
              "label" => "เปิดไฟทั้งหมด",
              "text" => "เปิดไฟทั้งหมด"
            ],
            [
              "type" => "message",
              "label" => "ปิดไฟทั้งหมด",
              "text" => "ปิดไฟทั้งหมด"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'เปิดไฟทั้งหมด') {
    $messageData = [
        'type' => 'text',
        'text' => "เปิดไฟทั้งหมดเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_reception_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_workshop_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_meeting_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปิดไฟทั้งหมด') {
    $messageData = [
        'type' => 'text',
        'text' => "ปิดไฟทั้งหมดเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_reception_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_workshop_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/lamp_meeting_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ####################################### End Lamp ###################################### //

// ####################################### Air ###################################### //

if ($message->{"text"} == 'แอร์') {
    $messageData = [
        'type' => 'template',
        'altText' => 'ระบบทำความเย็น',
        'template' => [
            'type' => 'buttons',
            'title' => 'สถานะเครื่องทำความเย็น',
            'text' => 'เลือกส่วนที่ต้องการควบคุม',
            'actions' => [
                [
                    'type' => 'message',
                    'label' => $temp_air_rt,
                    'text' => 'แอร์ห้องรับแขก'
                ],
                [
                    'type' => 'message',
                    'label' => $temp_air_ws,
                    'text' => 'แอร์ห้องทำงาน'
                ],
                [
                    'type' => 'message',
                    'label' => $temp_air_mt,
                    'text' => 'แอร์ห้องประชุม'
                ],
                [
                    'type' => 'message',
                    'label' => 'แอร์ทั้งหมด',
                    'text' => 'แอร์ทั้งหมด'
                ]
            ]
        ]
    ];
} 

// ==================== Set RT ==================== //
elseif($message->{"text"} == 'แอร์ห้องรับแขก') {
    $messageData = [
        "type" => "template",
        "altText" => "แอร์ห้องรับแขก",
        "template" => [
          "type" => "confirm",
          "text" => $st_air_rt,
          "actions" => [
            [
              "type" => "message",
              "label" => "เปิดแอร์",
              "text" => "เปิดแอร์ห้องรับแขก"
            ],
            [
              "type" => "message",
              "label" => "ปิดแอร์",
              "text" => "ปิดแอร์ห้องรับแขก"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'เปิดแอร์ห้องรับแขก') {
    $messageData = [
        'type' => 'text',
        'text' => "เปิดแอร์ห้องรับแขกเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_reception_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปิดแอร์ห้องรับแขก') {
    $messageData = [
        'type' => 'text',
        'text' => "ปิดแอร์เรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_reception_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ==================== Set WS ==================== //
elseif($message->{"text"} == 'แอร์ห้องทำงาน') {
    $messageData = [
        "type" => "template",
        "altText" => "แอร์ห้องทำงาน",
        "template" => [
          "type" => "confirm",
          "text" => $st_air_ws,
          "actions" => [
            [
              "type" => "message",
              "label" => "เปิดแอร์",
              "text" => "เปิดแอร์ห้องทำงาน"
            ],
            [
              "type" => "message",
              "label" => "ปิดแอร์",
              "text" => "ปิดแอร์ห้องทำงาน"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'เปิดแอร์ห้องทำงาน') {
    $messageData = [
        'type' => 'text',
        'text' => "เปิดแอร์ห้องทำงานเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_workshop_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปิดแอร์ห้องทำงาน') {
    $messageData = [
        'type' => 'text',
        'text' => "ปิดแอร์ห้องทำงานเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_workshop_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ==================== Set MT ==================== //
elseif($message->{"text"} == 'แอร์ห้องประชุม') {
    $messageData = [
        "type" => "template",
        "altText" => "แอร์ห้องประชุม",
        "template" => [
          "type" => "confirm",
          "text" => $st_air_mt,
          "actions" => [
            [
              "type" => "message",
              "label" => "เปิดแอร์",
              "text" => "เปิดแอร์ห้องประชุม"
            ],
            [
              "type" => "message",
              "label" => "ปิดแอร์",
              "text" => "ปิดแอร์ห้องประชุม"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'เปิดแอร์ห้องประชุม') {
    $messageData = [
        'type' => 'text',
        'text' => "เปิดแอร์ห้องประชุมเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_meeting_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปิดแอร์ห้องประชุม') {
    $messageData = [
        'type' => 'text',
        'text' => "ปิดแอร์ห้องประชุมเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_meeting_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ==================== Set ALL ==================== //
elseif($message->{"text"} == 'แอร์ทั้งหมด') {
    $messageData = [
        "type" => "template",
        "altText" => "แอร์ทั้งหมด",
        "template" => [
          "type" => "confirm",
          "text" => 'ระบบแอร์ทั้งหมด',
          "actions" => [
            [
              "type" => "message",
              "label" => "เปิดทั้งหมด",
              "text" => "เปิดแอร์ทั้งหมด"
            ],
            [
              "type" => "message",
              "label" => "ปิดทั้งหมด",
              "text" => "ปิดแอร์ทั้งหมด"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'เปิดแอร์ทั้งหมด') {
    $messageData = [
        'type' => 'text',
        'text' => "เปิดแอร์ทั้งหมดเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_reception_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_workshop_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_meeting_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปิดแอร์ทั้งหมด') {
    $messageData = [
        'type' => 'text',
        'text' => "ปิดแอร์ทั้งหมดเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_reception_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_workshop_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/air_meeting_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ####################################### End Air ###################################### //

// ####################################### Door ###################################### //

if ($message->{"text"} == 'ประตู') {
    $messageData = [
        'type' => 'template',
        'altText' => 'ระบบความปลอดภัย',
        'template' => [
            'type' => 'buttons',
            'title' => 'สถานะความปลอดภัย',
            'text' => 'เลือกประตูที่ต้องการควบคุม',
            'actions' => [
                [
                    'type' => 'message',
                    'label' => $st_door_et,
                    'text' => 'ประตูทางเข้า'
                ],
                [
                    'type' => 'message',
                    'label' => $st_door_ws,
                    'text' => 'ประตูห้องทำงาน'
                ],
                [
                    'type' => 'message',
                    'label' => $st_door_mt,
                    'text' => 'ประตูห้องประชุม'
                ],
                [
                    'type' => 'message',
                    'label' => 'ประตูทั้งหมด',
                    'text' => 'ประตูทั้งหมด'
                ]
            ]
        ]
    ];
} 

// ==================== Set ET ==================== //
elseif($message->{"text"} == 'ประตูทางเข้า') {
    $messageData = [
        "type" => "template",
        "altText" => "ประตูทางเข้า",
        "template" => [
          "type" => "confirm",
          "text" => $st_door_et,
          "actions" => [
            [
              "type" => "message",
              "label" => "ล็อกประตู",
              "text" => "ล็อกประตูทางเข้า"
            ],
            [
              "type" => "message",
              "label" => "ปลดล็อกประตู",
              "text" => "ปลดล็อกประตูทางเข้า"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'ล็อกประตูทางเข้า') {
    $messageData = [
        'type' => 'text',
        'text' => "ล็อกประตูทางเข้าเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_entrance/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปลดล็อกประตูทางเข้า') {
    $messageData = [
        'type' => 'text',
        'text' => "ปลดล็อกประตูทางเข้าเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_entrance/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ==================== Set WS ==================== //
elseif($message->{"text"} == 'ประตูห้องทำงาน') {
    $messageData = [
        "type" => "template",
        "altText" => "ประตูห้องทำงาน",
        "template" => [
          "type" => "confirm",
          "text" => $st_door_ws,
          "actions" => [
            [
              "type" => "message",
              "label" => "ล็อกประตู",
              "text" => "ล็อกประตูห้องทำงาน"
            ],
            [
              "type" => "message",
              "label" => "ปลดล็อกประตู",
              "text" => "ปลดล็อกประตูห้องทำงาน"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'ล็อกประตูห้องทำงาน') {
    $messageData = [
        'type' => 'text',
        'text' => "ล็อกประตูทำงานเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_workshop_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปลดล็อกประตูห้องทำงาน') {
    $messageData = [
        'type' => 'text',
        'text' => "ปลดล็อกประตูห้องทำงานเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_workshop_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ==================== Set MT ==================== //
elseif($message->{"text"} == 'ประตูห้องประชุม') {
    $messageData = [
        "type" => "template",
        "altText" => "ประตูห้องประชุม",
        "template" => [
          "type" => "confirm",
          "text" => $st_door_mt,
          "actions" => [
            [
              "type" => "message",
              "label" => "ล็อกประตู",
              "text" => "ล็อกประตูห้องประชุม"
            ],
            [
              "type" => "message",
              "label" => "ปลดล็อกประตู",
              "text" => "ปลดล็อกประตูห้องประชุม"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'ล็อกประตูห้องประชุม') {
    $messageData = [
        'type' => 'text',
        'text' => "ปลดล็อกประตูห้องประชุมเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_meeting_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปลดล็อกประตูห้องประชุม') {
    $messageData = [
        'type' => 'text',
        'text' => "ปลดล็อกประตูประชุมเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_meeting_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ==================== Set ALL ==================== //
elseif($message->{"text"} == 'ประตูทั้งหมด') {
    $messageData = [
        "type" => "template",
        "altText" => "ประตูทั้งหมด",
        "template" => [
          "type" => "confirm",
          "text" => 'ประตูทั้งหมด',
          "actions" => [
            [
              "type" => "message",
              "label" => "ล็อกประตู",
              "text" => "ล็อกประตูทั้งหมด"
            ],
            [
              "type" => "message",
              "label" => "ปลดล็อกประตู",
              "text" => "ปลดล็อกประตูทั้งหมด"
            ]
          ]
        ]
    ];
}elseif($message->{"text"} == 'ล็อกประตูทั้งหมด') {
    $messageData = [
        'type' => 'text',
        'text' => "ล็อกประตูทั้งหมดเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_entrance/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_workshop_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_meeting_room/1',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}elseif($message->{"text"} == 'ปลดล็อกประตูทั้งหมด') {
    $messageData = [
        'type' => 'text',
        'text' => "ปลดล็อกประตูทั้งหมดเรียบร้อยแล้ว"
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_entrance/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_workshop_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.anto.io/channel/set/4GZewdAlDhxWz6ijHnvDSh73Q9rxeOjYNx0SLRgl/Smart_Office/door_meeting_room/0',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    $resp = curl_exec($curl);curl_close($curl);
}

// ####################################### End Door ###################################### //

// ####################################### Status ###################################### //

if ($message->{"text"} == 'สถานะ') {
    $messageData = [
        "type" => "text",
        "text" => "🎛️ สถานะโดยรวม\n🔆 สถานะแสงสว่าง\n- ".$st_lamp_rt."\n- ".$st_lamp_ws."\n- ".$st_lamp_mt."\n\n❄️ สถานะเครื่องทำความเย็น\n- ".$st_air_rt."\n- ".$st_air_ws."\n- ".$st_air_mt."\n\n🔒 สถานะความปลอดภัย\n- ".$st_door_et."\n- ".$st_door_ws."\n- ".$st_door_mt
    ];
} 

// ####################################### End Status ###################################### //

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