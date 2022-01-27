<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    public function rol(){
        return $this->hasOne(Role::class);
    }
    public function libro_usuario(){
        return $this->hasMany(BookUser::class);
    }
    use SoftDeletes;
    use HasFactory;
}
