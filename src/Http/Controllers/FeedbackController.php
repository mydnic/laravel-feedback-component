<?php

namespace Mydnic\Kustomer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Mydnic\Kustomer\Feedback;
use Mydnic\Kustomer\Events\NewFeedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validates($request);

        $feedback = $this->storeFeedback($data);

        $this->dispatchEvent($feedback);

        return response()->json([
            'created' => true
        ], 201);
    }

    private function validates(Request $request)
    {
        return $request->validate([
            'type' => [
                'required', Rule::in(array_keys(config('kustomer.feedbacks'))),
            ],
            'message' => 'required',
        ]);
    }

    private function storeFeedback($data)
    {
        $feedback = new Feedback;
        $feedback->type = $data['type'];
        $feedback->message = $data['message'];
        $feedback->save();

        return $feedback;
    }

    public function dispatchEvent(Feedback $feedback)
    {
        event(new NewFeedback($feedback));
    }
}
