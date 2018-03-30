<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class FaqComment extends Model
{
    protected $table = 'faq_comments';
    protected $fillable = [
        'question_id', 'comment_text', 'user_name', 'user_email', 'user_role', 'status',
    ];

    public function getTimeAttribute($value) {
        return (new Carbon($value))->format('h:i');
    }

    public function getDateAttribute($value) {
        return (new Carbon($value))->format('j F Y');
    }
}
