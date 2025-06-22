<?php
namespace Kseven\FilamentMultiBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Kseven\FilamentMultiBlog\Traits\HasSiteScope;

class Comment extends Model
{
    use HasSiteScope;

    protected $fillable = ['post_id', 'author_name', 'content', 'site_id'];

    public function site() {
        return $this->belongsTo(Site::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
