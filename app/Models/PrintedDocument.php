<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintedDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'activity',
        'visitors_id',
        'business_name',
        'from',
        'no_phone',
        'discussion',
        'coordinators_id',
        'heads_id',
        'qr_code'
    ];

    public function visitors()
    {
        return $this->belongsTo(User::class, 'visitors_id');
    }

    public function coordinators()
    {
        return $this->belongsTo(User::class, 'coordinators_id');
    }

    public function heads()
    {
        return $this->belongsTo(User::class, 'heads_id');
    }
}
