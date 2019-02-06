<?php

namespace Mydnic\Kustomer\Http\Controllers;

use Illuminate\Http\Request;
use Mydnic\Kustomer\Feedback;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Mydnic\Kustomer\Events\NewFeedback;
use Mydnic\Kustomer\Http\Requests\StoreFeedbackRequest;

class FeedbackController extends Controller
{
    public function store(StoreFeedbackRequest $request)
    {
        $feedback = $this->storeFeedback($request);

        $this->dispatchEvent($feedback);

        return response()->json([
            'created' => true
        ], 201);
    }

    private function storeFeedback(Request $request)
    {
        $feedback = new Feedback;
        $feedback->type = $request->type;
        $feedback->message = $request->message;
        $feedback->user_info = $this->gatherUserInfo($request);
        $feedback->save();

        return $feedback;
    }

    private function gatherUserInfo(Request $request)
    {
        return [
            'url' => $request->server('HTTP_REFERER'),
            'language' => $request->getPreferredLanguage(),
            'agent' => $request->server('HTTP_USER_AGENT'),
            'viewport' => $request->viewport,
            'screenshot' => $this->saveScreenshot($request->screenshot),
            'user_id' => auth()->check() ? auth()->id() : null,
        ];
    }

    private function dispatchEvent(Feedback $feedback)
    {
        event(new NewFeedback($feedback));
    }

    private function saveScreenshot($base64Screenshot = null)
    {
        if ($base64Screenshot and config('kustomer.screenshot')) {
            $image = $base64Screenshot;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = microtime(true) . str_random(4) . '.' . 'png';
            if (Storage::put('screenshots/' . $imageName, base64_decode($image))) {
                return 'screenshots/' . $imageName;
            }
        }

        return null;
    }
}
