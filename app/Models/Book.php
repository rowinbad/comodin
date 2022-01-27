<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    public function libro_usuario(){
        return $this->hasMany(BookUser::class);
    }
    use SoftDeletes;
    use HasFactory;
}
