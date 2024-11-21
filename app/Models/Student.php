<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'birth_year',
        'parent_name',
        'parent_surname',
        'parent_phone_number',
        'parent_email',
        'group_id',
    ];
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
