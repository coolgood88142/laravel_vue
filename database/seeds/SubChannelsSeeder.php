<?php

use App\Models\SubChannels;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('sub_channels')->insert([
        //     'master_id' => '1',
        //     'name' => '測試次頻道',
        //     'status' => '1',
        //     'sort' => '1',
        //     'url' => 'xxxxx.com.tw',
        //     'position' => '1'
        // ]);

        factory(SubChannels::class, 5)->create();
    }
}
