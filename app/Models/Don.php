<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'date',
        'personnage_id',
        'project_id'
    ];

    public function donor()
    {
        return $this->belongsTo(People::class, 'personnage_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
