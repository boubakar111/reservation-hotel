<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hotel extends Model
{
    public $timestamps = false;

    protected $fillable = [ 'name','location','description','image' ];


    // la relation avec chambre
    public function chambres(){
      return $this->hasMany(Chambre::class);
    }

    public function imagePath(): string{
        return Storage::url($this->image);
    }
}

