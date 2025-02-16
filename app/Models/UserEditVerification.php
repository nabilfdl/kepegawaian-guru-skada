<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEditVerification extends Model
{
    protected $guarded = ['id'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
