<?php

namespace App\Models\Traits;

use App\Helpers\ShortUuid;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pribadi;

trait HasUuid
{
    public static function bootHasUuid()
    {
        parent::creating(function ($model) {
            if ($model instanceof Pribadi) {
                $shortUuid = new ShortUuid;
                $model->id_pribadi = $shortUuid->generateShortUuid();
            } elseif ($model instanceof Pekerjaan) {
                $shortUuid = new ShortUuid;
                $model->id_pekerjaan = $shortUuid->generateShortUuid();
            } elseif ($model instanceof Pendidikan) {
                $shortUuid = new ShortUuid;
                $model->id_pendidikan = $shortUuid->generateShortUuid();
            }
        });
    }
}
