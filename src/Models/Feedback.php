<?php

namespace Mydnic\Kustomer\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $casts = [
        'reviewed' => 'boolean',
        'user_info' => 'array'
    ];
}
