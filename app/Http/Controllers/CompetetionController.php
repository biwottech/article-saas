<?php

namespace App\Http\Controllers;
use App\Models\Competetion\Competetion;
use Illuminate\Http\Request;
class CompetetionController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth']);
    }

    public function EndCompetetion()
    {
    	if (!is_null($competetion = Competetion::where('start',1)->first())) {
        $ending = date('Y-m-d',strtotime($competetion->ending_date));
        $current = date('Y-m-d');
        if ($ending < $current){
            $data = [
                'start' => 0,
                'end' => 1,
                'ended_at' => date('Y-m-d'),
                'status' => "ENDED",
                'result_status' => "WAITING FOR RESULT",
            ];
            if ($competetion->update($data)) {
                 return "Competetion is Over & Date is Greator";
        }else{
            return "Not Updated error";
            }
        }elseif($current = $ending){
            $data = [
                'start' => 0,
                'end' => 1,
                'ended_at' => date('Y-m-d'),
                'status' => "ENDED",
                'result_status' => "WAITING FOR RESULT",
            ];
            if ($competetion->update($data)) {
                return "Competetion is Over & Date is Equal";
            }else{
            return "Not Updated error";
            }
        }else{
            return "Competetion Date is NOT Equal OR Less than";
        }
    	}else{
    		return "No Competetion error";
    	}
    }
}
