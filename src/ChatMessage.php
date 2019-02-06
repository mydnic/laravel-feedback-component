<?php

namespace Mydnic\Kustomer;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'kustomer_chat_messages';

    protected $casts = [
        'seen' => 'boolean',
        'user_info' => 'array'
    ];
}
