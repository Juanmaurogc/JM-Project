<?php

namespace App\Models;

use App\Models\Trainings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modules extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'date_time', 
        'sort_order', 
        'topics', 
    ];

    public function trainings()
    {
        return $this->belongsToMany(Trainings::class, 'module_training');
    }
}
