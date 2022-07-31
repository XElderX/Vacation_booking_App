<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
 
    public $fillable = ['name', 'surname', 'nationality', 'DOB', 'hotel_id'];
    
    
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
