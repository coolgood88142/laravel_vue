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
        $users = ['name_value' => '', 'years_selected' => '', 'months_selected' => ''
        , 'days_selected' => '', 'counties_selected' => 0, 'districts_selected' => ''
        , 'road_value' => '', 'gender_value' => '', 'email_value' => ''
        , 'interest_value' => '', 'counties' => $city['counties'], 'districts' => $city['districts']];

        return view('edit', $users);
    }


    public function addData(Request $request)
    {
        $us_name = $request->us_name;
        $us_birthday = $request->us_month . '-' . $request->us_month . '-' . $request->us_day;

        $city = Config::get('city');
        $counties_data = $city['counties'][($request->us_counties)];
        $us_counties = $counties_data['text'];
        
        $districts_data = $city['districts'][$us_counties];
        $districts_index = array_search(($request->us_districts), $districts_data); 
        $us_districts = $districts_data[$districts_index]['text'];
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
        
        return view('user');
    }

    public function selectUserData(Request $request){
        $us_id = $request->us_id;
        $user = DB::table('user')->where('us_id', $us_id)->first();
        $name_value = $user->us_name;

        $birthday = explode("-",$user->us_birthday);
        $years_selected = $birthday[0];
        $months_selected = $birthday[1];
        $days_selected = $birthday[2];
        $counties_selected = $user->us_counties;
        $districts_selected = $user->us_districts;
        $road_value = $user->us_road;
        $gender_value = $user->us_gender;
        $email_value = $user->us_email;
        $interest_value = $user->us_interest;
        $city = Config::get('city');

        $users = ['name_value' => $name_value, 'years_selected' => $years_selected, 'months_selected' => $months_selected
        , 'days_selected' => $days_selected, 'counties_selected' => $counties_selected, 'districts_selected' => $districts_selected
        , 'road_value' => $road_value, 'gender_value' => $gender_value, 'email_value' => $email_value
        , 'interest_value' => $interest_value, 'counties' => $city['counties'], 'districts' => $city['districts']];
        // dd($users);

        return view('edit', $users);
    }

    public function deleteUserData(Request $request){
        $us_id = $request->us_id;
        $user = DB::table('user')->whereIn('us_id', $us_id)->delete();
        
        return view('user');
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
