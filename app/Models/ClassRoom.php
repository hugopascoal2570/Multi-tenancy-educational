<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table = 'classroom';

    protected $fillable = ['name','user_id','tenant_id'];

    public function rooms(){
        return $this->belongsToMany(Room::class);
    }
}
