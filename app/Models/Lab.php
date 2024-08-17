<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_name',
        'description'
    ];

    // Relation One to Many dengan activities table
    public function activities()
    {
        return $this->hasMany(Activity::class, 'labs_id', 'id');
    }
}
