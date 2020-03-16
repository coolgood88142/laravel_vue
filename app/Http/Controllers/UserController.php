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

    public function getFormData()
    {
        $city = Config::get('city');

        return view('form', ['counties' => $city['counties'], 'districts' => $city['districts']]);
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

    public function selectUserData(Request $request){
        $us_id = $request->us_id;
        $user = DB::table('user')->where('us_id', $us_id)->get();
        $name_value = $user->us_name;
        $years_selected = $user->us_year;
        $months_selected = $user->us_month;
        $days_selected = $user->us_day;
        $counties_selected = $user->us_counties;
        $districts_selected = $user->us_districts;
        $road_value = $user->us_road;
        $gender_value = $user->us_gender;
        $email_value = $user->us_email;
        $interest_value = $user->us_interest;
        $city_data = $this.getCityData();
        dd($city_data);

        return response()->json(['name_value' => $name_value, 'years_selected' => $years_selected, 'months_selected' => $months_selected
        , 'days_selected' => $days_selected, 'counties_selected' => $counties_selected, 'districts_selected' => $districts_selected
        , 'road_value' => $road_value, 'gender_value' => $gender_value, 'email_value' => $email_value
        , 'interest_value' => $interest_value, 'counties' => $city_data.counties, 'districts' => $city_data.districts]);
    }

    public function deleteUserData(Request $request){
        $us_id = $request->us_id;
        $user = DB::table('user')->where('us_id', $us_id)->delete();
        
        return redirect('user');
    }

    //save新增與更新都可以使用，之後看看要怎麼改寫
    public function updateUserData(Request $request){
        $user = DB::table('user');

        $user->us_name = $request->us_name;
        $user->us_year = $request->us_year;
        $user->us_month = $request->us_month;
        $user->us_day = $request->us_day;
        $user->us_counties = $request->us_counties;
        $user->us_districts = $request->us_districts;
        $user->us_road = $request->us_road;
        $user->us_gender = $request->us_gender;
        $user->us_email = $request->us_email;
        $user->us_interest = $request->us_interest; 
        $user->save();
    }
}
