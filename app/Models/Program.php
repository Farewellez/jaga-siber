<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'title',
        'slug',
        'description',
        'scope',
        'reward_min',
        'reward_max',
        'is_public',
    ];
    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}