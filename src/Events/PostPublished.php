<?php
namespace Kseven\FilamentMultiBlog\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Kseven\FilamentMultiBlog\Models\Post;

class PostPublished
{
    use Dispatchable;

    public function __construct(public Post $post) {}
}
