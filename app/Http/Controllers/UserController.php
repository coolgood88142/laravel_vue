<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Config;

class UserController extends Controller
{
    public function userView(){
        return view('user');
    }

    public function select(){
        $users = DB::table('user')->paginate(5);

        return view('user', ['users' => $users]);
    }

    public function index()
    {
        $users = DB::table('user')->paginate(5);
        $response = [
            'pagination' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem()
            ],
            'users' => $users
        ];
        //確認user資料是否為重複，要補上文件

        return response()->json($response);
    }

    public function getCityData()
    {
        $city = Config::get('city');
        $counties = array();
        $districts = array();
        $i=0;$j=0;

        foreach($city as $key => $value){
            $counties[$i]['text'] = $city[$key]['counties'];
            $counties[$i]['value'] = ($i+1);
            $k=0;
            $city_districts = array();
            foreach($city[$key]['districts'] as $district){
                $value = $city[$key]['value'];
                $city_districts[$j]['text'] = $district;
                $city_districts[$j]['value'] = $value[$k];
                $k++;
                $j++;
            }
            $districts[$i] = $city_districts;
            $i++;
        }


        return view('form', ['counties' => $counties, 'districts' => $districts]);
    }

    public function addData(Request $request)
    {
        $us_name = $request->us_name;
        $us_year = ((int)($request->us_year) + 1900);
        $us_month = $request->us_month;
        $us_month= $us_month < 10 ? '0' . $us_month : $us_month;
        $us_day = $request->us_day;
        $us_day= $us_month < 10 ? '0' . $us_day : $us_day;
        $us_birthday = $us_year . '-' . $us_month . '-' . $us_day;

        $us_city = Config::get('city');
        $counties_array = $us_city[(($request->us_counties) - 1)];
        $us_counties = $counties_array['counties'];

        $districts_index = array_search(($request->us_districts), $counties_array['value']); 
        $us_districts = $counties_array['districts'][$districts_index];
        $us_road = $request->us_road;

        $us_gender = $request->us_gender;
        $us_email = $request->us_email;
        $interest_array = $request->input('us_interest');

        $us_interest = '';
        foreach ($interest_array as $value){
            $us_interest = $us_interest . $value . ',';
        }
        $us_interest = substr($us_interest,0,-1);

        $users = DB::table('user')->insert(
            ['us_name' => $us_name, 'us_birthday' => $us_birthday, 'us_counties' => $us_counties,
             'us_districts' => $us_districts, 'us_road' => $us_road, 'us_gender' => $us_gender, 
             'us_email' => $us_email, 'us_interest' => $us_interest, 'us_status' => 1]
        );
        
        return redirect('user');
    }

    public function deleteUserData(Request $request){
        $us_id = $request->us_id;
        $user = DB::table('user')->where('us_id', $us_id)->delete();
    }

    //save新增與更新都可以使用，之後看看要怎麼改寫
    public function updateUserData(Request $request){
        $user = DB::table('user');

        $user->us_name = $request->us_name;
        $user->us_year = $request->us_year;
        $user->us_month = $request->us_month;
        $user->us_day = $request->us_day;
        $user->us_districts = $request->us_districts;
        $user->us_road = $request->us_road;
        $user->us_gender = $request->us_gender;
        $user->us_email = $request->us_email;
        $user->us_interest = $request->us_interest; 
        $user->save();
    }
}
