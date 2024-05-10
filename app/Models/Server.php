<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'number',
        'location_id',
        'cpu',
        'ram',
        'ssd',
        'oc',
        'panel',
        'ip',
        'user_name',
        'user_pass',
        'rental_until',
        'price_month',
        'price_hour',
        'status',
        'type',
    ];

    public function locations() {
        return $this->belongsTo(Location::class);
    }
    public function rental() {
        return $this->belongsTo(Rentals::class);
    }
}
