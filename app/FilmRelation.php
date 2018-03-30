<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FilmPersonnel;

class FilmRelation extends Model
{
    protected $fillable = [
        'film_id', 'person_id', 'person_type',
    ];

    public function person()
    {
        $model = $this->person_type;
        return $this->hasOne($model, 'id', 'person_id');
    }
}
