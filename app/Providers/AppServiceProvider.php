<?php

namespace App\Providers;

use App\Repositories\Conversations\Interface\ConversationInterface;
use App\Repositories\Conversations\Repository\ConversationRepository;
use App\Services\Conversations\Interface\ConversationServiceInterface;
use App\Services\Conversations\Service\ConversationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ConversationInterface::class,          ConversationRepository::class);
        $this->app->bind(ConversationServiceInterface::class,   ConversationService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
