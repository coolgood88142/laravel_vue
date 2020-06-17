<?php

namespace App\Repositories;

use App\Models\SubChannels;
use Carbon\Carbon;

class SubChannelsRepository
{
    public function save($master_id, $name, $srot, $url, $position)
    {
        $sub_channels = new SubChannels(); 
        $sub_channels->master_id = $master_id;
        $sub_channels->name = $name;
        $sub_channels->status = '1';
        $sub_channels->srot = $srot;
        $sub_channels->url = $url;
        $sub_channels->position = $position;
        $sub_channels->save();
    }

    public function getSubChannelsAllData()
    {
        $sub_channels = SubChannels::with('master_channels')->get();
        return $sub_channels;
    }

    public function getMasterSubChannelsData($id)
    {   
        $sub_channels = SubChannels::with('master_channels')->where('sub_channels.id', $id)->first();
        return $sub_channels;
    }
}
