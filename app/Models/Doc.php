<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'visitors_id',
        'activities_id',
        'documents_id',
        'description',
        'file_path'
    ];

    // Relation Many to one dengan documents table
    public function documents()
    {
        return $this->belongsTo(Document::class);
    }

    // Relation Many to one dengan users table, activities, dan activity_submissions table
    public function coordinators()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function visitors()
    {
        return $this->belongsTo(User::class, 'visitors_id');
    }

    public function activities()
    {
        return $this->belongsTo(Activity::class, 'activities_id');
    }

    public function activitySubmissions()
    {
        return $this->belongsTo(ActivitySubmission::class, 'activity_submission_id');
    }
}
