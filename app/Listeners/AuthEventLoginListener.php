<?php

namespace App\Listeners;


use App\UserLoginActivity;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class AuthEventLoginListener
{

    protected $request;

    /**
     * Create the event listener.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        UserLoginActivity::create([
            'ip' => $this->request->ip(),
            'user_agent' => $this->request->userAgent(),
            'user_id' => $event->user->id
        ]);
    }
}
