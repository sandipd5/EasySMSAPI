<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactList;

class ContactListController extends Controller
{
    
    public function index()
    {
        $contactlist = ContactList::all();
        return response()->json($contactlist, 201);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $contactlist = ContactList::create($request->all());

        return response()->json($contactlist, 201);
    }

   
    public function show(ContactList $contactlist)
    {
        //
        return $contactlist;
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(ContactList $contactlist,Request $request)
    {
        $contactlist->update($request->all());

        return response()->json($contactlist, 200);
    }

    
    public function destroy($id)
    {
        $contactlist = ContactList::find($id);
        if($contactlist->delete())
        {
                return "success";
        }
    }
}
