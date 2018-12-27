<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;

class OperatorController extends Controller
{
    public function index()
    {
        $operator = Operator::all();
        if($operator->isEmpty()){
            return "no operators";
        }
       
        return response()->json($operator, 201);
    }

    public function store(Request $request)
    {
        $operator = Operator::create($request->all());

        return response()->json($operator, 201);
    }

    public function show($id)
    {
      if($operator = Operator::find($id)){
        return response()->json($operator, 201);
      }
        return "not found";   
    }

    public function update(Operator $operator,Request $request)
    {
        $operator->update($request->all());

        return response()->json($operator, 200);
    }

    public function destroy($id)
    {
        if($operator = Operator::find($id))
        {
          $operator->delete();
          return "successfully deleted";
            
        }
        return "not found";
    }


    
}
