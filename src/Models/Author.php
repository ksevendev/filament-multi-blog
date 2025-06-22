<?php
namespace Kseven\FilamentMultiBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Kseven\FilamentMultiBlog\Traits\HasSiteScope;

class Author extends Model
{
    use HasSiteScope;

    protected $fillable = ['name', 'email', 'bio', 'site_id'];

    public function site() {
        return $this->belongsTo(Site::class);
    }
}
