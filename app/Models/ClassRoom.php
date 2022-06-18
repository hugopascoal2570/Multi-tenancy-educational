<?php

namespace App\Models;

use App\Models\Traits\UserACLTrait;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    use TenantTrait;
    use UserACLTrait;

    protected $table = 'classroom';

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
