<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Child extends Model
{
    use HasFactory;
    protected $table = "children";
    protected $fillable=['guardian_id','name','age','class'];

    //rlationship with the parent
    public function parent(){
        return $this->belongsTo(Guardian::class, 'guardian_id');
    }
}
