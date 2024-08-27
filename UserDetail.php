<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'userdetails';

    protected $fillable = [
        'users_id',
        'phone_number',
        'image',
        'gender',
        'role_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
