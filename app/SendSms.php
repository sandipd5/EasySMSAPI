<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendSms extends Model
{
    protected $table = 'send_sms';
    protected $fillable = ['senderid_id','contactlist_id','contactnumbers_id','number','body'];

    public function senderId()
    {
        return $this->hasOne('App\SenderId','id','senderid_id');
    }

    public function contactlists()
    {
        return $this->hasMany('App\ContactList','id','contactlist_id');
    }

    public function contactnumbers()
    {
        return $this->hasMany('App\ContactNumber');
    }
    
}
