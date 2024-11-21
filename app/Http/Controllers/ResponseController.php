<?php

namespace App\Http\Controllers;

use App\Models\Vourchers;
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

    public static function getPackage(){
        $v = Vourchers::where('status','UNUSED')->orderBy('amount','asc')->get();
        $data = [];
        foreach($v as $vs){
            $vCount = Vourchers::where('status','UNUSED')->where('amount',$vs->amount)->count();
            if($vCount > 0){
                $amounts = array_column($data, 'amount');
                if (in_array($vs->amount, $amounts)) {

                } else {
                    $data[] = [
                        'amount'=>$vs->amount,
                    ];
                }

            }
        }
       self::showPack($data);
    }

    private static function showPack($data){
        foreach($data as $datas){
            $amount = floatval($datas['amount']);
            switch ($amount) {
                case 3.0:
                    echo '<option value="3">Ghs5.00 for 1.5GB Valid for 24hrs</option>';
                    break;
                case 5.0:
                    echo '<option value="5">Ghs5.00 for 1GB Non-Expiring</option>';
                    break;
                case 6.0:
                    echo '<option value="6">Ghs6.00 for Unlimited access for 12hrs</option>';
                    break;
                case 10.0:
                    echo '<option value="10">Ghs10 for 3GB Non-Expiring</option>';
                    break;
                case 12.0:
                    echo '<option value="12">Ghs12.00 for Unlimited access for 24hrs</option>';
                    break;
                case 65.0:
                    echo '<option value="65">Ghs65.00 for Unlimited access for 1 week</option>';
                    break;
                case 250.0:
                    echo '<option value="250">Ghs250.00 for unlimited Access for 30days</option>';
                    break;
                default:
                    echo '<option value="0">No Package Available</option>';
            }
        }
    }
}
