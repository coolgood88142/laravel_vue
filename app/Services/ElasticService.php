<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Elasticsearch\ClientBuilder;
use Config;

class ElasticService
{
    public function connElastic()
    {
        $elastic = Config::get('elastic');

        $client = ClientBuilder::create()->setHosts($elastic['hosts'])->build();

        return $client;
    }

    public function createElastic($client, $data)
    {
        $response = $client->create($data);
    }

    public function updateElastic($client, $data)
    {
        $response = $client->update($data);
    }

    public function deleteElastic($client, $data)
    {
        $response = $client->delete($data);
    }

    public function addElastic()
    {
        $params =[
            'index' => 'channels' . date('YmdHms'),
            'type' => 'doc',
            'id' => 'channelsData'
        ];
    
        $params['body'] = [
            '@version': 1,
            'level': 'ERROR',
            'queryString': '/',
            '@timestamp': date_default_timezone_set('Asia/Taipei'),
            'host': 'cw-cms-cwg-tw-queue-64c67d5c6-nnrkj',
            'message' : 'Trying to get property 'updated_at' of non-object',
            'requestType': 'cmd',
            'type': 'product',
            'fields': {
                'tag': 'laravel',
                'type': 'laravel-log-cw-cms.cwg.tw'
            },
            'ctx_exception': {
                'trace': [
                    '/var/www/laravel/app/Jobs/SendLineArticles.php:50',
                ],
                "message": "Trying to get property 'updated_at' of non-object",
                "code": 0,
                "class": "ErrorException",
                "file": "/var/www/laravel/app/Jobs/SendLineArticles.php:50"
            },
            "input": {
                "type": "log"
            },
            "channel": "product"
        ];

        // "@version": 1,
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
    
        $client = $this->connElastic();
        $this->createElastic($client, $params);
    }
}
