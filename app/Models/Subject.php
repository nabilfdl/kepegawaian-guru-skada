<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['id'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function userEditVerifications(){
        return $this->hasMany(UserEditVerification::class);
    }
}
