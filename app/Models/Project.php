<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'personnage_id',
        'objectif',
        'benef',
        'currentAmount',
        'start_date',
        'end_date'
    ];
}
