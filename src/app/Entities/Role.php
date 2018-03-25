<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Entities\User', 'role_user');
    }
}
