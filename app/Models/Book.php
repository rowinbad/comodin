<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function libro_usuario(){
        return $this->hasMany(Book_User::class);
    }
    use HasFactory;
}
