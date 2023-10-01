<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    public $timestamps = false;

    protected $fillable = ['hotel_id', 'type', 'description', 'price','image'];

    public function hotel(){

        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
