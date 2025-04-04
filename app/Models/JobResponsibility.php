<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobResponsibility extends Model
{
    protected $table = 'job_responsibilities';

    protected $primaryKey = 'responsibility_id';

    protected $fillable = [
        'job_id',
        'responsibility',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }
}
