<?php
namespace Kseven\FilamentMultiBlog\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Kseven\FilamentMultiBlog\Models\Post;

class NewPostNotification extends Notification
{
    public function __construct(public Post $post) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Novo post publicado: ' . $this->post->title)
            ->line('Um novo post foi publicado no site.')
            ->action('Ver post', url("/blog/{$this->post->slug}"));
    }
}
