<?php

namespace App\Http\Controllers;

use App\User;
use App\Services\ElasticService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SqlController extends Controller
{
    protected $elasticService;

    public function __construct(ElasticService $elasticService)
    {
        $this->elasticService = $elasticService;
    }

    public function selectData()
    {
        $users = User::where('us_status', 1);
        return view('select', ['users' => $users]);
    }

    public function testElastic()
    {
        //使用delete拿掉body
        $params =[
            'index' => 'elastic' . date('YmdHms'),
            'type' => 'data',
            'id' => 'el1'
        ];

        $params['body'] = [
            'id' => '6',
            'name' => 'Test1'
        ];

        //update
        // $params['body'] = [
        //     'doc' => [
        //         'id' => '3',
        //         'name' => 'test'
        //     ]
        // ];

        $client = $this->elasticService->addElastic(1, 'Kai');
        // $this->elasticService->createElastic($client, $params);
        // ElasticService::updateElastic($client, $params);
        // ElasticService::deleteElastic($client, $params);

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
}
