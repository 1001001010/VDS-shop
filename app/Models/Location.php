<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'link',
    ]; 

    public function servers() {
        return $this->hasMany(Server::class);
    }
}
