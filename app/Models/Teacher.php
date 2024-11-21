<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'phone_number',
        'email',
    ];

    public function group(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
