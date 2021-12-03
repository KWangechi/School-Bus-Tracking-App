<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Driver extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ['user_id', 'name','age', 'date_registered'];
    protected $table = 'drivers';
    protected $casts = ['date_registered' => 'datetime:Y-m-d'];

    public function bus(){
        return $this->hasMany(Bus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
