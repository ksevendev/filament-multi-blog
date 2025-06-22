<?php
namespace Kseven\FilamentMultiBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Kseven\FilamentMultiBlog\Traits\HasSiteScope;

class Subscriber extends Model
{
    use HasSiteScope;

    protected $fillable = ['email', 'name', 'site_id'];

    public function site() {
        return $this->belongsTo(Site::class);
    }
}
