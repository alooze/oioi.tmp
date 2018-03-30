<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    protected $table = 'faq_questions';
    protected $fillable = [
        'question_title', 
        'answer_title', 
        'answer_content',
        'status',
    ];

    public function comments()
    {
        return $this->hasMany('App\FaqComment', 'question_id');
    }
    public function aproved_comments()
    {
        return $this->comments()->where('status', '1')->get();
    }
}
