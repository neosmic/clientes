<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        
        if ($request->user()->hasVerifiedEmail()) {
            redirect()->intended(RouteServiceProvider::HOME);
        }
        Log::warning('Verification mail sent');
        return view('auth.verify-email');
    }
}
