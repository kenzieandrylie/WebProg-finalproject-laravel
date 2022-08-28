<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;
    public function genre(){
        return $this->belongsTo(Genres::class);
    }

    public function detail(){
        return $this->hasMany(TransactionDetail::class,'game_id');
    }
}
