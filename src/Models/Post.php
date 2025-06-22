<?php
namespace Kseven\FilamentMultiBlog\Models;


use Firefly\FilamentBlog\Models\Post as BasePost;
use Kseven\FilamentMultiBlog\Models\Site;
use Kseven\FilamentMultiBlog\Traits\HasSiteScope;

class Post extends BasePost
{
    use HasSiteScope;

    protected $fillable = [
        'site_id',
        'title',
        'slug',
        'content',
        'published_at',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
