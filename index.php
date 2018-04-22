<!DOCTYPE html>
<html>
<head>
	<title>Smart Office</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script type="text/javascript">
    window.onload = function(){
      setInterval('Status_door("Status_door.php")',1000);
    }

    function Status_door() {
      var x = new XMLHttpRequest();
      x.open("get","Status_door.php");
      x.onreadystatechange = function(){
        var content = document.getElementById("Status_door");
        content.innerHTML = x.responseText;
      }
      x.send(null);
    }
  </script>

</head>
<body>
<div class="container">
<center>
	<br>
	<h1 class="display-4">Smart Office</h1>
  <div id="Status_door"></div>
  <?php 
    $st_door = '<div id="Status_door"></div>';
    //echo $st_door;
    $doc = new DOMDocument();
    $doc->loadHTML($buffer);
    $id = $doc->getElementById('Status_door');
    echo $id;
  ?>
</center>
</div>
</body>
</html>

<?php

$accessToken = '04jXv6we9MYpqRctFYw7mNbBUIU0Wb22RVFrmfSaJup0Ii+Uf3INLI5FzsSdP1uysuqnv/YvY300eOcXdgPygsQJ/QPsY1CTHe9QAoR2E14pw346tN2johPVIVUMO3CaBx/7W9TkKsXdTFRqL2+UJgdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

if ($message->{"text"} == 'แสงสว่าง') {
    $messageData = [
        'type' => 'template',
        'altText' => '確認ダイアログ',
        'template' => [
            'type' => 'confirm',
            'text' => '元気ですかー？',
            'actions' => [
                [
                    'type' => 'message',
                    'label' => '元気です',
                    'text' => '元気です'
                ],
                [
                    'type' => 'message',
                    'label' => 'まあまあです',
                    'text' => 'まあまあです'
                ],
            ]
        ]
    ];
} elseif ($message->{"text"} == 'แอร์') {
    // ボタンタイプ
    $messageData = [
        'type' => 'template',
        'altText' => 'ボタン',
        'template' => [
            'type' => 'buttons',
            'title' => 'タイトルです',
            'text' => '選択してね',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => 'webhookにpost送信',
                    'data' => 'value'
                ],
                [
                    'type' => 'uri',
                    'label' => 'googleへ移動',
                    'uri' => 'https://google.com'
                ]
            ]
        ]
    ];
} elseif ($message->{"text"} == 'ประตู') {
    // カルーセルタイプ
    $messageData = [
        'type' => 'template',
        'altText' => 'สถานะประตู',
        'template' => [
            'type' => 'carousel',
            'columns' => [
                [
                    'title' => 'ประตูหน้าบ้าน',
                    'text' => $id,
                    'actions' => [
                        [
                            'type' => 'message',
                            'label' => 'ล็อคประตู',
                            'text' => 'ล็อคประตู'
                        ],
                        [
                            'type' => 'message',
                            'label' => 'ปลดล็อคประตู',
                            'text' => 'ปลดล็อคประตู'
                        ]
                    ]
                ],
                [
                    'title' => 'ประตูหลังบ้าน',
                    'text' => "ok",
                    'actions' => [
                        [
                            'type' => 'message',
                            'label' => 'ล็อคประตู',
                            'text' => 'ล็อคประตู'
                        ],
                        [
                            'type' => 'message',
                            'label' => 'ปลดล็อคประตู',
                            'text' => 'ปลดล็อคประตู'
                        ]
                    ]
                ],
            ]
        ]
    ];
} else {
    $messageData = [
        'type' => 'text',
        'text' => "ผมไม่เข้าใจ"
    ];
}

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