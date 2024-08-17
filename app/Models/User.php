<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'business_name',
        'email',
        'password',
        'roles_id',
        'identities'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relation Many to one dengan roles table
    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }

    // Relation One to many dengan docs table
    public function docs()
    {
        return $this->hasMany(Doc::class);
    }

    public function scopeLabCoordinators($query)
    {
        return $query->where('roles_id', 2);
    }

    // Relation One to many dengan activity_submissions table
    public function activitySubmissions()
    {
        return $this->hasMany(ActivitySubmission::class);
    }

    public function scopeLabVisitors($query)
    {
        return $query->where('roles_id', 3);
    }

    // Relation One to many dengan documents table
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
