<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function show()
    {
        $users = DB::table('user')->get();

        return view('user', ['users' => $users]);
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

        $us_counties = $request->us_counties;
        $us_districts = $request->us_districts;
        $us_road = $request->us_road;
        $us_address = $us_counties . $us_districts . $us_road;

        $us_gender = $request->us_gender;
        $us_email = $request->us_email;
        $us_interest = $request->us_interest;
        $datetime = Carbon::now();

        $users = DB::table('user')->insert(
            ['us_account' => '', 'us_password' => '', 'us_name' => $us_name, 'us_birthday' => $us_birthday,
            'us_address' => '', 'us_gender' => $us_gender, 'us_email' => $us_email, 'us_interest' => $us_interest, 
            'us_admin' => 'N', 'us_status' => 1, 'us_last_login' => $datetime, 'us_headshot_path' => '']
        );
        
        return redirect('user');
    }
}
