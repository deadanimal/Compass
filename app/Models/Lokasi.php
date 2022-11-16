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
        return $this->hasMany(Puzzle::class);
    }    

    public function answers()
    {
        return $this->hasMany(PuzzleAnswer::class);
    }     
    
    public function newEloquentBuilder($query): SpatialBuilder
    {
        return new SpatialBuilder($query);
    }    
}
