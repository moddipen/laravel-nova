<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuidTrait
{
    protected static function bootHasUuidTrait()
    {
        static::creating(function ($model) {
            if (! $model->uuid) {
                $model->uuid = Str::orderedUuid();
            }
        });
    }

    public static function findByUuidOrFail($uuid)
    {
        return self::whereUuid($uuid)->firstOrFail();
    }

    /**
     * Eloquent scope to look for a given UUID.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string                                $uuid  The UUID to search for
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithUuid($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }

    /**
     * Eloquent scope to look for multiple given UUIDs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  array                                 $uuids  The UUIDs to search for
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithUuids($query, array $uuids)
    {
        return $query->whereIn('uuid', $uuids);
    }
}
