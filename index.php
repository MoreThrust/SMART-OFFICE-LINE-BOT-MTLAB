<?php
include ('line-bot-api/php/line-bot.php');

$channelSecret = 'c9c166d3003df0b730928ef211b86967';
$access_token  = '04jXv6we9MYpqRctFYw7mNbBUIU0Wb22RVFrmfSaJup0Ii+Uf3INLI5FzsSdP1uysuqnv/YvY300eOcXdgPygsQJ/QPsY1CTHe9QAoR2E14pw346tN2johPVIVUMO3CaBx/7W9TkKsXdTFRqL2+UJgdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
  
if (!empty($bot->isEvents)) {
    
  $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

  if ($bot->isSuccess()) {
    echo 'Succeeded!';
    exit();
  }

  // Failed
  echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
  exit();

}