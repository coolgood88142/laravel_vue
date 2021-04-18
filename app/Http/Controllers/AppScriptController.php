<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainChannels;
use App\Models\SubChannels;
use App\Models\Articles;
use GuzzleHttp\Client;

class AppScriptController extends Controller
{
    public function addChannelData(){
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://script.google.com/macros/s/AKfycbwFZ0sBub3zNaQxHcwqQSmzmB5zMIi3Yj6JVjpoKjk/dev');
        $json = json_decode($response->getBody());
        dd($json);

        $data = [];
        foreach($json as $key => $value){
            $array = [];
            foreach($value as $a => $b){
                array_push($array, $b);
            }
            array_push($data, $array);
        }

        dd($data);

        
    }
}
