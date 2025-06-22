<?php
namespace Kseven\FilamentMultiBlog\Listeners;

use Kseven\FilamentMultiBlog\Events\PostPublished;
use Kseven\FilamentMultiBlog\Notifications\NewPostNotification;
use Kseven\FilamentMultiBlog\Models\Subscriber;

class SendPostNotificationToSubscribers
{
    public function handle(PostPublished $event): void
    {
        $subscribers = Subscriber::where('site_id', $event->post->site_id)->get();

        foreach ($subscribers as $subscriber) {
            $subscriber->notify(new NewPostNotification($event->post));
        }
    }
}
