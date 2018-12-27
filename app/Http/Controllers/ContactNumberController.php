<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactNumber;
use App\ContactList;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class ContactNumberController extends Controller
{
    //
    public function show(){

    }

    public function insertsingle(Request $request,$id)
    {

        $contactlist = ContactList::find($id);
       // dd($contactlists);
        $contactnumber =new ContactNumber();
        $contactnumber->contactlist_id = $contactlist->id;
        $contactnumber->phone_number = $request->phone_number;
        $contactnumber->username = $request->username;
        $contactnumber->save();
       // dd($contactnumber);
        return response()->json($contactnumber,201);

    }

    public function insertmultiple(Request $request){
        // return $request->all();


       // $results = [];
         $results = $request->phone_number;
         $str_arr = explode (",", $results);
         $data = array();
         $repeat = array();
         foreach($str_arr as $result)
         {
             if($result)
               {
                    $contactnumber = new ContactNumber();
                    $contactlist = ContactNumber::where('contactlist_id',$request->contactlist_id)->where('phone_number', $result)->first();
                    $repeat[] = $contactlist;
                    if(!$contactlist) {
                        $contactnumber->contactlist_id = $request->contactlist_id;
                        $contactnumber->phone_number = $result;
                        $contactnumber->save();
                        $data[] = $contactnumber;
                    }
                }

         }
        return response()->json(['success data'=>$data,'repeated numbers' => $repeat]);


    }

    public function import(Request $request){
        $path = $request->file('phone_number')->getRealPath();
        $data = Excel::load($path)->get();//->toArray();
       // dd($data);
        $results= array();
        foreach($data as $result){
          if($result)
            {
                $contactnumber = new ContactNumber();
                $contactlist = ContactNumber::where('contactlist_id',$request->contactlist_id)->where('phone_number', $result->phone_number)->first();
                if(!$contactlist)
                {
                    $contactnumber->contactlist_id = $request->contactlist_id;
                    $contactnumber->phone_number = $result->phone_number;
                    $contactnumber->username = $result->username;

                    $contactnumber->save();
                    $results[] = $contactnumber;
                }
            }

        }
       return response()->json($results,201);

    }

    public function showcontacts($id){


        $contactlist = ContactList::find($id);
      //  dd($id);
        $contactnumber =new ContactNumber();
        $contactnumber->contactlist_id = $contactlist->id;
        $number = $contactnumber->contactlist_id;
        $contactnumber = ContactNumber::where('contactlist_id',$number)->get();
        return response()->json($contactnumber,201);


    }

    public function deletecontact($contactlistid,$id){

        if($contactlist = ContactList::where('id',$contactlistid)->first())
        {
            if($contactnumber = ContactNumber::find($id))
            {
                $contactnumber->delete();
                return response()->json("delete success");
            }
            else{
                return response()->json("contact not found");
            }
        }
         else{
             return "list not found";
         }




     }
     public function updatecontact($contactlistid,$id,Request $request)
     {

        if($contactlist = ContactList::where('id',$contactlistid)->first())
        {
            if($contactnumber = ContactNumber::find($id))
            {
                $contactnumber->update([
                    'username' => $request->username,
                    'phone_number' => $request->phone_number
                    ]);

                    return response([
                        'status' => 'update success',
                        'data' => $contactnumber
                    ], 200);
            }
            else{
                return "number not found";
            }
        }
        else{
            return "list not found";
        }
    }

}
