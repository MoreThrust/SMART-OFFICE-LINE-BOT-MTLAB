<?php
$access_token = '1bKxA7ZGjp2P1/6GIBIFiniTJanflttAOEX9svJZKHd4GpTi8fN3VWegRlq1L/wgptw7W7/GvqBFOQTlFYzWNwh3CQy7K0+dKnPuqgZqu9Lj3L/Y2jz8SZnm+Yj7Lqbi9TwbIAGkk2LSA6tD/fWvlwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
