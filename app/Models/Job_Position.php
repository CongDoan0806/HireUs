<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Position extends Model
{
    use HasFactory;

    protected $table = 'job_positions';
    protected $primaryKey = 'position_id';
    
    protected $fillable = ['position_name'];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'position_id');
    }

    public function companies()
    {
        return $this->hasMany(Company::class, 'position_id');
    }
}
