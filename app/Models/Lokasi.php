<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Objects\Polygon;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'coord',
        'area',
    ];

    protected $casts = [
        'coord' => Point::class,
        'area' => Polygon::class,
    ];

    public function puzzles()
    {
        return $this->belongsToMany(Puzzle::class);
    }    
    
    public function newEloquentBuilder($query): SpatialBuilder
    {
        return new SpatialBuilder($query);
    }    
}
