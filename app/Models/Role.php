<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // Relation One to Many dengan users table
    public function users()
    {
        return $this->hasMany(User::class, 'roles_id', 'id');
    }
}
