<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';
    protected $primaryKey = 'level_id';

    protected $fillable = ['level_name'];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'level_id');
    }
}
