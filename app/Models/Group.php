<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'birth_year',
        'parent_name',
        'parent_surname',
        'parent_phone_number',
        'parent_email',
    ];
    public function student(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
