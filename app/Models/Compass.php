<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compass extends Model
{
    use HasFactory;		

    protected $fillable = [
        'user_id',
        'compass_rarity',
        'compass_level',
        'compass_type',
        'username',
    ]; 
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }       
}
