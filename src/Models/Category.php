<?php
namespace Kseven\FilamentMultiBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Kseven\FilamentMultiBlog\Traits\HasSiteScope;

class Category extends Model
{
    use HasSiteScope;

    protected $fillable = ['name', 'slug', 'site_id'];

    public function site() {
        return $this->belongsTo(Site::class);
    }
}
