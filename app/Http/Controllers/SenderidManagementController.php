<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SenderId;
//use App\Operator;
//use App\User;

class SenderidManagementController extends Controller
{
    public function addSenderid(Request $request)
    {


        $senderid = new SenderID();
        $senderid->senderid = $request->senderid;
        $senderid->user_id = $request->user_id;
        $senderid->operator_id = $request->operator_id;
        $senderid->descriptions = $request->descriptions;
        $senderid->status = "requested";
        $senderid->save();
         return response()->json($senderid,201);
    }

    public function index()
    {
        $senderid = SenderId::with('operators')->with('users')->get();
        if($senderid->isEmpty()){
            return "no senderID requested";
        }

        return response()->json($senderid, 201);
    }

    public function approveSenderid(Request $request,$id)
    {
        $senderid = SenderId::findorFail($id);
        if($senderid->status == "requested" || "disapproved")
        {
            $senderid->update(['status' => "approved"]);
            return response()->json($senderid,201);
        }
        //return Area::with('cities')->get();

    }

    public function disapproveId(Request $request,$id)
    {
        $senderid = SenderId::findorFail($id);
        if($senderid->status == "approved" || "requested")
        {
            $senderid->update(['status' => "disapproved"]);
            return response()->json($senderid,201);
        }
    }

    public function showbyId($id)
    {
        $senderid = SenderId::with('operators')->with('users')->find($id);
        return response()->json($senderid,201);
    }
}
