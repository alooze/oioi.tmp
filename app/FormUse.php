<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormUse extends Model
{
    protected $table = 'form_uses';
    protected $fillable = ['form_id', 'json', 'status'];
}
