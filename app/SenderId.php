<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SenderId extends Model
{
    protected $table = 'senderid_managements';
    protected $fillable = ['senderid','user_id','status','operator_id','descriptions'];

    public function operators()
    {
        return $this->belongsTo(Operator::class,'operator_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
