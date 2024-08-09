<?php

namespace App\Http\Controllers;

use App\Http\Requests\VourcherRequest;
use App\Models\Vourchers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VourcherController extends Controller
{
    public function store(VourcherRequest $vourcherRequest){
        try {
            $validateData = $vourcherRequest->validated();
            $data = Vourchers::create($validateData);
            return ResponseController::responseSuccess('Successfully',$data);
        }catch(\Exception $exception) {
            return ResponseController::responseError($exception->getMessage());
        }

    }

    public function fetchAll(){
        try {
        $data = Vourchers::all();
        return ResponseController::responseFetch($data);
         }catch(\Exception $exception) {
            return ResponseController::responseError($exception->getMessage());
        }
    }

    public function fetchOnWhenSuccess(Request $request){
        try {
            $rule = Validator::make($request->all(), [
                'amount' => 'required|numeric',
                'phone' => 'required'
            ], [
                'amount.required' => "Missing Amount",
                'amount.numeric' => "Accept only Numbers",
                'phone.required' => 'Missing Phone Number'
            ]);
            if ($rule->fails()) {
                return ResponseController::responseError($rule->error()->first());
            }
            $amount = trim($request->amount);
            $phone = trim($request->phone);

            //search for voucher
            $data = Vourchers::query()->where('amount', $amount)->where('status', 'UNUSED')->first();
            if ($data) {
                //Send SMS
                $msg = 'Payment Successfully and your Voucher Code is: ' .$data->vourcher;
                $this->sendSMSMobile($phone,$msg);
                //Update Vourcher Table
                $data->status ='USED';
                $data->user_assigned = $phone;
                $data->save();
                return ResponseController::responseSuccess("ok",$data);
            }
        } catch (\Exception $exception) {
            return ResponseController::responseError($exception->getMessage());
        }

    }

    public function sendSMSMobile($phone,$msg){
        $endPoint = 'https://api.mnotify.com/api/sms/quick';
        $apiKey = env('SMS_KEY');
        $url = $endPoint . '?key=' . $apiKey;
        $data = [
            'recipient'=>[$phone],
            'sender'=>'Signal_WiFi',
            'message'=>$msg,
            'is_schedule'=>'false',
            'schedule_date'=>''
        ];
        $ch = curl_init();
        $headers = array();
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        $result = json_decode($result, TRUE);
        curl_close($ch);
        if($result['code'] === 2000 ){
            return $result['message'];
        }else{
            return 0;
        }
    }
}
