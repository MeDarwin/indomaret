<?php

namespace App\Observers;

use App\Models\Auth;

class UserObserver
{
    /**
     * Handle the Auth "created" event.
     */
    public function created(Auth $auth): void
    {
        //
    }

    /**
     * Handle the Auth "updated" event.
     */
    public function updated(Auth $auth): void
    {
        //
    }

    /**
     * Handle the Auth "deleted" event.
     */
    public function deleted(Auth $auth): void
    {
        //
    }

    /**
     * Handle the Auth "restored" event.
     */
    public function restored(Auth $auth): void
    {
        //
    }

    /**
     * Handle the Auth "force deleted" event.
     */
    public function forceDeleted(Auth $auth): void
    {
        //
    }
}
