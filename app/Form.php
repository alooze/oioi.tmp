<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'email_ids', 'from']; 

    public function uses()
    {
        return $this->hasMany(FormUse::class);
    }

    public function emails()
    {
        $ids = explode(',', $this->email_ids);
        return Email::whereIn('id', $ids)->get();
    }
}
