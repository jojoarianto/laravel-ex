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

        // $data = json_decode($body, true);
        // $data = $formData;
        // if(is_array($formData['events'])){
        //     foreach ($data['events'] as $event)
        //     {
        //         if ($event['type'] == 'message')
        //         {
        //             if($event['message']['type'] == 'text')
        //             {
        //                 // send same message as reply to user
        //                 $result = $bot->replyText($event['replyToken'], $event['message']['text']);
        
        //                 // or we can use replyMessage() instead to send reply message
        //                 // $textMessageBuilder = new TextMessageBuilder($event['message']['text']);
        //                 // $result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
        
        //                 // return $response->withJson($result->getJSONDecodedBody(), $result->getHTTPStatus());
        //             }
        //         }
        //     }
        // }

        // http://mbot.goprint.id/img/081611633032.jpg


        
        $msg = $formData['events']['0']['message'];
        logger( $msg['text'] );

        $output = "Download image = " . $msg['text'] . " \nHasil :";
        // $response = $this->bot->replyText($replyToken, $output);

        $url = $msg['text'];
        $imageMessageBuilder = new LINEBot\MessageBuilder\ImageMessageBuilder($url, $url);
        $this->bot->replyMessage($replyToken, $imageMessageBuilder);
        
        if ($response->isSucceeded()) {
            logger("reply success!!");
            return;
        }
    }
}