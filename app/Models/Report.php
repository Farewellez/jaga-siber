<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'hunter_id',
        'program_id',
        'title',
        'description',
        'severity',
        'status',
        'attachment_path',
    ];
    public function hunter()
    {
        return $this->belongsTo(User::class, 'hunter_id');
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function timelines()
    {
        return $this->hasMany(ReportTimeline::class);
    }
    public function payout()
    {
        return $this->hasOne(Payout::class);
    }
}
  