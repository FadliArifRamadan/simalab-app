<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    // Mencegah atribut lain yang tidak diizinkan untuk diisi dari input eksternal 
    // (misalnya dari form) yang dapat dieksploitasi oleh pengguna yang tidak sah
    protected $fillable = [
        'activity_type',
        'coordinators_id',
        'description'
    ];

    // Relation Many to one dengan users table
    public function coordinators()
    {
        return $this->belongsTo(User::class, 'coordinators_id');
    }
}
