<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Gitlab;

class GitlabController extends Controller
{
    public const EVENTS_LIMIT = 30;

    public $client;

    public function __construct()
    {
        $this->client = new Gitlab\Client();
        $this->client->authenticate(
            env('GITLAB_ACCESS_TOKEN'),
            Gitlab\Client::AUTH_HTTP_TOKEN
        );
    }

    public function all()
    {
        // $tomorrow = Carbon::now()->addDay();
        // $yesterday = Carbon::now()->subtract('day', 10) ;

        return view('events', [
            'events' => $this->client->users()->events(
                env('GITLAB_USER_ID'),
                [
                    // 'after' => $yesterday,
                    // 'before' => $tomorrow,
                    'per_page' => self::EVENTS_LIMIT,
                ]
            ),
            'user' => $this->client->users()->show(env('GITLAB_USER_ID'))
        ]);
    }

    public function perUser(Request $request, $userId)
    {
        return view('events', [
            'events' => $this->client->users()->events(
                $userId,
                [
                    'per_page' => self::EVENTS_LIMIT,
                ]
            ),
            'user' => $this->client->users()->show($userId)
        ]);
    }
}
