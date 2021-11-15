<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['number_plate' , 'date_registered', 'designated_route'];

    protected $casts = [
        'date_registered' => 'datetime:Y-m-d H:i:s'
    ];

    public function driver(){
        return $this->belongsTo(Driver::class);
    }
}
