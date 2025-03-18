<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    protected $table = 'job_types';
    protected $primaryKey = 'job_type_id';

    protected $fillable = ['job_type_name'];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'job_type_id');
    }
}
