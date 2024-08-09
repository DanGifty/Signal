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

                //Update Vourcher Table
                $data->status ='USED';
                $data->user_assigned = $phone;
                $data->save();
            }
        } catch (\Exception $exception) {
            return ResponseController::responseError($exception->getMessage());
        }

    }
}
