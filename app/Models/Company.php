<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'website',
        'address',
        'state',
        'post_code',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @param $id
     * @return Company|Company[]|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public static function find($id)
    {
        return self::with('country')->find($id);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
