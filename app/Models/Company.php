<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $primaryKey = 'company_id';

    protected $fillable = [
        'company_name', 'logo', 'company_website', 'company_address',
        'employee_count', 'comp_benefit', 'industry_id', 'founded_date',
        'description', 'user_id'
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
