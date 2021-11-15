<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['bus_id', 'firstname', 'lastname','phone_number','age', 'date_registered'];
    protected $table = 'drivers';
    protected $casts = ['date_registered' => 'datetime:Y-m-d'];

    public function bus(){
        return $this->hasOne(Bus::class);
    }
}
