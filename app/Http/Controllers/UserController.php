<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Config;
use DateTime;

class UserController extends Controller
{
    public function userView(){
        return view('user');
    }

    public function select(){
        $users = DB::table('user_info')->paginate(5);

        return view('user', ['users' => $users]);
    }

    public function index()
    {
        $users = DB::table('user_info')->paginate(5);
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

        $data = [
            'name' => $name, 'birthday' => $birthday, 'counties' => $counties,
            'districts' => $districts, 'road' => $road, 'gender' => $gender,
            'email' => $email, 'interest' => $interest
        ];

        try {
            $users = DB::table('user_info')->insert($data);

        } catch (Exception $e) {
            $status = 'error';
            $message = '新增失敗!';
            dd($e);
        }
        
        return [ 'status' => $status, 'message' => $message, 'url' => route('getUserView')];
    }

    public function selectUserData(Request $request){
        $id = $request->id;
        $user = DB::table('user_info')->where('id', $id)->first();
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
            $user = DB::table('user_info')->whereIn('id', $id)->delete();

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

        $data = [ 
            'name' => $name, 'birthday' => $birthday, 'counties' => $counties,
            'districts' => $districts, 'road' => $road, 'gender' => $gender,
            'email' => $email, 'interest' => $interest
        ];

        try {
            $user = DB::table('user_info')->where('id', $request->id)->update($data);

        } catch (Exception $e) {
            $status = 'error';
            $message = '更新失敗!';
            dd($e);
        }
         return [ 'status' => $status, 'message' => $message, 'url' => route('getUserView')];
    }

    public function getChannelData(){
        //除了channel資料，其他可以從vue設定預設值，只用channels這個資料寫預設值
        $channel = Config::get('channel');
        return view('channel', [
            'channelsMaster' => $channel['master'], 
            'channelsSub' => $channel['sub'], 
            'masterSelected' => [1],
            'subSelected' => ['2-1']
        ]);
    }

    public function saveChannelData(Request $request){
        $master = $request->master;
        $sub = $request->sub;
        $master_data = array();
        $sub_data = array();
        $channel = Config::get('channel');

        foreach ($master as $key => $value) {
            $master_data[$key] = $value;
        }

        foreach ($sub as $key => $value) {
            $sub_data[$key] = $value;
        }

        return view('channel', [ 
            'channelsMaster' => $channel['master'], 
            'channelsSub' => $channel['sub'], 
            'masterSelected' => $master_data,
            'subSelected' => $sub_data
         ]);
    }

    public function getTextLength(Request $request){
        $length = 20;
        $text = 'hello<p>hi i am little boy. hello world 新增測試長度 2&!51561 你好,我是人</p>world';
        preg_match('/<p>([\s\S]*?)<\/p>/', $text, $tag);
        $matchText = $tag[1];
        
        // $chinese = preg_replace('/[^\p{Han}]+/u', '', $tagtext[1]);
        //preg_match()有找到第一次符合條件就會停止，改用preg_match_all才可以找到全部
        $chinese = '';
        preg_match_all('/\p{Han}+/u', $matchText, $chinese_match);
        foreach ($chinese_match[0] as $key => $value) {
            $chinese = $chinese . $value;
        }
        $chinese_length = (int)mb_strlen($chinese, "utf-8");

        //取英文字元,計算英文單字長度
        $english_length = (int)str_word_count($matchText);

        //取數字字元,將數字以外的字元取代成空白
        // $math = preg_replace('/[^0-9]/', '', $matchText);
        $math = '';
        preg_match_all('/[0-9]/', $matchText, $math_match);
        foreach ($math_match[0] as $key => $value) {
            $math = $math . $value;
        }
        $math_length = (int)strlen($math);

        //取特殊符號字元,將點(.)、數字、英文、底線、空白、中文取代成空白
        //特殊符號的簡寫\p{P}，但是會包含到點(.)
        // $symbol = preg_replace('/[.\w\s\p{Han}]+/u', '', $matchText);
        $symbol = '';
        preg_match_all('/[^.\w\s\p{Han}]+/u', $matchText, $symbol_match);
        foreach ($symbol_match[0] as $key => $value) {
            $symbol = $symbol . $value;
        }
        $symbole_length = (int)strlen($symbol);


        $all = $chinese_length + $english_length + $math_length + $symbole_length;
        $success = 'false';
        if($all>=20){
            $success = 'true';
        }

        $show = '回傳' . $success . ' 字元長度為' . $all;
        dd($show);

        // return view('text', )
        //英文單字+1 中文一個字+1
        //特殊符號+1
        //判斷字元>20為true ,<20為false
        //提示: 英文單字長度str_word_count 中文字長度mb_strlen()
        

    }

    public function TestCode(){
        $str = '本該是全球化最響亮1,本該是全球化最響亮2,本該是全球化最響3,本該是全球化最響亮4,本該是全球化最響亮5,本該是全球化最響亮6,本該是全球化最響亮7';
        $str_sec = explode(",",$str);
        $array1 = [];
        $array2 = [];
        // foreach($str_sec as $key => $value){
        //     if($key < 3){
        //         array_push($array1, $value);
        //     }else{
        //         array_push($array2, $value);
        //     }
        // }

        $array1_index = array_search('本該是全球化最響亮2', $str_sec);
        $length1 = count(range(0, $array1_index));
        
        $array1 = array_slice($str_sec, 0, $length1);
        $array2 = array_slice($str_sec, $length1);
        
        $array2_index = array_search('本該是全球化最響亮4', $array2);
        $length2 = count(range(0, $array2_index));
        $array2 = array_slice($str_sec, $length1, $length2);
        
        $array3_index = array_search('本該是全球化最響亮5', $str_sec);
        $array3 = array_slice($str_sec, $array3_index);

        print_r($array1);
        print_r($array2);
        print_r($array3);

        $array3 = implode(' ',$array2);
        // print_r($array3);
        
        $array1_key = "";
        // foreach ($array1 as $key => $value) {
        //     $array = [$value];
        //     if(in_array('2', $array)){
        //         print_r($key);
        //     }
        //    if(preg_match("/2/", $value)){
        //        $array1_key = $key;
        //    }
        // }

        
        // print_r($result);
        
        // $array1_key = array_keys($array1, '2');
        // $array1_key = array_search('2', $array1);
        // print_r($array1_key);
    }
    public function testFunction(){
        //3:8->03:08
        //5:59:4->59:04
        //3:10->03:10

        //DateTime在轉換時無法只用分鐘與秒數，必須要補上小時再轉才可以，不然會直接小時開始做轉換
        //暫時設定1小時
        $time1 = '3:8';
        $fulltime1 = '1:' . $time1;
        $datetime1 = new \DateTime($fulltime1);
        $minute1 = $datetime1->format('i:s');

        $time2 = '59:4';
        $fulltime2 = '1:' . $time2;
        $datetime2 = new \DateTime($fulltime2);
        $minute2 = $datetime2->format('i:s');

        $time3 = '3:10';
        $fulltime3 = '1:' . $time3;
        $datetime3 = new \DateTime($fulltime3);
        $minute3 = $datetime3->format('i:s');

        $minute = array($minute1, $minute2, $minute3);
        
        print_r($minute);
    }
}
