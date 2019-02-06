<?php

namespace Mydnic\Kustomer\Http\Controllers;

use Illuminate\Http\Request;
use Mydnic\Kustomer\ChatMessage;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ChatMessageController extends Controller
{
    public function store(Request $request)
    {
        $message = new ChatMessage;
        $message->message = $request->message;
        $message->save();

        return response()->json([
            'created' => true
        ], 201);
    }
}
