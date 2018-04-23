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

$accessToken = '04jXv6we9MYpqRctFYw7mNbBUIU0Wb22RVFrmfSaJup0Ii+Uf3INLI5FzsSdP1uysuqnv/YvY300eOcXdgPygsQJ/QPsY1CTHe9QAoR2E14pw346tN2johPVIVUMO3CaBx/7W9TkKsXdTFRqL2+UJgdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

if ($val[7] == '1') {
    $messageData = [
        'type' => 'template',
        'altText' => '確認ダイアログ',
        'template' => [
            'type' => 'confirm',
            'text' => 'คุณต้องการทำอะไร？',
            'actions' => [
                [
                    'type' => 'message',
                    'label' => 'เปิดประตู',
                    'text' => 'เปิดประตู'
                ],
                [
                    'type' => 'message',
                    'label' => 'ปิดประตู',
                    'text' => 'ปิดประตู'
                ],
            ]
        ]
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