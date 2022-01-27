<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    public function user(){
        return $this->hasMany(User::class);
    }
    use SoftDeletes;
    use HasFactory;
}
