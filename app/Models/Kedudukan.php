<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Objects\Polygon;

class Kedudukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coord',
    ];

    protected $casts = [
        'coord' => Point::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }      

}
