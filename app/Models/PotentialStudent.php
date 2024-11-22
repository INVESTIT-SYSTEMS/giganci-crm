<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotentialStudent extends Model
{
    use HasFactory;
    protected $table = 'potential_students';
    protected $fillable = [
        'name',
        'surname',
        'birth_year',
        'status',
        'comment',
        'parent_name',
        'parent_surname',
        'parent_phone_number',
        'parent_email',
    ];
}
