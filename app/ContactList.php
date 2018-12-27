<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactList extends Model
{
    protected $table = 'contact_lists';
    protected $fillable = ['listname','description'];

    public function contactnumber()
    {
        return $this->hasMany('App\ContactNumber');
    }
}
