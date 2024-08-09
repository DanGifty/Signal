<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseController extends Controller
{
    public static function responseSuccess($msg,$data){
        return response()->json([
            'status'=>Response::HTTP_OK,
            'message' => $msg,
            'data'=>$data
        ], Response::HTTP_OK);
    }

    public static function responseError($msg){
        return response()->json([
            'status'=>Response::HTTP_FORBIDDEN,
            'message' => $msg,
        ], Response::HTTP_FORBIDDEN);
    }

    public static function responseFetch($data){
        return response()->json([
            'status'=>Response::HTTP_OK,
            'data'=>$data
        ], Response::HTTP_OK);
    }

    public static function sendSMS($phone, $msg){
        $endPoint = 'https://api.mnotify.com/api/sms/quick';
        $apiKey = env('SMS_KEY');
        $url = $endPoint . '?key=' . $apiKey;
        $data = [
            'recipient'=>[$phone],
            'sender'=>'APWS',
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
