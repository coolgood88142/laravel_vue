<?php

namespace App\Http\Controllers;

use App\Models\Users;
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
        $gender = Config::get('gender');
        $users = [
            'id_value' => '', 'name_value' => '', 'years_selected' => 0, 'months_selected' => 0,
            'days_selected' => 0, 'counties_selected' => 0, 'districts_selected' => 0,
            'road_value' => '', 'gender_value' => '', 'email_value' => '',
            'interest_value' => [], 'counties' => $city['counties'], 'districts' => $city['districts'],
            'gender_data' => $gender['data'],'url' => route('add')
        ];

        return view('edit', $users);
    }


    public function addData(Request $request)
    {
        $name = $request->name;
        $birthday = $request->birthday;
        $counties = $request->counties;
        $districts = $request->districts;
        $road = $request->road;
        $gender = $request->gender;
        $email = $request->email;
        $interest = $request->interest;
        $status = 'success';
        $message = '新增成功!';

        try {
            $users = DB::table('user')->insert(
                [
                    'name' => $name, 'birthday' => $birthday, 'counties' => $counties,
                    'districts' => $districts, 'road' => $road, 'gender' => $gender,
                    'email' => $email, 'interest' => $interest, 'status' => 1
                ]
            );

        } catch (Exception $e) {
            $status = 'error';
            $message = '新增失敗!';
            dd($e);
        }
        
        return [ 'status' => $status, 'message' => $message, 'url' => route('getUserView')];
    }

    public function selectUserData(Request $request){
        $id = $request->id;
        $user = DB::table('user')->where('id', $id)->first();
        $name_value = $user->name;
        $city = Config::get('city');
        $gender = Config::get('gender');

        $birthday = explode("-",$user->birthday);
        $years_selected = (int)$birthday[0];
        $months_selected = (int)$birthday[1];
        $days_selected = (int)$birthday[2];

        $i=0;
        foreach($city['counties'] as $key => $counties){
            if($user->counties == $counties['text']){
                $counties_selected = $i;
                break;
            }
            $i++;
        }

        $districts_array = $city['districts'][$user->counties];
        foreach($districts_array as $key => $districts){
            if($user->districts == $districts['text']){
                $districts_selected = $districts['value'];
                break;
            }
        }

        $road_value = $user->road;
        $gender_value = $user->gender;
        $email_value = $user->email;
        $interests = explode(",",$user->interest);
        $interest_value = [];
        foreach($interests as $key => $value){
            array_push($interest_value, (int)$value);
        }

        $users = [
            'id_value' => $id, 'name_value' => $name_value, 'years_selected' => $years_selected,
            'months_selected' => $months_selected, 'days_selected' => $days_selected,
            'counties_selected' => (int)$counties_selected, 'districts_selected' => (int)$districts_selected,
            'road_value' => $road_value, 'gender_value' => $gender_value, 'email_value' => $email_value,
            'interest_value' => $interest_value, 'counties' => $city['counties'], 'districts' => $city['districts'],
            'gender_data' => $gender['data'], 'url' => route('update')
        ];

        return view('edit', $users);
    }

    public function deleteUserData(Request $request){
        $id = $request->id;
        $status = 'success';
        $message = '刪除成功!';
        
        try {
            // $user = DB::table('user')->whereIn('id', $id)->delete();

        } catch (Exception $e) {
            $status = 'error';
            $message = '刪除失敗!';
            dd($e);
        }
         return [ 'status' => $status, 'message' => $message, 'url' => route('getUserView')];
    }

    public function updateUserData(Request $request){
        $name = $request->name;
        $birthday = $request->birthday;
        $counties = $request->counties;
        $districts = $request->districts;
        $road = $request->road;
        $gender = $request->gender;
        $email = $request->email;
        $interest = $request->interest;
        $status = 'success';
        $message = '更新成功!';

        //先查詢在更新(不然us_id的值是空的話怎麼辦)
        try {
            $user = DB::table('user')->where('id', $request->id)->update(
                array(
                    'name' => $name, 'birthday' => $birthday, 'counties' => $counties,
                    'districts' => $districts, 'road' => $road, 'gender' => $gender,
                    'email' => $email, 'interest' => $interest
                )
            );

        } catch (Exception $e) {
            $status = 'error';
            $message = '更新失敗!';
            dd($e);
        }
         return [ 'status' => $status, 'message' => $message, 'url' => route('getUserView')];
    }
}
