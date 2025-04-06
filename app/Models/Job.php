<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $primaryKey = 'job_id';

    protected $fillable = [
        'user_id', 'company_id', 'job_title', 'job_type_id', 'status', 'level_id',
        'job_description', 'location', 'salary', 'posted_date', 'deadline',
        'required_candidates', 'total_applied', 'position_id'
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function industry()
    {
        return $this->belongsTo(Job_Position::class, 'position_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'job_id');
    }

    public function responsibilities()
    {
        return $this->hasMany(JobResponsibility::class, 'job_id');
    }

    public function requirements()
    {
        return $this->hasMany(JobRequirement::class, 'job_id');
    }

    public function benefits()
    {
        return $this->hasMany(JobBenefit::class, 'job_id');
    }
}


