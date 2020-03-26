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
        $us_birthday = $request->us_year . '-' . $request->us_month . '-' . $request->us_day;

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
        $city = Config::get('city');

        $birthday = explode("-",$user->us_birthday);
        $years_selected = $birthday[0];
        $months_selected = (int)$birthday[1];
        $days_selected = (int)$birthday[2];

        $i=0;
        foreach($city['counties'] as $key => $counties){
            if($user->us_counties == $counties['text']){
                $counties_selected = $i;
                break;
            }
            $i++;
        }

        $districts_array = $city['districts'][$user->us_counties];
        foreach($districts_array as $key => $districts){
            if($user->us_districts == $districts['text']){
                $districts_selected = $districts['value'];
                break;
            }
        }

        $road_value = $user->us_road;
        $gender_value = $user->us_gender;
        $email_value = $user->us_email;
        $interests = explode(",",$user->us_interest);
        $interest_value = [];
        foreach($interests as $key => $value){
            array_push($interest_value, (int)$value);
        }

        $users = ['id_value' => $us_id, 'name_value' => $name_value, 'years_selected' => $years_selected, 'months_selected' => $months_selected
        , 'days_selected' => $days_selected, 'counties_selected' => (int)$counties_selected, 'districts_selected' => (int)$districts_selected
        , 'road_value' => $road_value, 'gender_value' => $gender_value, 'email_value' => $email_value
        , 'interest_value' => $interest_value, 'counties' => $city['counties'], 'districts' => $city['districts']];

        return view('edit', $users);
    }

    public function deleteUserData(Request $request){
        $us_id = $request->us_id;
        $user = DB::table('user')->whereIn('us_id', $us_id)->delete();
        
        return view('user');
    }

    public function updateUserData(Request $request){
        $us_name = $request->us_name;
        $us_month = str_pad($request->us_month,2,"0",STR_PAD_LEFT);
        $us_day = str_pad($request->us_day,2,"0",STR_PAD_LEFT);
        $us_birthday = (String)$request->us_year . '-' . $us_month . '-' . $us_day;

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

        try {
            $user = DB::table('user')->where('us_id', $request->us_id)->update(
                array(
                    'us_name' => $us_name, 'us_birthday' => $us_birthday, 'us_counties' => $us_counties,
                    'us_districts' => $us_districts, 'us_road' => $us_road, 'us_gender' => $us_gender,
                    'us_email' => $us_email, 'us_interest' => $us_interest
                )
            );

        } catch (Exception $e) {
            dd($e);
        }
         return view('user');
    }
}
