<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\WelcomeEmailJob;

class WelcomeEmail extends Controller
{
    public function send(Request $request)
    {
        WelcomeEmailJob::dispatch('recipient@example.com');
    }
}
