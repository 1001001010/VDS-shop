<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    public function server(){
    return $this->hasOne(Server::class);
    }
    public function user(){
    return $this->belongsTo(User::class);
    }
}