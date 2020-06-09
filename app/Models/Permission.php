<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'parent_id',
        'key_code'
    ];

    public function permissionsChildrents()
    {
        return $this->hasMany(Permission::class, 'parent_id', 'id');
    }

    public function Roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role', 'permission_id', 'role_id')->withTimestamps();
    }
}
