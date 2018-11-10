<?php

namespace Mydnic\Kustomer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => [
                'required', Rule::in(array_keys(config('kustomer.feedbacks'))),
            ],
            'message' => 'required',
        ]);

        $feedback = new Feedback;
        $feedback->type = $request->type;
        $feedback->message = $request->message;
        $feedback->save();

        return response()->json([
            'created' => true
        ], 201);
    }
}
