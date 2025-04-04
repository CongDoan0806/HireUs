<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequirement extends Model
{
    protected $table = 'job_requirements';

    protected $primaryKey = 'requirement_id';

    protected $fillable = [
        'job_id',
        'requirement',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }
}