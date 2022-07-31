<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public $fillable = ['title', 'price', 'hotel_url', 'country_id', 'vacation_lenght'];
    public function booking(){
        return $this->belongTo(Booking_Order::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
     }
    
    
}
