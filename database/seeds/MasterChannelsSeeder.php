<?php

use App\Models\MasterChannels;
use App\Models\SubChannels;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MasterChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //要換成一對多產生新的關聯資料
        // factory(MasterChannels::class, 5)->create()->each(function($id){
        //     $id->sub_channels()->save(factory(SubChannels::class)->make());
        // });
    }
}
