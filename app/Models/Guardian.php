<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $table = "parents";
    protected $fillable = [
    'user_id',
    'home_address',
    'latitude',
    'longitude',
    'number_of_children'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function child()
    {
        return $this->hasMany(Child::class);
    }
}
