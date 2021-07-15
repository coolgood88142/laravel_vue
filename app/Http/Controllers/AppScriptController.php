<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainChannels;
use App\Models\SubMainChannels;
use App\Models\ArticlesSubChannels;

class AppScriptController extends Controller
{
    public function addChannelData(){
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://script.google.com/macros/s/AKfycby9EPEIgPCDR_likwJzS69dkk5aZgSuSnwnMXuOICfbzr4FFes/exec');
        $json = json_decode($response->getBody());

        $mainChannels = $json[0];
        $subChannels = $json[1];
        $articles = $json[2];

        $mainData = [];
        foreach($subChannels as $key => $value){
            $dataId = $value->id;
            array_push($mainData, $dataId);
        }

        $articlesData = [];
        foreach($articles as $key => $value){
            $dataKey = $value->key;
            array_push($articlesData, $dataKey);
        }

        $subMainChannels = [];$articlesSubChannels = [];
        foreach($subChannels as $key => $value){
            $id = $value->id;
            $key = $value->key;

            $mainId = array_search($key, $mainData);
            $subId = array_search($id, $articlesData);

            array_push($subMainChannels, $subChannels[$mainId][1]);
            array_push($articlesSubChannels, $subChannels[$subId][0]);
            
        }
        dd($mainData[1]);
        dd(array_search(2, $mainData));

        try {
            $SubMainChannels = new SubMainChannels();
            $keyword->en = $en;
            $keyword->tc = $tc;
            $keyword->save();
        } catch (Exception $e) {
            echo $e;
        }

        // $data = [];
        // foreach($json as $key => $value){
        //     $array = [];
        //     foreach($value as $a => $b){
        //         array_push($array, $b);
        //     }
        //     array_push($data, $array);
        // }

        // dd($data);

        
    }
}
