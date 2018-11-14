<?php

namespace Mydnic\Kustomer\Test;

use Mydnic\Kustomer\Feedback;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\Http\Middleware\VerifyCsrfToken;
use Mydnic\Kustomer\Events\NewFeedback;

class PostFeedbackTest extends TestCase
{
    /** @test */
    public function it_saves_the_feedback()
    {
        Event::fake();

        $request = $this->post('/kustomer-api/feedback', [
            'type' => 'like',
            'message' => 'test feedback message'
        ]);

        // Help debug Request
        // dd($request->original);

        $request->assertStatus(201);

        $feedback = Feedback::first();
        $this->assertEquals(false, $feedback->reviewed);
        $this->assertEquals('like', $feedback->type);
        $this->assertEquals('test feedback message', $feedback->message);

        Event::assertDispatched(NewFeedback::class, function ($e) use ($feedback) {
            return $e->feedback->id === $feedback->id;
        });
    }

    /** @test */
    public function it_saves_the_feedback_with_screenshot()
    {
        $this->app->get('config')->set('kustomer.screenshot', true);

        $request = $this->post('/kustomer-api/feedback', [
            'type' => 'like',
            'message' => 'test feedback message',
            'screenshot' => 'data:image/png;base64,iVBORw0KGg'
        ]);
        $request->assertStatus(201);
        $feedback = Feedback::latest()->first();
        $this->assertNotNull($feedback->user_info['screenshot']);
    }

    /** @test */
    public function it_refuses_unavailable_types()
    {
        $this->post('/kustomer-api/feedback', [
            'type' => 'unsupportedType',
            'message' => 'test feedback message'
        ])->assertStatus(302);
    }
}
