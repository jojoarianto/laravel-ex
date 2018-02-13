<?php

namespace App\Http\Services;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;

class GetMessageService
{
    /**
     * @var LINEBot
     */
    private $bot;
    /**
     * @var HTTPClient
     */
    private $client;
    
    
    public function replySend($formData)
    {
        $replyToken = $formData['events']['0']['replyToken'];
        
        $this->client = new CurlHTTPClient("W8tQwPykagJeHU19x2GoqkiCj9l9P6ofSdfA2TWGvfwucMcnVXecX59aBs7lqfU45OjRtpkABbqZNgqDQk8KTTZEaNHJf/MWKENVWaFkj3q2sO/2eiOu7xa739J4LGsHmSZP8k8UnAyEOTExEdisvgdB04t89/1O/w1cDnyilFU=");
        $this->bot = new LINEBot($this->client, ['channelSecret' => "7f103fc401ae13302013413730f6b606" ]);
        
        $formData['events']['0']['replyToken'];
        if(['events']['0']['text'] == '1'){
            $response = $this->bot->replyText($replyToken, "Your input is = 1");        
        } 
        if(['events']['0']['text'] == '2'){
            $response = $this->bot->replyText($replyToken, "Your input is = 2");        
        }
        if(['events']['0']['text'] == '3'){
            $imageMessageBuilder = new ImageMessageBuilder('https://laravel-mysql-persistent-katakanunair.a3c1.starter-us-west-1.openshiftapps.com/img/081611633032.jpg', 'https://laravel-mysql-persistent-katakanunair.a3c1.starter-us-west-1.openshiftapps.com/img/081611633032.jpg');
            $response = $this->bot->replyText($replyToken, $imageMessageBuilder);        
        }
        // $imageMessageBuilder = new ImageMessageBuilder('https://cybercampus.unair.ac.id/foto_mhs/081611633032.JPG', 'https://cybercampus.unair.ac.id/foto_mhs/081611633032.JPG');
        // $bot->replyMessage($replyToken, $imageMessageBuilder);

        // $response = $this->bot->replyText($replyToken, $imageMessageBuilder);
        // $response = $this->bot->replyText($replyToken, "Your input is = ");
        
        if ($response->isSucceeded()) {
            logger("reply success!!");
            return;
        }
    }
}