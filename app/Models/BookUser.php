<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    public function usuario(){
        return $this->belongsTo(User::class);
    }
    public function libro(){
        return $this->belongsTo(Book::class);
    }
    use HasFactory;
}
