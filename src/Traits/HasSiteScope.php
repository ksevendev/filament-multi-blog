<?php
namespace Kseven\FilamentMultiBlog\Traits;

trait HasSiteScope
{
    public static function bootHasSiteScope(): void
    {
        static::addGlobalScope('site', function ($query) {
            if ($siteId = app('currentSiteId')) {
                $query->where('site_id', $siteId);
            }
        });

        static::creating(function ($model) {
            if (!$model->site_id && app()->bound('currentSiteId')) {
                $model->site_id = app('currentSiteId');
            }
        });
    }
}
