<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Elasticsearch\ClientBuilder;

class SqlController extends Controller
{
    public function selectData()
    {
        $users = User::where('us_status', 1);

        return view('select', ['users' => $users]);
    }

    public function testElastic()
    {
        $hosts = [
            '127.0.0.1:9200',         // IP + Port
            '127.0.0.1',              // Just IP
            'mydomain.server.com:9201', // Domain + Port
            'mydomain2.server.com',     // Just Domain
            'https://localhost',        // SSL to localhost
            'https://127.0.0.1:9200'  // SSL to IP + Port
        ];

        //使用delete拿掉body
        $params =[
            'index' => 'elastic20200619185616',
            'type' => 'data',
            'id' => 'el1',
            'body' => [
                'id' => '1',
                'name' => 'Ming'
            ]
        ];

        $client = ClientBuilder::create()->setHosts($hosts)->build();
        $response = $client->update($params);
        // dd($client);

        // {
        //     "_index": "laravel-2020.06.19",
        //     "_type": "doc",
        //     "_id": "M9w_zXIBP45zhJHoN23A",
        //     "_version": 1,
        //     "_score": null,
        //     "_source": {
        //         "@version": 1,
        //         "level": "ERROR",
        //         "queryString": "/",
        //         "@timestamp": "2020-06-19T15:42:51.000Z",
        //         "host": "cw-cms-cwg-tw-queue-64c67d5c6-nnrkj",
        //         "message": "Trying to get property 'updated_at' of non-object",
        //         "requestType": "cmd",
        //         "type": "product",
        //         "fields": {
        //         "tag": "laravel",
        //         "type": "laravel-log-cw-cms.cwg.tw"
        //         },
        //         "ctx_exception": {
        //         "trace": [
        //             "/var/www/laravel/app/Jobs/SendLineArticles.php:50",
        //         ],
        //         "message": "Trying to get property 'updated_at' of non-object",
        //         "code": 0,
        //         "class": "ErrorException",
        //         "file": "/var/www/laravel/app/Jobs/SendLineArticles.php:50"
        //         },
        //         "input": {
        //         "type": "log"
        //         },
        //         "channel": "product"
        //     },
        //     "fields": {
        //         "@timestamp": [
        //         "2020-06-19T15:42:51.000Z"
        //         ]
        //     },
        //     "sort": [
        //         1592581371000
        //     ]
        // }



    }

    public function connElastic(ClientBuilder $client)
    {
        $hosts = [
            '127.0.0.1:9200',         // IP + Port
            '127.0.0.1',              // Just IP
            'mydomain.server.com:9201', // Domain + Port
            'mydomain2.server.com',     // Just Domain
            'https://localhost',        // SSL to localhost
            'https://127.0.0.1:9200'  // SSL to IP + Port
        ];

        $client->setHosts($hosts)->build();

        return $client;
    }

    public function createElastic(ClientBuilder $client, Array $data)
    {
        $response = $client->create($data);
    }

    public function updateElastic(ClientBuilder $client, Array $data)
    {
        $response = $client->update($data);
    }

    public function deleteElastic(ClientBuilder $client, Array $data)
    {
        $response = $client->delete($data);
    }
}
