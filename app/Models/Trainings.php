<?php

namespace App\Models;

use App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class trainings extends Model
{
    
    
    public function modules()
    {
        return $this->belongsToMany(Modules::class, 'module_training');
    }
}
