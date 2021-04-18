<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\MasterChannels;
use App\Models\SubChannels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use GuzzleHttp\Client;
use Sheets;

class FormController extends Controller
{
    public function getFormUserData(Request $request)
    {
        $sheets = Sheets::spreadsheet('13DiX-Ca39sJP_j--ruilMd4oLKPE3fhNsfV79B04I-M')->sheet('問卷資料');
            $sheetsValue = $sheets->all();
        dd($sheetsValue );

        if(count($data) > 0){
            $this->addFormUserData($data);
            dd('新增成功!');
        }else{
            dd('沒有資料');
        }
    }

    public function addFormUserData($data)
    {
        try {
            $form = DB::table('form')->insert($data);

            $sheets = Sheets::spreadsheet('13DiX-Ca39sJP_j--ruilMd4oLKPE3fhNsfV79B04I-M')->sheet('問卷資料');
            $sheetsValue = $sheets->all();
            $count = 0;
            foreach($sheetsValue as $key => $value){
                //第6個欄位為狀態，判斷是否為false
                if($value[6] == "FALSE"){
                    $sheetsValue[$count][6] = "TRUE";
                }
                $count++;
            }

            $sheets->update($sheetsValue);
            
        } catch (Exception $e) {
            dd('新增資料錯誤');
        }
            
    }

    public function laravelTestCode() {
        // $data = MasterChannels::whereMonth('created_at', '05')->get();
        // $data = MasterChannels::all()->groupBy(function($item) {
        //     return $item->name;
        // });
        // $date = date('Y-m-d');
        $data = MasterChannels::has('subChannels')->get();
        dd($data);

    }

    public function validationUser(Request $request){

        //驗證姓名、信箱、性別的資料必填，姓名最大3個字
        // $validatedData = $request->validate([
        //     'name' => 'required|max:3',
        //     'email' => 'required',
        //     'gender' => 'required',
        // ]);

        //承上，下方在拋錯時，顯示提示訊息
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:3',
        //     'email' => 'required',
        //     'gender' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('validation')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        $name = $request->name;
        $gender = $request->gender;

        //驗證規則在user_info的資料表，條件裡找出name、 gender的唯一值
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:3',
            'gender' => [
                'required',
                Rule::unique('user_info')->where(function ($query) use ($name, $gender) {
                        return $query->where('name', $name)
                            ->where('gender', $gender);
                })
            ]
        ]);

        if ($validator->fails()) {
            return redirect('validation')
                ->withErrors($validator)
                ->withInput();
        }

        return redirect('validation')
            ->withErrors('驗證成功!')
            ->withInput();
    }
}
