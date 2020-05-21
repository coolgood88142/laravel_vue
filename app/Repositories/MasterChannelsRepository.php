<?php

namespace App\Repositories;

use App\Models\MasterChannels;
use Carbon\Carbon;

class MasterChannelsRepository
{
    public function save($name, $srot, $url, $position)
    {
        $master_channels = new MasterChannels(); 
        $master_channels->name = $name;
        $master_channels->status = '1';
        $master_channels->srot = $srot;
        $master_channels->url = $url;
        $master_channels->position = $position;
        $master_channels->save();
    }

    public function getMasterChannelsAllData()
    {
        $master_channels = MasterChannels::with('sub_channels')->get();
        return $master_channels;
    }

    public function getMasterSubChannelsData($id)
    {   
        $master_channels = MasterChannels::with('sub_channels')->where('master_channels.id', $id)->get();
        return $master_channels;
    }
}
