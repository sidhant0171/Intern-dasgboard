<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{  
    use HasFactory;
// Internship.php (Model)

public function attendances()
{
    return $this->hasMany(Attendance::class, 'internship_id');
}
    protected $fillable = [    
        'department',
        'duration',
        'user_id',
    ];
}

