<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = ['name','room_id','tenant_id'];


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

    public function teachers(){
        return $this->belongsToMany(User::class,'teacher_turma');
    }
    public function scopeTenantUser(Builder $query)
    {
        return $query->where('tenant_id', auth()->user()->tenant_id);
    }

    public function teachersAvailable($filter = null)
    {
        $teachers = User::whereHas('roles', function($q){
            $q->where('name', 'LIKE','%'.'Professor(a)'.'%');
            $q->where('tenant_id', auth()->user()->tenant_id);
           
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter)
                    $queryFilter->where('turmas.name', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $teachers;
    }
}
