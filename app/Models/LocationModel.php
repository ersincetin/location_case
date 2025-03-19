<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LocationModel extends Model
{
    use HasFactory, Notifiable;

    protected $table = "locations";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'latitude',
        'longitude',
        'marker_color',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
