<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuzzleAnswer extends Model
{
    use HasFactory;

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }    
    
    public function puzzle()
    {
        return $this->belongsTo(Puzzle::class);
    }     
}
