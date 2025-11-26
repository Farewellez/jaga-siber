<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Payout extends Model
{
    use HasFactory;
    protected $fillable = [
        'report_id',
        'amount',
        'paid_at',
        'notes',
    ];
    protected $casts = [
        'paid_at' => 'datetime',
    ];
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
  