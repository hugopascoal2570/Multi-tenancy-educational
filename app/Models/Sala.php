<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_id','tenant_id','subject_id'];


    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function rooms(){
        return $this->belongsToMany(Room::class);
    }
    public function disciplinas(){
        return $this->belongsToMany(Subject::class);
    }
}
