<?php

namespace App\Providers;

use App\Events\GetTokenEvent;
use App\Events\InviteUserEvent;
use App\Listeners\LoginHistoryListener;
use App\Listeners\SendInviteProjectListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            GetTokenEvent::class,
            LoginHistoryListener::class
        );
        Event::listen(
            InviteUserEvent::class,
            SendInviteProjectListener::class
        );
    }
}
