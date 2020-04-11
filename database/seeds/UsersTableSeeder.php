<?php
// namespace Database\Seeders;

use App\UserInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('user_info')->insert([
        //     'name' => Str::random(10),
        //     'birthday' => '1900-01-01',
        //     'counties' => '臺北市',
        //     'districts' => '新北市',
        //     'road' => 'xx路xx巷xx號',
        //     'gender' => 'R',
        //     'email' => Str::random(10).'@gmail.com',
        //     'interest' => '0,1',
        // ]);

        factory(UserInfo::class, 5)->create();
        
    }
}
