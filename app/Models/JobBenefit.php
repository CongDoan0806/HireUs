<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBenefit extends Model
{
    protected $table = 'job_benefits';

    protected $primaryKey = 'benefit_id';

    protected $fillable = [
        'job_id',
        'benefit',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }
}
