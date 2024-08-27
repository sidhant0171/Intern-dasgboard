<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'attendance_id', 'user_id', 'internship_id', 'reason', 'status',
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
