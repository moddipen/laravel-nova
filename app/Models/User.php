<?php

namespace App\Models;

use App\Traits\HasUuidTrait;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles, Impersonate, HasUuidTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'date_of_birth',
        'company_id',
        'country_id',
        'gender_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function businessCategories()
    {
        return $this->belongsToMany(BusinessCategory::class);
    }

    public static function findByUuidOrFail($uuid)
    {
        return self::where('uuid', $uuid)->firstOrFail();
    }

    /**
     * Only those users who are super-admins can impersonate.
     *
     * @return bool
     */
    public function canImpersonate()
    {
        return $this->hasRole(config('fanbox.roles.super_admin'));
    }

    /**
     * All users who are admins can be impersonated.
     *
     * @return bool
     */
    public function canBeImpersonated()
    {
        return $this->hasRole(config('fanbox.roles.admin'));
    }
}
