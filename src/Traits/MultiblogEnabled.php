<?php

namespace Kseven\FilamentMultiBlog\Traits;

trait MultiblogEnabled
{
    public function isMultiblogEnabled(): bool
    {
        return config('multiblog.enabled') === true;
    }
}
