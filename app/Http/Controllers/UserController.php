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
    public function select(){
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
            'data' => $users
        ];
        dd($response);
        return $response['data'];
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
            'data' => $users
        ];

        return response()->json($response);
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
        foreach ($interest_array as $interest){
            $us_interest = $us_interest . $interest . '、';
        }
        // $us_interest = substr($us_interest,0,-1);
        // dd($us_interest);

        $users = DB::table('user')->insert(
            ['us_name' => $us_name, 'us_birthday' => $us_birthday, 'us_counties' => $us_counties,
             'us_districts' => $us_districts, 'us_road' => $us_road, 'us_gender' => $us_gender, 
             'us_email' => $us_email, 'us_interest' => $us_interest, 'us_status' => 1]
        );
        
        return redirect('user');
    }
}
