<?php

namespace Kseven\FilamentMultiBlog;

use Firefly\FilamentBlog\EventServiceProvider AS ServiceProvider;
use Firefly\FilamentBlog\Events\BlogPublished;
use Firefly\FilamentBlog\Listeners\SendBlogPublishedNotification;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        BlogPublished::class => [
            SendBlogPublishedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
