<?php

namespace Kseven\FilamentMultiBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Kseven\FilamentMultiBlog\Models\Post;


class Site extends Model {

    protected $fillable = ['name', 'domain'];

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
