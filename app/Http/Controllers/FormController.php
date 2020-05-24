<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Google;
use Sheets;

class FormController extends Controller
{
    public function getFormUserData(Request $request)
    {
        //使用guzzle
        // $json = json_decode(file_get_contents('https://script.googleusercontent.com/macros/echo?user_content_key=-yex6UFY5iOjrDBSTF9Xk-tuy_e1WRzVdLXbLWBehCM0_M36v8eUV5JI_lr40LVHZmcKQaLgNg2NILiGhWlTjpxtast2Plb-m5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnCXgUTRdgqXj3Aq3ZTlpz-TBJKUm1HAR0A93zL_jSiszuca-6WkGG1kr6HoIsCLXONveWPraiRQB&lib=MxgXVhpOa8KXE62faMUKC2eGkeYm2IhVF'), true);
        // dd($json);
        // $data = [];
        // foreach($json as $key => $value){
        //     $array = [
        //         'name' => $value['name'],
        //         'email' => $value['email'], 
        //         'phone' => $value['phone'],
        //         'remarks' => $value['remarks']
        //     ];

        //     array_push($data, $array);
        // }

        // if(count($data) > 0){
        //     $this->addFormUserData($data);
        // }
        // dd($data);

        // $sheets = Sheets::spreadsheet('13DiX-Ca39sJP_j--ruilMd4oLKPE3fhNsfV79B04I-M')
        // -> sheetById('問卷資料')
        // -> all();

        $googleClient = Google::getClient();
        // dd($googleClient);
        $storage = Google::make('storage');
        $storage->buckets->listBuckets('project id');
        dd($storage);
        // $user = $request->user();

        // $token = [
        //     'access_token'  => $user->access_token,
        //     'refresh_token' => $user->refresh_token,
        //     'expires_in'    => $user->expires_in,
        //     'created'       => $user->updated_at->getTimestamp(),
        // ];

        // // all() returns array
        // $sheets = Sheets::setAccessToken($token)->spreadsheet('13DiX-Ca39sJP_j--ruilMd4oLKPE3fhNsfV79B04I-M')
        // ->sheet('問卷資料')->all();

        dd($sheets);
    }

    public function addFormUserData($data)
    {
        try {
            $form = DB::table('form')->insert($data);
        } catch (Exception $e) {
            dd($e);
        }
            
    }
}
