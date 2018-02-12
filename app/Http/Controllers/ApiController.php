<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    
    public function index()
    {
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('W8tQwPykagJeHU19x2GoqkiCj9l9P6ofSdfA2TWGvfwucMcnVXecX59aBs7lqfU45OjRtpkABbqZNgqDQk8KTTZEaNHJf/MWKENVWaFkj3q2sO/2eiOu7xa739J4LGsHmSZP8k8UnAyEOTExEdisvgdB04t89/1O/w1cDnyilFU=');
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '7f103fc401ae13302013413730f6b606']);

        return "hello";

        
    }

    public function replySend($formData)
    {
        $replyToken = $formData['events']['0']['replyToken'];
        
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('W8tQwPykagJeHU19x2GoqkiCj9l9P6ofSdfA2TWGvfwucMcnVXecX59aBs7lqfU45OjRtpkABbqZNgqDQk8KTTZEaNHJf/MWKENVWaFkj3q2sO/2eiOu7xa739J4LGsHmSZP8k8UnAyEOTExEdisvgdB04t89/1O/w1cDnyilFU=');
        $this->bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '7f103fc401ae13302013413730f6b606']);
        
        $response = $this->bot->replyText($replyToken, 'hello!');
        
        if ($response->isSucceeded()) {
            logger("reply success!!");
            return;
        }
    }
}
