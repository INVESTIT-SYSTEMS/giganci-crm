<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    protected $fillable = [
        'town',
    ];
    public function groups():HasMany
    {
        return $this->hasMany(Group::class);
    }
}
