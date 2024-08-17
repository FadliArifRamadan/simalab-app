<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    // Relation One to Many dengan docs table
    public function docs()
    {
        return $this->hasMany(Doc::class, 'documents_id', 'id');
    }
}
