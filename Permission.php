<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['role_id', 'sidebar_link_id'];

    public function userRole()
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }

    public function sidebarLink()
    {
        return $this->belongsTo(SidebarLink::class, 'sidebar_link_id');
    }
}
