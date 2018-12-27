<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactNumber extends Model
{
    //
    protected $table = 'contact_numbers';
    protected $fillable = ['contactlist_id','phone_number','username'];

    public function get_contactlist(){
        return $this->belongsTo(ContactList::class,'contactlist_id','id');
    }

}
