<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // protected $table='attendance';
    // Attendance.php (Model)           
    public function internship()
    {
        return $this->belongsTo(Internship::class, 'internship_id');
    }

         public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



        public function leaves()
        {
            return $this->hasMany(Leave::class);
        }
    
        public function users()
        { 
            return $this->belongsTo(User::class);
        }


    use HasFactory;
}

