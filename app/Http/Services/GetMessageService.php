<?php

namespace App\Http\Services;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use App\Mahasiswa;

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
        
        $msg = $formData['events']['0']['message'];
        logger( $msg['text'] );

        // $output = "Pencarian= " . $msg['text'] . " \nHasil :";
        
        // $msg['text'] = "Cari jessica";
        $msg['text'] = strtolower($msg['text']);
        $array = explode( " ", $msg['text'] );
        if(count($array) <= 1){
            // input tidak valid
        } else {
            if($array[0] == 'cari'){
                $t = substr($msg['text'], 5);
                $output = 'kata kunci : '.$t;
                $mhs = Mahasiswa::where('nama', 'like', '%' . $t . '%')->take(5)->get();
                foreach ($mhs as $k => $mh) {
                    // $output = $output . "<br/> (".$k.") " . $mh->nama;
                    $output = $output . "\n(".$k.") " . $mh->nama;                    
                }
            } else {
                $output = "perintah yang anda masukkan salah";
            }
        }
        
        // echo $output;

        $response = $this->bot->replyText($replyToken, $output);
        
        if ($response->isSucceeded()) {
            logger("reply success!!");
            return;
        }
    }

    public function getImg()
    {
        $url = "https://cybercampus.unair.ac.id/foto_mhs/".$msg['text'].".JPG";
        $imageMessageBuilder = new LINEBot\MessageBuilder\ImageMessageBuilder($url, $url);
        $this->bot->replyMessage($replyToken, $imageMessageBuilder);
    }

    public function cari($string)
    {
        
        return "";
    }
}