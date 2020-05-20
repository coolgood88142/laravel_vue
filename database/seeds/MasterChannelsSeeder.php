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
        // DB::table('master_channels')->insert([
        //     'name' => '測試主頻道',
        //     'status' => '1',
        //     'sort' => '1',
        //     'url' => 'xxxxx.com.tw',
        //     'position' => '1'
        // ]);

        // factory(MasterChannels::class, 5)->create();

        factory(MasterChannels::class, 5)->create()->each(function($id){
            $id->posts()->save(factory(SubChannels::class)->make());
        });
    }
}
