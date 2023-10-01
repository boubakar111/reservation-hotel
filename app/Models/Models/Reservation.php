<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id','room_id','num_of_gusets', 'arrival','departure'];

    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'room_id');
    }

}
