<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategoryUser extends Model
{
    /**
     * Set the table name for this model.
     *
     * @var string
     */
    protected $table = 'business_category_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_category_id',
        'user_id',
    ];
}
