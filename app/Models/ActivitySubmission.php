<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitySubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'coordinators_id',
        'activities_id',
        'submission_date',
        'submission_time',
        'status',
    ];

    // Relation Many to one dengan users table, labs table, activities table
    public function visitors()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function coordinators()
    {
        return $this->belongsTo(User::class, 'coordinators_id');
    }

    public function activities()
    {
        return $this->belongsTo(Activity::class, 'activities_id');
    }

    // Relasi One to Many dengan docs table
    public function docs()
    {
        return $this->hasMany(Doc::class, 'activity_submission_id');
    }
}
