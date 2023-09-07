<?php

namespace App\Observers;

use App\Mail\PasswordChangeEmail;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // $resetLink = url('/reset-password/' . $user->reset_token);
        // Log::alert('Usuario Creado: ' . $user['name']);
        // Mail::to($user->email)->queue(new PasswordChangeEmail($user, $resetLink));
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        // if ($user->isDirty('password') && !$user->isDirty('email')) {
        //     Mail::to($user->email)->queue(new WelcomeEmail($user));
        // }
        
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
