<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable =['name','numberRoom','start','end'];

    public function classrooms(){
        return $this->belongsToMany(ClassRoom::class);
    }
}
