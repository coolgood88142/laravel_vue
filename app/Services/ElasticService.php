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

    public function addElastic($value)
    {
        $params =[
            'index' => 'channels' . date('YmdHms'),
            'type' => 'data',
            'id' => 'channelsData'
        ];
    
        $params['body'] = [
            'id' => $key,
            'name' => $value
        ];
    
        $client = $this->connElastic();
        $this->createElastic($client, $params);
    }
}
