<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $table = 'industries';
    protected $primaryKey = 'industry_id';
    
    protected $fillable = ['industry_name'];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'industry_id');
    }

    public function companies()
    {
        return $this->hasMany(Company::class, 'industry_id');
    }
}
